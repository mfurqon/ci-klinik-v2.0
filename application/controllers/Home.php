<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'Beranda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role_id'] = $this->session->userdata('role_id');
        $data['dokter'] = $this->ModelDokter->getAllDokter();
        $data['dokter_limit'] = $this->ModelDokter->getDokterLimit();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('telepon', 'Nomor Handphone', 'required|trim|numeric');
        $this->form_validation->set_rules('dokter', 'Dokter', 'required');
        $this->form_validation->set_rules('tanggal_temu', 'Tanggal Temu', 'required');
        $this->form_validation->set_rules('jam_temu', 'Jam Temu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('home/index', $data);
            $this->load->view('templates/footer');
        } else {
            cek_belum_login();

            $this->ModelJanjiTemu->tambahJanjiTemu($data);
            echo "<script>
                    alert('Janji Temu berhasil dibuat');
                    window.location.href='" . base_url('home') . "';
                </script>";
            exit;
        }
    }

    public function tentang()
    {
        $data['judul'] = 'Tentang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role_id'] = $this->session->userdata('role_id');

        $this->load->view('templates/header', $data);
        $this->load->view('home/tentang');
        $this->load->view('templates/footer');
    }
}
