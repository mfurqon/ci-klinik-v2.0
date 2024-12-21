<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class Spesialisasi extends CI_Controller
{
    public function index()
    {
        cek_login();
        cek_akses();

        $data['judul'] = "Data Spesialisasi Dokter";
        $data['user'] = $this->UserModel->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['spesialisasi'] = $this->SpesialisasiModel->getAllSpesialisasi();

        set_tambah_spesialisasi_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/templates/main/header', $data);
            $this->load->view('backend/templates/main/sidebar', $data);
            $this->load->view('backend/templates/main/topbar', $data);
            $this->load->view('backend/dokter/spesialisasi/list_spesialisasi', $data);
            $this->load->view('backend/templates/main/footer');
        } else {
            $this->SpesialisasiModel->insertSpesialisasi();
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message">
                    &#129395; Data Spesialisasi Dokter Berhasil ditambah
                </div>'
            );
            redirect('dokter/spesialisasi');
        }
    }

    public function ubah()
    {
        cek_login();
        cek_akses();

        $data['judul'] = 'Ubah Spesialisasi Dokter';
        $data['user'] = $this->UserModel->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['spesialisasi'] = $this->SpesialisasiModel->getSpesialisasiById(['spesialisasi.id' => $this->uri->segment(3)]);

        set_ubah_spesialisasi_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/templates/main/header', $data);
            $this->load->view('backend/templates/main/sidebar', $data);
            $this->load->view('backend/templates/main/topbar', $data);
            $this->load->view('backend/dokter/spesialisasi/edit_spesialisasi', $data);
            $this->load->view('backend/templates/main/footer');
        } else {
            $this->SpesialisasiModel->updateSpesialisasi();
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message">
                    &#129395; Data Spesialisasi Dokter Berhasil diubah
                </div>'
            );
            redirect('dokter/spesialisasi');
        }
    }

    public function hapus()
    {
        cek_login();
        cek_akses();

        $data['user'] = $this->UserModel->cekDataUser(['email' => $this->session->userdata('email')]);

        $this->SpesialisasiModel->deleteSpesialisasi($this->uri->segment(3));
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-message">
                &#129395; Data Spesialisasi Dokter Berhasil dihapus
            </div>'
        );
        redirect('dokter/spesialisasi');
    }
}