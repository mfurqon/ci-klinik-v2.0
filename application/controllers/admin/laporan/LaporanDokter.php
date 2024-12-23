<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class LaporanDokter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_belum_login_admin();
        cek_akses();
    }
    
    public function index()
    {
        $data['judul'] = 'Laporan Data Dokter';
        $data['user'] = $this->UserModel->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['dokter'] = $this->DokterModel->getJoinDokterSpesialisasi();

        $this->load->view('backend/templates/main/header', $data);
        $this->load->view('backend/templates/main/sidebar', $data);
        $this->load->view('backend/templates/main/topbar', $data);
        $this->load->view('backend/laporan/dokter/list_laporan_dokter', $data);
        $this->load->view('backend/templates/main/footer');
    }

    public function print()
    {
        $data['judul'] = 'Laporan Data Dokter';
        $data['user'] = $this->UserModel->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['dokter'] = $this->DokterModel->getJoinDokterSpesialisasi();

        $this->load->view('backend/laporan/dokter/print_data_dokter', $data);
    }

    public function exportPdf()
    {
        $data['dokter'] = $this->DokterModel->getJoinDokterSpesialisasi();

        $this->load->view('backend/laporan/dokter/pdf_data_dokter', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();

        $this->load->library('pdf');

        $this->pdf->generate($html, "data-dokter-pdf", $paper_size, $orientation);
    }

    public function exportExcel()
    {
        $data = [
            'judul' => 'Data Dokter Excel', 
            'dokter' => $this->DokterModel->getJoinDokterSpesialisasi()
        ];
        $this->load->view('backend/laporan/dokter/excel_data_dokter', $data);
    }
}