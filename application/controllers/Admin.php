<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        cek_akses();
    }

    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['user'] = $this->UserModel->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['total_dokter'] = $this->DokterModel->hitungDokter();
        $data['total_obat'] = $this->ObatModel->hitungObat();
        $data['total_janji_temu'] = $this->JanjiTemuModel->hitungJanjiTemu();
        $data['total_anggota'] = $this->UserModel->hitungAnggota();

        $this->load->view('backend/templates/main/header', $data);
        $this->load->view('backend/templates/main/sidebar', $data);
        $this->load->view('backend/templates/main/topbar', $data);
        $this->load->view('backend/dashboard/index', $data);
        $this->load->view('backend/templates/main/footer');
    }
}
