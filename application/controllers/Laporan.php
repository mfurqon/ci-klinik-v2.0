<?php defined('BASEPATH') OR exit('No Direct Script Access Allowed');

class Laporan extends CI_Controller
{
    // Laporan Dokter
    public function dokter()
    {
        $data['judul'] = 'Laporan Data Dokter';
        $data['user'] = $this->ModelUser->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['dokter'] = $this->ModelDokter->getJoinDokterSpesialisasi();

        $this->load->view('backend/templates/main/header', $data);
        $this->load->view('backend/templates/main/sidebar', $data);
        $this->load->view('backend/templates/main/topbar', $data);
        $this->load->view('laporan/laporan-dokter', $data);
        $this->load->view('backend/templates/main/footer');
    }

    public function cetak_data_dokter()
    {
        $data['judul'] = 'Laporan Data Dokter';
        $data['user'] = $this->ModelUser->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['dokter'] = $this->ModelDokter->getJoinDokterSpesialisasi();

        $this->load->view('laporan/cetak-data-dokter', $data);
    }

    public function pdf_data_dokter()
    {
        $data['dokter'] = $this->ModelDokter->getJoinDokterSpesialisasi();

        $this->load->view('laporan/pdf-data-dokter', $data);

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
            'dokter' => $this->ModelDokter->getJoinDokterSpesialisasi()
        ];
        $this->load->view('laporan/excel-data-dokter', $data);
    }


    // Laporan Obat
    public function obat()
    {
        $data['judul'] = 'Laporan Data Obat';
        $data['user'] = $this->ModelUser->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['obat'] = $this->ModelObat->getJoinObatJenisObat();

        $this->load->view('backend/templates/main/header', $data);
        $this->load->view('backend/templates/main/sidebar', $data);
        $this->load->view('backend/templates/main/topbar', $data);
        $this->load->view('laporan/laporan-obat', $data);
        $this->load->view('backend/templates/main/footer');
    }

    public function cetak_data_obat()
    {
        $data['judul'] = 'Laporan Data Obat';
        $data['user'] = $this->ModelUser->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['obat'] = $this->ModelObat->getJoinObatJenisObat();

        $this->load->view('laporan/cetak-data-obat', $data);
    }

    public function pdf_data_obat()
    {
        $data['obat'] = $this->ModelObat->getJoinObatJenisObat();

        $this->load->view('laporan/pdf-data-obat', $data);

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
            'obat' => $this->ModelObat->getJoinObatJenisObat()
        ];
        $this->load->view('laporan/excel-data-obat', $data);
    }
}