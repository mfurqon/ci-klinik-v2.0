<?php 
defined('BASEPATH') OR exit('no direct script access allowed');

class LaporanUser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_belum_login_admin();
        cek_akses();
    }
    
    public function index()
    {
        $data['judul'] = 'Laporan Data User';
        $data['user'] = $this->UserModel->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['users'] = $this->UserModel->getJoinUserRole();

        $this->load->view('backend/templates/main/header', $data);
        $this->load->view('backend/templates/main/sidebar', $data);
        $this->load->view('backend/templates/main/topbar', $data);
        $this->load->view('backend/laporan/user/list_laporan_user', $data);
        $this->load->view('backend/templates/main/footer');
    }

    public function print()
    {
        $data['judul'] = 'Print Data User';
        $data['user'] = $this->UserModel->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['users'] = $this->UserModel->getJoinUserRole();

        $this->load->view('backend/laporan/user/print_data_user', $data);
    }

    public function exportPdf()
    {
        $data['users'] = $this->UserModel->getJoinUserRole();

        $this->load->view('backend/laporan/user/pdf_data_user', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();

        $this->load->library('pdf');

        $this->pdf->generate($html, "data-user-pdf", $paper_size, $orientation);
    }

    public function exportExcel()
    {
        $data = [
            'judul' => 'Data User Excel', 
            'users' => $this->UserModel->getJoinUserRole()
        ];
        $this->load->view('backend/laporan/user/excel_data_user', $data);
    }
}