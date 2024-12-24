<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class LaporanJanjiTemu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_belum_login_admin();
        cek_akses();
    }
    
    public function index()
    {
        $data['judul'] = 'Laporan Janji Temu';
        $data['user'] = $this->UserModel->getUserWhere(['email' => $this->session->userdata('email')]);
        $data['janji_temu'] = $this->JanjiTemuModel->getAllJanjiTemu();

        $this->load->view('backend/templates/main/header', $data);
        $this->load->view('backend/templates/main/sidebar', $data);
        $this->load->view('backend/templates/main/topbar', $data);
        $this->load->view('backend/laporan/janji_temu/list_laporan_janji_temu', $data);
        $this->load->view('backend/templates/main/footer');
    }

    public function print()
    {
        $data['judul'] = 'Print Data Janji Temu';
        $data['user'] = $this->UserModel->getUserWhere(['email' => $this->session->userdata('email')]);
        $data['janji_temu'] = $this->JanjiTemuModel->getAllJanjiTemu();

        $this->load->view('backend/laporan/janji_temu/print_data_janji_temu', $data);
    }

    public function exportPdf()
    {
        $data['janji_temu'] = $this->JanjiTemuModel->getAllJanjiTemu();

        $this->load->view('backend/laporan/janji_temu/pdf_data_janji_temu', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();

        $this->load->library('pdf');

        $this->pdf->generate($html, "data-janji-temu-pdf", $paper_size, $orientation);
    }

    public function exportExcel()
    {
        $data = [
            'judul' => 'Data Janji Temu Excel',
            'janji_temu' => $this->JanjiTemuModel->getAllJanjiTemu()
        ];

        $this->load->view('backend/laporan/janji_temu/excel_data_janji_temu', $data);
    }
}