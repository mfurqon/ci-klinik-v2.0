<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class PemesananObat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_belum_login_admin();
        cek_akses();
    }

    public function index()
    {
        $data['judul'] = "Data Pemesanan Obat";
        $data['user'] = $this->UserModel->getUserWhere(['email' => $this->session->userdata('email')]);
        $data['role_id'] = $this->session->userdata('role_id');
        $data['pemesanan_obat'] = $this->PemesananObatModel->getAllPemesananObat();

        $this->load->view('backend/templates/main/header', $data);
        $this->load->view('backend/templates/main/sidebar', $data);
        $this->load->view('backend/templates/main/topbar', $data);
        $this->load->view('backend/obat/pemesanan/list_pemesanan_obat', $data);
        $this->load->view('backend/templates/main/footer', $data);
    }

    public function hapus($id_pemesanan)
    {
        $data['user'] = $this->UserModel->getUserWhere(['email' => $this->session->userdata('email')]);
        $data['role_id'] = $this->session->userdata('role_id');
        $data['pemesanan_obat'] = $this->PemesananObatModel->getPemesananByIdPemesanan($id_pemesanan);

        $this->PemesananObatModel->deletePemesananObat($id_pemesanan);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-message">
                &#129395; Data Pemesanan Obat Berhasil dihapus
            </div>'
        );
        redirect('admin/pemesanan-obat');
    }
}