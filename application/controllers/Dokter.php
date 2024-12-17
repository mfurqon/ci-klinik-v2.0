<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{
    public function index()
    {
        cek_login();
        cek_akses();

        $data['judul'] = "Data Dokter";
        $data['user'] = $this->ModelUser->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['dokter'] = $this->ModelDokter->getJoinDokterSpesialis();
        $data['spesialis'] = $this->ModelDokter->getAllSpesialis();

        set_tambah_dokter_rules();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/adm_header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/adm_topbar', $data);
            $this->load->view('dokter/dokter-admin', $data);
            $this->load->view('templates/adm_footer');
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
                $gambar = $gambar_obat['file_name']; //digunakan untuk parameter tambahDokter
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect('dokter');
            }

            $this->ModelDokter->tambahDokter($gambar);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message">
                    &#129395; Data Dokter Berhasil ditambah
                </div>'
            );
            redirect('dokter');
        }
    }

    public function detail_dokter()
    {
        cek_login();
        cek_akses();

        $data['judul'] = 'Detail Dokter';
        $data['user'] = $this->ModelUser->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['dokter'] = $this->ModelDokter->getJoinDokterSpesialisById(['dokter.id' => $this->uri->segment(3)]);

        $this->load->view('templates/adm_header', $data);
        $this->load->view('templates/adm_sidebar', $data);
        $this->load->view('templates/adm_topbar', $data);
        $this->load->view('dokter/detail-dokter', $data);
        $this->load->view('templates/adm_footer');
    }

    public function ubah_dokter()
    {
        cek_login();
        cek_akses();

        $data['judul'] = 'Ubah Dokter';
        $data['user'] = $this->ModelUser->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['dokter'] = $this->ModelDokter->getJoinDokterSpesialisById(['dokter.id' => $this->uri->segment(3)]);
        $data['spesialis'] = $this->ModelDokter->getAllSpesialis();

        $nip_lama = $data['dokter']['nip'];
        $nip_baru = $this->input->post('nip', true);
        if ($nip_lama != $nip_baru) {
            $this->form_validation->set_rules('nip', 'NIP', 'required|trim|numeric|is_unique[dokter.nip]|min_length[8]');
        } else {
            $this->form_validation->set_rules('nip', 'NIP', 'required|trim|numeric|min_length[8]');            
        }

        set_ubah_dokter_rules();

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
            $spesialisasi = $this->input->post('spesialis', true);
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
            $this->db->set('id_spesialis', $spesialisasi);
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
            redirect('dokter');
        }
    }

    public function hapus_dokter($id)
    {
        cek_login();
        cek_akses();

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
                &#129395; Data Dokter Berhasil dihapus
            </div>'
        );
        redirect('dokter');
    }

    public function spesialis()
    {
        cek_login();
        cek_akses();

        $data['judul'] = "Data Spesialis Dokter";
        $data['user'] = $this->ModelUser->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['spesialis'] = $this->ModelDokter->getAllSpesialis();

        set_tambah_spesialisasi_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/adm_header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/adm_topbar', $data);
            $this->load->view('dokter/spesialis', $data);
            $this->load->view('templates/adm_footer');
        } else {
            $this->ModelDokter->tambahSpesialis();
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message">
                    &#129395; Data Spesialis Dokter Berhasil ditambah
                </div>'
            );
            redirect('dokter/spesialis');
        }
    }

    public function ubah_spesialis()
    {
        cek_login();
        cek_akses();

        $data['judul'] = 'Ubah Spesialis Dokter';
        $data['user'] = $this->ModelUser->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['spesialis'] = $this->ModelDokter->getSpesialisById(['spesialis.id' => $this->uri->segment(3)]);

        set_ubah_spesialisasi_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/adm_header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/adm_topbar', $data);
            $this->load->view('dokter/ubah-spesialis', $data);
            $this->load->view('templates/adm_footer');
        } else {
            $this->ModelDokter->ubahSpesialis();
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message">
                    &#129395; Data Spesialis Dokter Berhasil diubah
                </div>'
            );
            redirect('dokter/spesialis');
        }
    }

    public function hapus_spesialis()
    {
        cek_login();
        cek_akses();

        $data['user'] = $this->ModelUser->cekDataUser(['email' => $this->session->userdata('email')]);

        $this->ModelDokter->hapusSpesialis($this->uri->segment(3));
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-message">
                &#129395; Data Spesialis Dokter Berhasil dihapus
            </div>'
        );
        redirect('dokter/spesialis');
    }

    public function lihat_dokter()
    {
        $data['judul'] = 'Detail Dokter';
        $data['user'] = $this->ModelUser->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['dokter'] = $this->ModelDokter->getJoinDokterSpesialisById(['dokter.id' => $this->uri->segment(3)]);

        $this->load->view('templates/header', $data);
        $this->load->view('dokter/lihat-dokter', $data);
        $this->load->view('templates/footer');
    }
}
