<?php
defined('BASEPATH') or exit('no direct script access allowed');

class Keranjang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_belum_login_user();
    }

    public function index()
    {
        $id_user = $this->session->userdata('id_user');

        $data['judul'] = "Data Keranjang Obat";
        $data['user'] = $this->UserModel->getUserWhere(['email' => $this->session->userdata('email')]);
        $data['data_keranjang'] = $this->TempPemesananObatModel->getDataPemesananObatWhere(['id_user' => $this->session->userdata('id_user')]);

        $data['temp_pemesanan_obat'] = $this->TempPemesananObatModel->joinObatTempPemesananObat($id_user);

        $this->load->view('frontend/templates/main/header', $data);
        $this->load->view('frontend/keranjang/index', $data);
        $this->load->view('frontend/templates/main/footer');
    }

    public function tambah()
    {
        $id_obat = $this->uri->segment(3);

        // Memilih data obat untuk dimasukkan ke table temp_pemesana_obat/keranjang melalui variable $isi
        $obat = $this->db->query("Select*from obat where id='$id_obat'")->row();

        $id_user = $this->session->userdata('id_user');

        // cek apakah obat yang di klik sudah ada di keranjang
        $query = $this->db->query("SELECT * FROM temp_pemesanan_obat WHERE id_user='$id_user' AND id_obat='$id_obat'");

        if ($query->num_rows() > 0) {
            // Jika obat sudah ada di keranjang, tambahkan jumlahhnya
            $baris = $query->row();
            $tambah_jumlah = $baris->jumlah_obat + 1;

            if ($tambah_jumlah > $obat->stok) {
                // Jika jumlah baru melebihi stok, jangan tambahkan dan beri pesan error
                $this->session->set_flashdata('pesan', [
                    'title' => 'Gagal',
                    'text' => '😞 Stok obat tidak mencukupi untuk ditambahkan lebih banyak ke keranjang',
                    'icon' => 'error'
                ]);
                redirect(base_url('obat'));
                return; // Hentikan eksekusi fungsi
            }

            $data = [
                'jumlah_obat' => $tambah_jumlah
            ];

            $this->db->where('id', $baris->id);
            $this->db->update('temp_pemesanan_obat', $data);
        } else {
            // Jika obat belum ada di keranjang, masukkan data baru ke tabel temp_pemesanan_obat
            if (1 > $obat->stok) {
                // Jika stok tidak mencukupi, jangan tambahkan dan beri pesan error
                $this->session->set_flashdata('pesan', [
                    'title' => 'Gagal',
                    'text' => '😞 Stok obat habis',
                    'icon' => 'error'
                ]);
                redirect(base_url('obat'));
                return; // Hentikan eksekusi fungsi
            }
            // Berupa data-data yang akan disimpan ke dalam teble temp/keranjang
            $isi = [
                'id_user' => $id_user,
                'id_obat' => $obat->id,
                'nama_obat' => $obat->nama,
                'gambar_obat' => $obat->gambar,
                'harga_obat' => $obat->harga,
                'jumlah_obat' => 1,
                'tanggal_ditambahkan' => date('Y-m-d')
            ];
            $this->TempPemesananObatModel->insertTempPemesananObat($isi);
        }
        $this->session->set_flashdata('pesan', [
            'title' => 'Sukses',
            'text' => '🥳 Obat berhasil ditambahkan ke keranjang',
            'icon' => 'success'
        ]);
        redirect(base_url('obat'));
    }

    public function hapus()
    {
        $id_temp = $this->uri->segment(3);

        $this->TempPemesananObatModel->deleteTempPemesananObatById($id_temp);

        redirect('keranjang');
    }

    public function update()
    {
        $id_user = $this->session->userdata('id_user');
        $jumlah_obat = $this->input->post('jumlah_obat');

        if ($jumlah_obat) {
            foreach ($jumlah_obat as $id_temp => $jumlah) {
                // Update jumlah di temp_pemesanan_obat berdasarkan id
                $this->db->set('jumlah_obat', $jumlah);
                $this->db->where('id', $id_temp);
                $this->db->where('id_user', $id_user);
                $this->db->update('temp_pemesanan_obat');
            }
        }

        redirect('keranjang');
    }
}