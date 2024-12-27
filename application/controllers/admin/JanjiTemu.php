<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JanjiTemu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_belum_login_admin();
        cek_akses();
    }

    public function index()
    {
        $data['judul'] = 'Data Janji Temu';
        $data['user'] = $this->UserModel->getUserWhere(['email' => $this->session->userdata('email')]);

        $this->JanjiTemuModel->updateJanjiTemuOtomatis();

        $data['janji_temu'] = $this->JanjiTemuModel->getAllJanjiTemu();

        $this->load->view('backend/templates/main/header', $data);
        $this->load->view('backend/templates/main/sidebar', $data);
        $this->load->view('backend/templates/main/topbar', $data);
        $this->load->view('backend/janji_temu/list_janji_temu', $data);
        $this->load->view('backend/templates/main/footer');
    }

    public function ubahStatus()
    {
        $id_janji_temu = $this->uri->segment(4);

        // Validasi ID janji temu
        if (!is_numeric($id_janji_temu) || empty($id_janji_temu)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-message alert-danger">ID tidak valid!</div>');
            redirect('admin/janji-temu');
            return;
        }

        $update = $this->JanjiTemuModel->updateStatusJanjiTemu($id_janji_temu);

        if ($update) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-message alert-success">Status berhasil diubah!</div>');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-message alert-danger">Gagal mengubah status!</div>');
        }
        
        redirect('admin/janji-temu');
    }

    public function detailJanjiTemu()
    {
        $data['judul'] = 'Detail Janji Temu';
        $data['user'] = $this->UserModel->getUserWhere(['email' => $this->session->userdata('email')]);
        $data['janji_temu'] = $this->JanjiTemuModel->janjiTemuWhere(['id' => $this->uri->segment(3)])->row_array();

        $this->load->view('backend/templates/main/header', $data);
        $this->load->view('backend/templates/main/sidebar', $data);
        $this->load->view('backend/templates/main/topbar', $data);
        $this->load->view('backend/janji_temu/detail_janji_temu', $data);
        $this->load->view('backend/templates/main/footer');
    }

    public function ubahJanjiTemu()
    {
        $data['judul'] = 'Ubah Janji Temu';
        $data['user'] = $this->UserModel->getUserWhere(['email' => $this->session->userdata('email')]);
        $data['janji_temu'] = $this->JanjiTemuModel->janjiTemuWhere(['id' => $this->uri->segment(3)])->row_array();
        $data['nama_dokter'] = $this->DokterModel->getAllDokter();

        $email_lama = $data['janji_temu']['email'];
        $email_baru = $this->input->post('email', true);
        if ($email_lama != $email_baru) {
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[janji_temu.email]');
        } else {
            $this->form_validation->set_rules('email', 'NIP', 'required|trim|valid_email');
        }

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('telepon', 'Nomor Telepon', 'required|trim|numeric');
        $this->form_validation->set_rules('nama_dokter', 'Nama Dokter', 'required|trim');
        $this->form_validation->set_rules('tanggal_temu', 'Tanggal Temu', 'required|trim');
        $this->form_validation->set_rules('jam_temu', 'Jam Temu', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/templates/main/header', $data);
            $this->load->view('backend/templates/main/sidebar', $data);
            $this->load->view('backend/templates/main/topbar', $data);
            $this->load->view('backend/janji_temu/ubah_janji_temu', $data);
            $this->load->view('backend/templates/main/footer');
        } else {
            $this->JanjiTemuModel->updateJanjiTemu();

            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message">
                    &#129395; Data Janji Temu berhasil diubah
                </div>'
            );
            redirect('admin/janji-temu');
        }
    }

    public function hapusJanjiTemu()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->JanjiTemuModel->deleteJanjiTemu($where);

        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-message">
                Data Janji Temu berhasil dihapus
            </div>'
        );
        redirect('admin/janji-temu');
    }
}
