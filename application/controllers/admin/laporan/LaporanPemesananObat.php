<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class LaporanPemesananObat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_belum_login_admin();
        cek_akses();
    }
    
    public function index()
    {
        $data['judul'] = 'Laporan Pemesanan Obat';
        $data['user'] = $this->UserModel->getUserWhere(['email' => $this->session->userdata('email')]);
        $data['pemesanan_obat'] = $this->PemesananObatModel->getAllPemesananObat();

        $this->load->view('backend/templates/main/header', $data);
        $this->load->view('backend/templates/main/sidebar', $data);
        $this->load->view('backend/templates/main/topbar', $data);
        $this->load->view('backend/laporan/pemesanan_obat/list_laporan_pemesanan_obat', $data);
        $this->load->view('backend/templates/main/footer');
    }

    public function print()
    {
        $data['judul'] = 'Print Data Pemesanan Obat';
        $data['user'] = $this->UserModel->getUserWhere(['email' => $this->session->userdata('email')]);
        $data['pemesanan_obat'] = $this->PemesananObatModel->getAllPemesananObat();

        $this->load->view('backend/laporan/pemesanan_obat/print_data_pemesanan_obat', $data);
    }

    public function exportPdf()
    {
        $data['pemesanan_obat'] = $this->PemesananObatModel->getAllPemesananObat();

        $this->load->view('backend/laporan/pemesanan_obat/pdf_data_pemesanan_obat', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();

        $this->load->library('pdf');

        $this->pdf->generate($html, "Data Pemesanan Obat PDF", $paper_size, $orientation);
    }

    public function exportExcel()
    {
        $data = [
            'judul' => 'Data Pemesanan Obat Excel',
            'pemesanan_obat' => $this->PemesananObatModel->getAllPemesananObat()
        ];

        $this->load->view('backend/laporan/pemesanan_obat/excel_data_pemesanan_obat', $data);
    }
}