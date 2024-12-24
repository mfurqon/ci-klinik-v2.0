<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class JenisObat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_belum_login_admin();
        cek_akses();
    }

    public function index()
    {
        $data['judul'] = "Data Jenis Obat";
        $data['user'] = $this->UserModel->getUserWhere(['email' => $this->session->userdata('email')]);
        $data['jenis_obat'] = $this->JenisObatModel->getAllJenisObat();

        set_tambah_jenis_obat_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/templates/main/header', $data);
            $this->load->view('backend/templates/main/sidebar', $data);
            $this->load->view('backend/templates/main/topbar', $data);
            $this->load->view('backend/obat/jenis/list_jenis_obat', $data);
            $this->load->view('backend/templates/main/footer');
        } else {
            $this->JenisObatModel->insertJenisObat();
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message">
                    &#129395; Data Jenis Obat Berhasil ditambah
                </div>'
            );
            redirect('admin/jenis-obat');
        }
    }

    public function ubah()
    {
        $data['judul'] = 'Ubah Jenis Obat';
        $data['user'] = $this->UserModel->getUserWhere(['email' => $this->session->userdata('email')]);
        $data['jenis_obat'] = $this->JenisObatModel->getJenisObatById(['jenis_obat.id' => $this->uri->segment(4)]);

        set_ubah_jenis_obat_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/templates/main/header', $data);
            $this->load->view('backend/templates/main/sidebar', $data);
            $this->load->view('backend/templates/main/topbar', $data);
            $this->load->view('backend/obat/jenis/edit_jenis_obat', $data);
            $this->load->view('backend/templates/main/footer');
        } else {
            $this->JenisObatModel->updateJenisObat();
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message">
                    &#129395; Data Jenis Obat Berhasil diubah
                </div>'
            );
            redirect('admin/jenis-obat');
        }
    }

    public function hapus()
    {
        $data['user'] = $this->UserModel->getUserWhere(['email' => $this->session->userdata('email')]);

        $this->JenisObatModel->deleteJenisObat($this->uri->segment(4));
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-message">
                &#129395; Data Jenis Obat Berhasil dihapus
            </div>'
        );
        redirect('admin/jenis-obat');
    }
}