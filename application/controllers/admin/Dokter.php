<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_belum_login_admin();
        cek_akses();
    }
    
    public function index()
    {
        $data['judul'] = "Data Dokter";
        $data['user'] = $this->UserModel->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['dokter'] = $this->DokterModel->getJoinDokterSpesialisasi();
        $data['spesialisasi'] = $this->SpesialisasiModel->getAllSpesialisasi();

        set_tambah_dokter_rules();

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/templates/main/header', $data);
            $this->load->view('backend/templates/main/sidebar', $data);
            $this->load->view('backend/templates/main/topbar', $data);
            $this->load->view('backend/dokter/data/list_dokter', $data);
            $this->load->view('backend/templates/main/footer');
        } else {
            // Konfigurasi Sebelum Gambar Di-Upload
            $config['upload_path'] = './assets/img/upload-dokter/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
            $config['max_size'] = '5120';
            $config['max_width'] = '1920';
            $config['max_height'] = '1920';
            $config['file_name'] = 'dokter-' . time();

            // Memuat atau memanggil library upload
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar_dokter')) {
                $gambar_obat = $this->upload->data();
                $gambar = $gambar_obat['file_name']; //digunakan untuk parameter insertDokter
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect('admin/dokter');
            }

            $this->DokterModel->insertDokter($gambar);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message">
                    &#129395; Data Dokter Berhasil ditambah
                </div>'
            );
            redirect('admin/dokter');
        }
    }

    public function detail()
    {
        $data['judul'] = 'Detail Dokter';
        $data['user'] = $this->UserModel->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['dokter'] = $this->DokterModel->getJoinDokterSpesialisasiById(['dokter.id' => $this->uri->segment(4)]);

        $this->load->view('backend/templates/main/header', $data);
        $this->load->view('backend/templates/main/sidebar', $data);
        $this->load->view('backend/templates/main/topbar', $data);
        $this->load->view('backend/dokter/data/detail_dokter', $data);
        $this->load->view('backend/templates/main/footer');
    }

    public function ubah()
    {
        $data['judul'] = 'Ubah Dokter';
        $data['user'] = $this->UserModel->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['dokter'] = $this->DokterModel->getJoinDokterSpesialisasiById(['dokter.id' => $this->uri->segment(4)]);
        $data['spesialisasi'] = $this->SpesialisasiModel->getAllSpesialisasi();

        $nip_lama = $data['dokter']['nip'];
        $nip_baru = $this->input->post('nip', true);
        if ($nip_lama != $nip_baru) {
            $this->form_validation->set_rules('nip', 'NIP', 'required|trim|numeric|is_unique[dokter.nip]|min_length[8]');
        } else {
            $this->form_validation->set_rules('nip', 'NIP', 'required|trim|numeric|min_length[8]');            
        }

        set_ubah_dokter_rules();

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/templates/main/header', $data);
            $this->load->view('backend/templates/main/sidebar', $data);
            $this->load->view('backend/templates/main/topbar', $data);
            $this->load->view('backend/dokter/data/edit_dokter', $data);
            $this->load->view('backend/templates/main/footer');
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
            $config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
            $config['max_size'] = '5120';
            $config['max_width'] = '1920';
            $config['max_height'] = '1920';
            $config['file_name'] = 'dokter-' . time();

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar_dokter')) {
                $gambar_lama = $data['dokter']['gambar'];
                if ($gambar_lama != 'gambar_dokter') {
                    unlink(FCPATH . 'assets/img/upload-dokter/' . $gambar_lama);
                }

                $gambar_baru = $this->upload->data('file_name');
                $this->db->set('gambar', $gambar_baru);
            }


            $this->db->set('nip', $nip);
            $this->db->set('nama', $nama_dokter);
            $this->db->set('id_spesialisasi', $spesialisasi);
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
            redirect('admin/dokter');
        }
    }

    public function hapus($id)
    {
        $data['judul'] = 'Hapus Dokter';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role_id'] = $this->session->userdata('role_id');
        $data['dokter'] = $this->DokterModel->getDokterById($id);

        $gambar_dokter = $data['dokter']['gambar'];

        unlink(FCPATH . 'assets/img/upload-dokter/' . $gambar_dokter);

        $this->DokterModel->deleteDokter($id);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-message">
                &#129395; Data Dokter Berhasil dihapus
            </div>'
        );
        redirect('admin/dokter');
    }
}
