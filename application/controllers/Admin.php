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
        $data['user'] = $this->ModelUser->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['total_dokter'] = $this->ModelDokter->hitungDokter();
        $data['total_obat'] = $this->ModelObat->hitungObat();
        $data['total_janji_temu'] = $this->ModelJanjiTemu->hitungJanjiTemu();
        $data['total_anggota'] = $this->ModelUser->hitungAnggota();

        $this->load->view('backend/templates/main/header', $data);
        $this->load->view('backend/templates/main/sidebar', $data);
        $this->load->view('backend/templates/main/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('backend/templates/main/footer');
    }
}
