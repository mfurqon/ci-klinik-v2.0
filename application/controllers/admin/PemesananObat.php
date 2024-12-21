<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class PemesananObat extends CI_Controller
{
    public function index()
    {
        cek_login();
        cek_akses();

        $data['judul'] = "Data Pemesanan Obat";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role_id'] = $this->session->userdata('role_id');
        $data['pemesanan_obat'] = $this->PemesananObatModel->getAllPemesananObat();

        $this->load->view('backend/templates/main/header', $data);
        $this->load->view('backend/templates/main/sidebar', $data);
        $this->load->view('backend/templates/main/topbar', $data);
        $this->load->view('backend/obat/pemesanan/list_pemesanan_obat', $data);
        $this->load->view('backend/templates/main/footer', $data);
    }

    public function detailPemesananObat()
    {
        cek_masuk();

        $data['judul'] = 'Detail Pemesanan Obat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role_id'] = $this->session->userdata('role_id');
        $data['pemesanan_obat'] = $this->PemesananObatModel->pemesananObatWhere(['id' => $this->uri->segment(3)]);

        $this->load->view('backend/templates/main/header', $data);
        $this->load->view('backend/templates/main/sidebar', $data);
        $this->load->view('backend/templates/main/topbar', $data);
        $this->load->view('backend/obat/pemesanan/detail_pemesanan_obat', $data);
        $this->load->view('backend/templates/main/footer');
    }

    public function hapusPemesananObat($id)
    {
        cek_masuk();

        $data['judul'] = 'Hapus Obat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role_id'] = $this->session->userdata('role_id');
        $data['pemesanan_obat'] = $this->ObatModel->obatWhere(['obat.id' => $this->uri->segment(3)]);

        $this->PemesananObatModel->deletePemesananObat($id);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-message">
                &#129395; Data Pemesanan Obat Berhasil dihapus
            </div>'
        );
        redirect('obat/pemesananObat');
    }
}