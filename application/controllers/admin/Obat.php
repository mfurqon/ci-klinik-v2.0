<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_belum_login_admin();
        cek_akses();
    }
    
    public function index()
    {
        $data['judul'] = "Data Obat";
        $data['user'] = $this->UserModel->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['obat'] = $this->ObatModel->getJoinObatJenisObat();
        $data['jenis_obat'] = $this->JenisObatModel->getAllJenisObat();

        set_tambah_obat_rules();

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/templates/main/header', $data);
            $this->load->view('backend/templates/main/sidebar', $data);
            $this->load->view('backend/templates/main/topbar', $data);
            $this->load->view('backend/obat/data/list_obat', $data);
            $this->load->view('backend/templates/main/footer');
        } else {
            $upload_image = $_FILES['gambar_obat'];

            if ($upload_image) {
                // Konfigurasi Sebelum Gambar Di-Upload
                $config['upload_path'] = './assets/img/upload-obat/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
                $config['max_size'] = '5120';
                $config['max_width'] = '1920';
                $config['max_height'] = '1080';
                $config['file_name'] = 'obat-' . time();

                // Memuat atau memanggil library upload
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar_obat')) {
                    $gambar_obat = $this->upload->data();
                    $gambar = $gambar_obat['file_name']; //digunakan untuk parameter insertObat
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('admin/obat');
                }
            }

            $this->ObatModel->insertObat($gambar); //didapatkan dari variable file_name di atas
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message">
                    &#129395; Data Obat Berhasil ditambah
                </div>'
            );
            redirect('admin/obat');
        }
    }

    public function detail()
    {
        $data['judul'] = 'Detail Obat';
        $data['user'] = $this->UserModel->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['obat'] = $this->ObatModel->getObatJenisObatById(['obat.id' => $this->uri->segment(4)]);

        $this->load->view('backend/templates/main/header', $data);
        $this->load->view('backend/templates/main/sidebar', $data);
        $this->load->view('backend/templates/main/topbar', $data);
        $this->load->view('backend/obat/data/detail_obat', $data);
        $this->load->view('backend/templates/main/footer');
    }

    public function ubah()
    {
        $data['judul'] = 'Ubah Obat';
        $data['user'] = $this->UserModel->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['obat'] = $this->ObatModel->getObatJenisObatById(['obat.id' => $this->uri->segment(4)]);
        $data['jenis_obat'] = $this->JenisObatModel->getAllJenisObat();

        set_ubah_obat_rules();

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/templates/main/header', $data);
            $this->load->view('backend/templates/main/sidebar', $data);
            $this->load->view('backend/templates/main/topbar', $data);
            $this->load->view('backend/obat/data/edit_obat', $data);
            $this->load->view('backend/templates/main/footer');
        } else {
            $id = $this->input->post('id', true);
            $nama_obat = $this->input->post('nama_obat', true);
            $id_jenis_obat = $this->input->post('id_jenis_obat', true);
            $harga = $this->input->post('harga', true);
            $deskripsi = $this->input->post('deskripsi', true);
            $stok = $this->input->post('stok', true);
            $tanggal_kedaluwarsa = $this->input->post('tanggal_kedaluwarsa', true);

            $upload_image = $_FILES['gambar_obat'];

            if ($upload_image) {
                $config['upload_path'] = './assets/img/upload-obat/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
                $config['max_size'] = '5120';
                $config['max_width'] = '1920';
                $config['max_height'] = '1080';
                $config['file_name'] = 'obat-' . time();

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar_obat')) {
                    $gambar_lama = $data['obat']['gambar_obat'];
                    if ($gambar_lama != 'gambar_obat') {
                        unlink(FCPATH . 'assets/img/upload-obat/' . $gambar_lama);
                    }

                    $gambar_baru = $this->upload->data('file_name');
                    $this->db->set('gambar_obat', $gambar_baru);
                }
            }

            $this->db->set('nama', $nama_obat);
            $this->db->set('id_jenis_obat', $id_jenis_obat);
            $this->db->set('harga', $harga);
            $this->db->set('deskripsi', $deskripsi);
            $this->db->set('stok', $stok);
            $this->db->set('tanggal_kedaluwarsa', $tanggal_kedaluwarsa);

            $this->db->where('id', $id);
            $this->db->update('obat');

            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message">
                    &#129395; Data Obat Berhasil diubah
                </div>'
            );
            redirect('admin/obat');
        }
    }

    public function hapus()
    {
        $data['judul'] = 'Hapus Obat';
        $data['user'] = $this->UserModel->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['obat'] = $this->ObatModel->getObatJenisObatById(['obat.id' => $this->uri->segment(4)]);

        $gambar_obat = $data['obat']['gambar'];
        echo
        unlink(FCPATH . 'assets/img/upload-obat/' . $gambar_obat);

        $this->ObatModel->deleteObat($this->uri->segment(4));
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-message">
                &#129395; Data Obat Berhasil dihapus
            </div>'
        );
        redirect('admin/obat');
    }
}
