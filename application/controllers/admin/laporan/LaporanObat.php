<?php 
defined('BASEPATH') OR exit('no direct script access allowed');

class LaporanObat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_belum_login_admin();
        cek_akses();
    }
    
    public function index()
    {
        $data['judul'] = 'Laporan Data Obat';
        $data['user'] = $this->UserModel->getUserWhere(['email' => $this->session->userdata('email')]);
        $data['obat'] = $this->ObatModel->getJoinObatJenisObat();

        $this->load->view('backend/templates/main/header', $data);
        $this->load->view('backend/templates/main/sidebar', $data);
        $this->load->view('backend/templates/main/topbar', $data);
        $this->load->view('backend/laporan/obat/list_laporan_obat', $data);
        $this->load->view('backend/templates/main/footer');
    }

    public function print()
    {
        $data['judul'] = 'Laporan Data Obat';
        $data['user'] = $this->UserModel->getUserWhere(['email' => $this->session->userdata('email')]);
        $data['obat'] = $this->ObatModel->getJoinObatJenisObat();

        $this->load->view('backend/laporan/obat/print_data_obat', $data);
    }

    public function exportPdf()
    {
        $data['obat'] = $this->ObatModel->getJoinObatJenisObat();

        $this->load->view('backend/laporan/obat/pdf_data_obat', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();

        $this->load->library('pdf');

        $this->pdf->generate($html, "data-obat-pdf", $paper_size, $orientation);
    }

    public function exportExcel()
    {
        $data = [
            'judul' => 'Data Obat Excel', 
            'obat' => $this->ObatModel->getJoinObatJenisObat()
        ];
        $this->load->view('backend/laporan/obat/excel_data_obat', $data);
    }
}