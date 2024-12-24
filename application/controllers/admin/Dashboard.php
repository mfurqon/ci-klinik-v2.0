<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_belum_login_admin();
        cek_akses();
    }

    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['user'] = $this->UserModel->getUserWhere(['email' => $this->session->userdata('email')]);
        $data['total_dokter'] = $this->DokterModel->countDokter();
        $data['total_obat'] = $this->ObatModel->countObat();
        $data['total_janji_temu'] = $this->JanjiTemuModel->countJanjiTemu();
        $data['total_anggota'] = $this->UserModel->countUser();

        $this->load->view('backend/templates/main/header', $data);
        $this->load->view('backend/templates/main/sidebar', $data);
        $this->load->view('backend/templates/main/topbar', $data);
        $this->load->view('backend/dashboard/index', $data);
        $this->load->view('backend/templates/main/footer');
    }
}
