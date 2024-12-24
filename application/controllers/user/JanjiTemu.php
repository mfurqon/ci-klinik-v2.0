<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class JanjiTemu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_belum_login_user();
    }
    
    public function index()
    {
        $data['judul'] = "Janji Temu";
        $data['user'] = $this->UserModel->getUserWhere(['email' => $this->session->userdata('email')]);
        $data['dokter'] = $this->DokterModel->getAllDokter();
        $data['data_keranjang'] = $this->TempPemesananObatModel->getDataWhere(['id_user' => $this->session->userdata('id_user')]);

        set_buat_janji_temu_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('frontend/templates/main/header', $data);
            $this->load->view('frontend/janji_temu/index', $data);
            $this->load->view('frontend/templates/main/footer');
        } else {
            $this->JanjiTemuModel->insertJanjiTemu($data);
            $this->session->set_flashdata('pesan', [
                'title' => 'Berhasil',
                'text' => '🥳 Janji Temu berhasil dibuat',
                'icon' => 'success'
            ]);
            redirect('home');
        }
    }
}