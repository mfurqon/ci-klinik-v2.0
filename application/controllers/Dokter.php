<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{
    public function index()
    {
        $data['judul'] = "Dokter";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role_id'] = $this->session->userdata('role_id');
        $data['dokter'] = $this->ModelDokter->getAllDokter();

        $this->load->view('templates/header', $data);
        $this->load->view('dokter/index', $data);
        $this->load->view('templates/footer');
    }

    public function manage()
    {
        cek_login();
        cek_akses();

        $data['judul'] = "Data Dokter";
        $data['user'] = $this->ModelUser->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['dokter'] = $this->ModelDokter->getAllDokter();

        $this->ModelDokter->form_validation_tambah_dokter();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/adm_header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/adm_topbar', $data);
            $this->load->view('dokter/dokter-admin', $data);
            $this->load->view('templates/adm_footer');
        } else {
            $nip = $this->input->post('nip', true);
            $nama_dokter = $this->input->post('nama_dokter', true);
            $spesialisasi = $this->input->post('spesialisasi', true);
            $jenis_kelamin = $this->input->post('jenis_kelamin', true);
            $telepon = $this->input->post('telepon', true);
            $email = $this->input->post('email', true);
            $alamat = $this->input->post('alamat', true);
            $jam_masuk = $this->input->post('jam_masuk', true);
            $jam_keluar = $this->input->post('jam_keluar', true);
            $tanggal_ditambahkan = $this->input->post('tanggal_ditambahkan');

            // Konfigurasi Sebelum Gambar Di-Upload
            $config['upload_path'] = './assets/img/upload-dokter/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '3000';
            $config['file_name'] = 'dokter-' . time();

            // Memuat atau memanggil library upload
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar_dokter')) {
                $gambar_dokter = $this->upload->data('file_name');

                $this->db->set('gambar_dokter', $gambar_dokter);
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect('dokter/dokterAdmin');
            }

            $this->db->set('nip', $nip);
            $this->db->set('nama_dokter', $nama_dokter);
            $this->db->set('spesialisasi', $spesialisasi);
            $this->db->set('jenis_kelamin', $jenis_kelamin);
            $this->db->set('telepon', $telepon);
            $this->db->set('email', $email);
            $this->db->set('alamat', $alamat);
            $this->db->set('jam_masuk', $jam_masuk);
            $this->db->set('jam_keluar', $jam_keluar);
            $this->db->set('tanggal_ditambahkan', $tanggal_ditambahkan);

            $this->db->insert('dokter');
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message">
                    &#129395; Data Dokter Berhasil ditambah
                </div>'
            );
            redirect('dokter/manage');
        }
    }

    public function detailDokter()
    {
        cek_masuk();

        $data['judul'] = 'Detail Dokter';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role_id'] = $this->session->userdata('role_id');
        $data['dokter'] = $this->ModelDokter->dokterWhere(['id' => $this->uri->segment(3)])->row_array();

        $this->load->view('templates/adm_header', $data);
        $this->load->view('templates/adm_sidebar', $data);
        $this->load->view('templates/adm_topbar', $data);
        $this->load->view('dokter/detail-dokter', $data);
        $this->load->view('templates/adm_footer');
    }

    public function ubahDokter()
    {
        cek_masuk();

        $data['judul'] = 'Ubah Dokter';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role_id'] = $this->session->userdata('role_id');
        $data['dokter'] = $this->ModelDokter->dokterWhere(['id' => $this->uri->segment(3)])->row_array();

        $nip_lama = $data['dokter']['nip'];
        $nip_baru = $this->input->post('nip', true);
        if ($nip_lama != $nip_baru) {
            $this->form_validation->set_rules('nip', 'NIP', 'required|trim|numeric|is_unique[dokter.nip]|min_length[8]');
        } else {
            $this->form_validation->set_rules('nip', 'NIP', 'required|trim|numeric|min_length[8]');
        }

        $this->form_validation->set_rules('nama_dokter', 'Nama Dokter', 'required|trim');
        $this->form_validation->set_rules('spesialisasi', 'Spesialisasi', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('telepon', 'Nomor Telepon', 'required|trim|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('jam_masuk', 'Jam Masuk', 'required');
        $this->form_validation->set_rules('jam_keluar', 'Jam Keluar', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/adm_header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/adm_topbar', $data);
            $this->load->view('dokter/ubah-dokter', $data);
            $this->load->view('templates/adm_footer');
        } else {
            $id = $this->input->post('id', true);
            $nip = $this->input->post('nip', true);
            $nama_dokter = $this->input->post('nama_dokter', true);
            $spesialisasi = $this->input->post('spesialisasi', true);
            $jenis_kelamin = $this->input->post('jenis_kelamin', true);
            $telepon = $this->input->post('telepon', true);
            $email = $this->input->post('email', true);
            $alamat = $this->input->post('alamat', true);
            $jam_masuk = $this->input->post('jam_masuk', true);
            $jam_keluar = $this->input->post('jam_keluar', true);


            $config['upload_path'] = './assets/img/upload-dokter/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            // $config['max_size'] = '3000';
            // $config['max_width'] = '1024';
            // $config['max_height'] = '1024';
            $config['file_name'] = 'dokter-' . time();

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar_dokter')) {
                $gambar_lama = $data['dokter']['gambar_dokter'];
                if ($gambar_lama != 'gambar_dokter') {
                    unlink(FCPATH . 'assets/img/upload-dokter/' . $gambar_lama);
                }

                $gambar_baru = $this->upload->data('file_name');
                $this->db->set('gambar_dokter', $gambar_baru);
            }


            // $this->ModelDokter->ubahDataDokter();
            $this->db->set('nip', $nip);
            $this->db->set('nama_dokter', $nama_dokter);
            $this->db->set('spesialisasi', $spesialisasi);
            $this->db->set('jenis_kelamin', $jenis_kelamin);
            $this->db->set('telepon', $telepon);
            $this->db->set('email', $email);
            $this->db->set('alamat', $alamat);
            $this->db->set('jam_masuk', $jam_masuk);
            $this->db->set('jam_keluar', $jam_keluar);

            $this->db->where('id', $id);
            $this->db->update('dokter');

            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message">
                    &#129395; Data Dokter Berhasil diubah
                </div>'
            );
            redirect('dokter/dokterAdmin');
        }
    }

    public function hapusDokter($id)
    {
        cek_masuk();

        $data['judul'] = 'Hapus Dokter';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role_id'] = $this->session->userdata('role_id');
        $data['dokter'] = $this->ModelDokter->getDokterById($id);

        $gambar_dokter = $data['dokter']['gambar_dokter'];
        unlink(FCPATH . 'assets/img/upload-dokter/' . $gambar_dokter);


        $this->ModelDokter->hapusDataDokter($id);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-message">
                Data Dokter Berhasil dihapus
            </div>'
        );
        redirect('dokter/dokterAdmin');
    }

    public function lihatDokter($id)
    {
        $data['judul'] = 'Detail Dokter';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role_id'] = $this->session->userdata('role_id');
        $data['dokter'] = $this->ModelDokter->getDokterById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('dokter/lihat-dokter', $data);
        $this->load->view('templates/footer');
    }
}
