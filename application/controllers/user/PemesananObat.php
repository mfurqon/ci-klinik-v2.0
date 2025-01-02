<?php
defined('BASEPATH') or exit('no direct script access allowed');

class PemesananObat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_belum_login_user();
    }

    public function checkout()
    {
        $this->session->unset_userdata('id_pemesanan');
        
        $id_user = $this->session->userdata('id_user');

        $data['judul'] = "Menu Pembayaran";
        $data['user'] = $this->UserModel->getUserWhere(['email' => $this->session->userdata('email')]);
        $data['data_keranjang'] = $this->TempPemesananObatModel->getDataPemesananObatWhere(['id_user' => $this->session->userdata('id_user')]);
        $data['daftar_bank'] = $this->PembayaranModel->getAllBank();
        $data['daftar_ewallet'] = $this->PembayaranModel->getAllEwallet();
        $data['temp_pemesanan_obat'] = $this->TempPemesananObatModel->joinObatTempPemesananObat($id_user);

        $data_pemesanan_obat = $this->TempPemesananObatModel->getDataPemesananObatWhere(['id_user' => $this->session->userdata('id_user')]);

        set_buat_pemesanan_obat_rules(); // set rules form valiation

        // cek jika data keranjang ada
        if ($data_pemesanan_obat >= 1) {
            // cek jika form validation error
            if ($this->form_validation->run() == FALSE) {
                // maka menampilkan halaman pembayaran
                $this->load->view('frontend/templates/main/header', $data);
                $this->load->view('frontend/pemesanan_obat/pembayaran', $data);
                $this->load->view('frontend/templates/main/footer');
            } else {
                $this->session->unset_userdata('id_pemesanan');
                // jika form validation tidak error maka transaksi akan dimulai

                $this->db->trans_start(); // Mulai transaksi
                $id_user = $this->session->userdata('id_user');

                // 1. Tambahkan data ke tabel pemesanan_obat
                $data_pemesanan = [
                    'id_user' => $id_user,
                    'total_harga' => $this->input->post('total_harga'),
                    'metode_pembelian' => $this->input->post('metode_pembelian'),
                    'alamat' => $this->input->post('alamat'),
                    'catatan' => $this->input->post('catatan'),
                    'tanggal_pemesanan' => date('Y-m-d H:i:s'),
                    'status_pemesanan' => 'Berhasil'
                ];
                $this->db->insert('pemesanan_obat', $data_pemesanan);
                $id_pemesanan = $this->db->insert_id();
                $this->session->set_userdata('id_pemesanan', $id_pemesanan);

                // 2. Tambahkan data ke tabel pembayaran
                $data_pembayaran = [
                    'id_pemesanan' => $id_pemesanan,
                    'metode_pembayaran' => $this->input->post('metode_pembayaran'),
                    'total_pembayaran' => $this->input->post('total_harga'),
                    'status_pembayaran' => 'Lunas',
                    'tanggal_pembayaran' => date('Y-m-d H:i:s')
                ];
                $this->db->insert('pembayaran', $data_pembayaran);
                $id_pembayaran = $this->db->insert_id();

                // 3. Tambahkan data ke tabel faktur
                $data_faktur = [
                    'no_invoice' => 'INV' . time(),
                    'id_user' => $id_user,
                    'id_pemesanan' => $id_pemesanan,
                    'id_pembayaran' => $id_pembayaran,
                    'subtotal' => $this->input->post('subtotal'),
                    'biaya_admin' => $this->input->post('biaya_admin'),
                    'biaya_pengiriman' => $this->input->post('biaya_pengiriman'),
                    'ppn' => $this->input->post('ppn'),
                    'total' => $this->input->post('total_harga')
                ];
                $this->db->insert('faktur', $data_faktur);

                // 4. Pindahkan data dari temp_pemesanan_obat ke pemesanan_detail
                $temp_pemesanan = $this->TempPemesananObatModel->getTempPemesananObatWhere($id_user);
                foreach ($temp_pemesanan as $item) {
                    $data_detail = [
                        'id_pemesanan' => $id_pemesanan,
                        'id_obat' => $item['id_obat'],
                        'nama_obat' => $item['nama_obat'],
                        'jumlah_obat' => $item['jumlah_obat'],
                        'harga_obat' => $item['harga_obat']
                    ];
                    $this->db->insert('detail_pemesanan_obat', $data_detail);
                }

                // 5. Hapus keranjang sementara
                $this->TempPemesananObatModel->deleteTempPemesananObat($id_user);

                $this->db->trans_complete(); // Selesaikan transaksi

                if ($this->db->trans_status() === FALSE) {
                    $this->session->set_flashdata('pesan', [
                        'title' => 'Gagal',
                        'text' => 'Pemesanan gagal!',
                        'icon' => 'error'
                    ]);
                    redirect('checkout-obat');
                } else {
                    $this->session->set_flashdata('pesan', [
                        'title' => 'Berhasil',
                        'text' => 'Pemesanan berhasil!',
                        'icon' => 'success'
                    ]);
                    redirect('pemesanan-obat/invoice');
                }
            }
        } else {
            // jika tidak ada data keranjang, maka akan redirect ke home
            redirect(base_url());
        }
    }

    public function invoice()
    {
        $id_pemesanan = $this->session->userdata('id_pemesanan');

        $data['judul'] = 'Faktur Pemesanan Obat';
        $data['user'] = $this->UserModel->getUserWhere(['email' => $this->session->userdata('email')]);
        $data['data_keranjang'] = $this->TempPemesananObatModel->getDataPemesananObatWhere(['id_user' => $this->session->userdata('id_user')]);
        $data['faktur'] = $this->PemesananObatModel->getPemesananByIdPemesanan($id_pemesanan);
        $data['detail_obat'] = $this->PemesananObatModel->getDetailPemesananByIdPemesanan($id_pemesanan);

        if (!$id_pemesanan) {
            redirect('checkout-obat');
        } else {
            $this->load->view('frontend/templates/main/header', $data);
            $this->load->view('frontend/pemesanan_obat/faktur', $data);
            $this->load->view('frontend/templates/main/footer');
        }
    }

    public function printInvoice()
    {
        $id_pemesanan = $this->session->userdata('id_pemesanan');

        $data['judul'] = 'Cetak Invoice Pemesanan Obat';
        $data['user'] = $this->UserModel->getUserWhere(['email' => $this->session->userdata('email')]);
        $data['faktur'] = $this->PemesananObatModel->getPemesananByIdPemesanan($id_pemesanan);
        $data['detail_obat'] = $this->PemesananObatModel->getDetailPemesananByIdPemesanan($id_pemesanan);

        if (!$id_pemesanan) {
            redirect('checkout-obat');
        } else {
            $this->load->view('frontend/pemesanan_obat/print_faktur', $data);
        }
    }

    public function exportPdfInvoice()
    {
        $id_pemesanan = $this->session->userdata('id_pemesanan');

        $data['judul'] = 'Cetak Invoice Pemesanan Obat';
        $data['user'] = $this->UserModel->getUserWhere(['email' => $this->session->userdata('email')]);
        $data['faktur'] = $this->PemesananObatModel->getPemesananByIdPemesanan($id_pemesanan);
        $data['detail_obat'] = $this->PemesananObatModel->getDetailPemesananByIdPemesanan($id_pemesanan);

        $this->load->view('frontend/pemesanan_obat/export_pdf_faktur', $data);

        $paper_size = 'A4';
        $orientation = 'portrait';
        $html = $this->output->get_output();

        $this->load->library('pdf');

        if (!$id_pemesanan) {
            redirect('checkout-obat');
        } else {
            $this->pdf->generate($html, "pdf-pemesanan-obat", $paper_size, $orientation);
        }
    }
}
