<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class Riwayat extends CI_Controller
{
    public function janjiTemu()
    {
        $data['judul'] = 'Riwayat Janji Temu';
        $data['user'] = $this->UserModel->getUserWhere(['email' => $this->session->userdata('email')]);
        $data['data_keranjang'] = $this->TempPemesananObatModel->getDataWhere(['id_user' => $this->session->userdata('id_user')]);

        $this->JanjiTemuModel->updateJanjiTemuOtomatis();

        $data['janji_temu'] = $this->JanjiTemuModel->getJanjiTemuById($data['user']['id']);

        $this->load->view('frontend/templates/main/header', $data);
        $this->load->view('frontend/riwayat/riwayat_janji_temu', $data);
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
}