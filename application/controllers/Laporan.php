<?php defined('BASEPATH') OR exit('No Direct Script Access Allowed');

class Laporan extends CI_Controller
{
    // Laporan Dokter
    public function dokter()
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

    public function cetak_data_dokter()
    {
        $data['judul'] = 'Laporan Data Dokter';
        $data['user'] = $this->UserModel->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['dokter'] = $this->DokterModel->getJoinDokterSpesialisasi();

        $this->load->view('backend/laporan/dokter/print_data_dokter', $data);
    }

    public function pdf_data_dokter()
    {
        $data['dokter'] = $this->DokterModel->getJoinDokterSpesialisasi();

        $this->load->view('backend/laporan/dokter/pdf_data_dokter', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();

        $this->load->library('pdf');

        $this->pdf->generate($html, "data-dokter-pdf", $paper_size, $orientation);
    }

    public function excel_data_dokter()
    {
        $data = [
            'judul' => 'Data Dokter Excel', 
            'dokter' => $this->DokterModel->getJoinDokterSpesialisasi()
        ];
        $this->load->view('backend/laporan/dokter/excel_data_dokter', $data);
    }


    // Laporan Obat
    public function obat()
    {
        $data['judul'] = 'Laporan Data Obat';
        $data['user'] = $this->UserModel->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['obat'] = $this->ObatModel->getJoinObatJenisObat();

        $this->load->view('backend/templates/main/header', $data);
        $this->load->view('backend/templates/main/sidebar', $data);
        $this->load->view('backend/templates/main/topbar', $data);
        $this->load->view('backend/laporan/obat/list_laporan_obat', $data);
        $this->load->view('backend/templates/main/footer');
    }

    public function cetak_data_obat()
    {
        $data['judul'] = 'Laporan Data Obat';
        $data['user'] = $this->UserModel->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['obat'] = $this->ObatModel->getJoinObatJenisObat();

        $this->load->view('backend/laporan/obat/print_data_obat', $data);
    }

    public function pdf_data_obat()
    {
        $data['obat'] = $this->ObatModel->getJoinObatJenisObat();

        $this->load->view('backend/laporan/obat/pdf_data_obat', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();

        $this->load->library('pdf');

        $this->pdf->generate($html, "data-obat-pdf", $paper_size, $orientation);
    }

    public function excel_data_obat()
    {
        $data = [
            'judul' => 'Data Obat Excel', 
            'obat' => $this->ObatModel->getJoinObatJenisObat()
        ];
        $this->load->view('backend/laporan/obat/excel_data_obat', $data);
    }
}