<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class Dokter extends CI_Controller
{
    public function index()
    {
        $data['judul'] = "Dokter";
        $data['user'] = $this->UserModel->getUserWhere(['email' => $this->session->userdata('email')]);
        $data['dokter'] = $this->DokterModel->getJoinDokterSpesialisasi();
        $data['data_keranjang'] = $this->TempPemesananObatModel->getDataPemesananObatWhere(['id_user' => $this->session->userdata('id_user')]);

        $this->load->view('frontend/templates/main/header', $data);
        $this->load->view('frontend/dokter/index', $data);
        $this->load->view('frontend/templates/main/footer');
    }

    public function detail()
    {
        $data['judul'] = 'Detail Dokter';
        $data['user'] = $this->UserModel->getUserWhere(['email' => $this->session->userdata('email')]);
        $data['dokter'] = $this->DokterModel->getJoinDokterSpesialisasiById(['dokter.id' => $this->uri->segment(3)]);
        $data['data_keranjang'] = $this->TempPemesananObatModel->getDataPemesananObatWhere(['id_user' => $this->session->userdata('id_user')]);

        $this->load->view('frontend/templates/main/header', $data);
        $this->load->view('frontend/dokter/detail_dokter', $data);
        $this->load->view('frontend/templates/main/footer');
    }
}