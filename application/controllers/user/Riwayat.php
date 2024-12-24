<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class Riwayat extends CI_Controller
{
    public function janjiTemu()
    {
        $data['judul'] = 'Riwayat Janji Temu';
        $data['user'] = $this->UserModel->getUserWhere(['email' => $this->session->userdata('email')]);
        $data['janji_temu'] = $this->JanjiTemuModel->getJanjiTemuById($data['user']['id']);
        $data['data_keranjang'] = $this->TempPemesananObatModel->getDataWhere(['id_user' => $this->session->userdata('id_user')]);

        $this->load->view('frontend/templates/main/header', $data);
        $this->load->view('frontend/riwayat/riwayat_janji_temu', $data);
        $this->load->view('frontend/templates/main/footer');
    }
}