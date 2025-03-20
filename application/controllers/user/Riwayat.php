<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class Riwayat extends CI_Controller
{
    public function janjiTemu()
    {
        $data['judul'] = 'Riwayat Janji Temu';
        $data['user'] = $this->UserModel->getUserWhere(['email' => $this->session->userdata('email')]);
        $data['data_keranjang'] = $this->TempPemesananObatModel->getDataPemesananObatWhere(['id_user' => $this->session->userdata('id_user')]);

        $this->JanjiTemuModel->updateJanjiTemuOtomatis();

        $data['janji_temu'] = $this->JanjiTemuModel->getJanjiTemuByIdUser($data['user']['id']);

        $this->load->view('frontend/templates/main/header', $data);
        $this->load->view('frontend/riwayat/riwayat_janji_temu', $data);
        $this->load->view('frontend/templates/main/footer');
    }

    public function detailJanjiTemu($id_janji_temu)
    {
        $data['judul'] = 'Riwayat Janji Temu';
        $data['user'] = $this->UserModel->getUserWhere(['email' => $this->session->userdata('email')]);
        $data['data_keranjang'] = $this->TempPemesananObatModel->getDataPemesananObatWhere(['id_user' => $this->session->userdata('id_user')]);
        
        $data['janji_temu'] = $this->JanjiTemuModel->getJanjiTemuById($id_janji_temu);

        $this->load->view('frontend/templates/main/header', $data);
        $this->load->view('frontend/riwayat/detail_janji_temu', $data);
        $this->load->view('frontend/templates/main/footer');
    }

    public function batalkanJanjiTemu()
    {
        $id_janji_temu = $this->uri->segment(3);

        // Validasi ID janji temu
        if (!is_numeric($id_janji_temu) || empty($id_janji_temu)) {
            $this->session->set_flashdata('pesan', [
                'title' => 'Gagal',
                'text' => 'ID tidak valid!',
                'icon' => 'error'
            ]);

            redirect('riwayat/janji-temu');
            return;
        }

        $update = $this->JanjiTemuModel->cancelJanjiTemu($id_janji_temu);

        if ($update) {
            $this->session->set_flashdata('pesan', [
                'title' => 'Berhasil',
                'text' => 'Janji Temu berhasil dibatalkan!',
                'icon' => 'success'
            ]);
        } else {
            $this->session->set_flashdata('pesan', [
                'title' => 'Gagal',
                'text' => 'Gagal membatalkan Janji Temu',
                'icon' => 'error'
            ]);
        }
        
        redirect('riwayat/janji-temu');
    }

    public function pemesananObat()
    {
        $id_user = $this->session->userdata('id_user');

        $data['judul'] = 'Riwayat Pemesanan Obat';
        $data['user'] = $this->UserModel->getUserWhere(['email' => $this->session->userdata('email')]);
        $data['data_keranjang'] = $this->TempPemesananObatModel->getDataPemesananObatWhere(['id_user' => $this->session->userdata('id_user')]);
        $data['pemesanan_obat'] = $this->PemesananObatModel->getPemesananByIdUser($id_user);

        $this->load->view('frontend/templates/main/header', $data);
        $this->load->view('frontend/riwayat/riwayat_pemesanan_obat', $data);
        $this->load->view('frontend/templates/main/footer');
    }

    public function printInvoice($id_pemesanan)
    {
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

    public function exportPdfInvoice($id_pemesanan)
    {
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