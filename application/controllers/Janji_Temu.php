<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Janji_Temu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        cek_akses();
    }

    public function index()
    {
        $data['judul'] = 'Data Janji Temu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['janji_temu'] = $this->ModelJanjiTemu->getAllJanjiTemu();

        $this->load->view('templates/backend/main/header', $data);
        $this->load->view('templates/backend/main/sidebar', $data);
        $this->load->view('templates/backend/main/topbar', $data);
        $this->load->view('janji-temu/index', $data);
        $this->load->view('templates/backend/main/footer');
    }

    public function detailJanjiTemu()
    {
        $data['judul'] = 'Detail Janji Temu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['janji_temu'] = $this->ModelJanjiTemu->janjiTemuWhere(['id' => $this->uri->segment(3)])->row_array();

        $this->load->view('templates/backend/main/header', $data);
        $this->load->view('templates/backend/main/sidebar', $data);
        $this->load->view('templates/backend/main/topbar', $data);
        $this->load->view('janji-temu/detail-janji-temu', $data);
        $this->load->view('templates/backend/main/footer');
    }

    public function ubahJanjiTemu()
    {
        $data['judul'] = 'Ubah Janji Temu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['janji_temu'] = $this->ModelJanjiTemu->janjiTemuWhere(['id' => $this->uri->segment(3)])->row_array();
        $data['nama_dokter'] = $this->ModelDokter->getAllDokter();

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
            $this->load->view('templates/backend/main/header', $data);
            $this->load->view('templates/backend/main/sidebar', $data);
            $this->load->view('templates/backend/main/topbar', $data);
            $this->load->view('janji-temu/ubah-janji-temu', $data);
            $this->load->view('templates/backend/main/footer');
        } else {
            $this->ModelJanjiTemu->ubahJanjiTemu();

            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message">
                    &#129395; Data Janji Temu berhasil diubah
                </div>'
            );
            redirect('janjiTemu');
        }
    }

    public function hapusJanjiTemu()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelJanjiTemu->hapusJanjiTemu($where);

        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-message">
                Data Janji Temu berhasil dihapus
            </div>'
        );
        redirect('janjiTemu');
    }
}
