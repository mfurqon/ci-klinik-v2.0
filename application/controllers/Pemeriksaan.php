<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemeriksaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_masuk();
    }

    public function index()
    {
        $data['judul'] = 'Data Pemeriksaan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pemeriksaan'] = $this->ModelPemeriksaan->getAllPemeriksaan();
        $data['dokter'] = $this->ModelDokter->getAllDokter();

        $this->ModelPemeriksaan->form_validation_tambah_pemeriksaan();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/adm_header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/adm_topbar', $data);
            $this->load->view('pemeriksaan/index', $data);
            $this->load->view('templates/adm_footer');
        } else {
            $this->ModelPemeriksaan->tambahPemeriksaan();

            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message">
                    &#129395; Data Pemeriksaan Berhasil ditambah
                </div>'
            );
            redirect('pemeriksaan');
        }
    }

    public function detailPemeriksaan()
    {
        $data['judul'] = 'Detail Pemeriksaan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role_id'] = $this->session->userdata('role_id');
        $data['pemeriksaan'] = $this->ModelPemeriksaan->pemeriksaanWhere(['id' => $this->uri->segment(3)])->row_array();

        $this->load->view('templates/adm_header', $data);
        $this->load->view('templates/adm_sidebar', $data);
        $this->load->view('templates/adm_topbar', $data);
        $this->load->view('pemeriksaan/detail-pemeriksaan', $data);
        $this->load->view('templates/adm_footer');
    }

    public function ubahPemeriksaan()
    {
        $data['judul'] = 'Ubah Pemeriksaan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role_id'] = $this->session->userdata('role_id');
        $data['pemeriksaan'] = $this->ModelPemeriksaan->pemeriksaanWhere(['id' => $this->uri->segment(3)])->row_array();
        $data['dokter'] = $this->ModelDokter->getAllDokter();

        $this->ModelPemeriksaan->form_validation_ubah_pemeriksaan();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/adm_header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/adm_topbar', $data);
            $this->load->view('pemeriksaan/ubah-pemeriksaan', $data);
            $this->load->view('templates/adm_footer');
        } else {
            $this->ModelPemeriksaan->ubahPemeriksaan();

            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message">
                    &#129395; Data Pemeriksaan Berhasil diubah
                </div>'
            );
            redirect('pemeriksaan');
        }
    }

    public function hapusPemeriksaan()
    {
        $this->ModelPemeriksaan->hapusPemeriksaan();

        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-message">
                &#129395; Data Pemeriksaan Berhasil dihapus
            </div>'
        );
        redirect('pemeriksaan');
    }
}
