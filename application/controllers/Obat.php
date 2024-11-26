<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat extends CI_Controller
{
    public function index()
    {
        cek_login();
        cek_akses();

        $data['judul'] = "Data Obat";
        $data['user'] = $this->ModelUser->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['obat'] = $this->ModelObat->getJoinObatJenisObat();
        $data['jenis_obat'] = $this->ModelObat->getAllJenisObat();

        $this->ModelObat->form_validation_tambah_obat();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/adm_header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/adm_topbar', $data);
            $this->load->view('obat/obat-admin', $data);
            $this->load->view('templates/adm_footer');
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
                    $gambar = $gambar_obat['file_name']; //digunakan untuk parameter tambahDataObat
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('obat');
                }
            }

            $this->ModelObat->tambahDataObat($gambar); //didapatkan dari variable file_name di atas
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message">
                    &#129395; Data Obat Berhasil ditambah
                </div>'
            );
            redirect('obat');
        }
    }

    public function detail_obat()
    {
        cek_login();
        cek_akses();

        $data['judul'] = 'Detail Obat';
        $data['user'] = $this->ModelUser->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['obat'] = $this->ModelObat->getObatJenisObatById(['obat.id' => $this->uri->segment(3)]);

        $this->load->view('templates/adm_header', $data);
        $this->load->view('templates/adm_sidebar', $data);
        $this->load->view('templates/adm_topbar', $data);
        $this->load->view('obat/detail-obat', $data);
        $this->load->view('templates/adm_footer');
    }

    public function ubah_obat()
    {
        cek_login();
        cek_akses();

        $data['judul'] = 'Ubah Obat';
        $data['user'] = $this->ModelUser->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['obat'] = $this->ModelObat->getObatJenisObatById(['obat.id' => $this->uri->segment(3)]);
        $data['jenis_obat'] = $this->ModelObat->getAllJenisObat();

        $this->ModelObat->form_validation_ubah_obat();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/adm_header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/adm_topbar', $data);
            $this->load->view('obat/ubah-obat', $data);
            $this->load->view('templates/adm_footer');
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

            // $this->ModelObat->ubahDataObat();
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
            redirect('obat');
        }
    }

    public function hapus_obat()
    {
        cek_login();
        cek_akses();

        $data['judul'] = 'Hapus Obat';
        $data['user'] = $this->ModelUser->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['obat'] = $this->ModelObat->getObatJenisObatById(['obat.id' => $this->uri->segment(3)]);

        $gambar_obat = $data['obat']['gambar'];
        echo
        unlink(FCPATH . 'assets/img/upload-obat/' . $gambar_obat);

        $this->ModelObat->hapusDataObat($this->uri->segment(3));
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-message">
                &#129395; Data Obat Berhasil dihapus
            </div>'
        );
        redirect('obat');
    }

    public function jenis_obat()
    {
        cek_login();
        cek_akses();

        $data['judul'] = "Data Jenis Obat";
        $data['user'] = $this->ModelUser->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['jenis_obat'] = $this->ModelObat->getAllJenisObat();

        $this->ModelObat->form_validation_jenis_obat();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/adm_header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/adm_topbar', $data);
            $this->load->view('obat/jenis-obat', $data);
            $this->load->view('templates/adm_footer');
        } else {
            $this->ModelObat->tambahJenisObat();
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message">
                    &#129395; Data Jenis Obat Berhasil ditambah
                </div>'
            );
            redirect('obat/jenis_obat');
        }
    }

    public function ubah_jenis_obat()
    {
        cek_login();
        cek_akses();

        $data['judul'] = 'Ubah Jenis Obat';
        $data['user'] = $this->ModelUser->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['jenis_obat'] = $this->ModelObat->getJenisObatById(['jenis_obat.id' => $this->uri->segment(3)]);

        $this->ModelObat->form_validation_jenis_obat();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/adm_header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/adm_topbar', $data);
            $this->load->view('obat/ubah-jenis-obat', $data);
            $this->load->view('templates/adm_footer');
        } else {
            $this->ModelObat->ubahJenisObat();
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message">
                    &#129395; Data Jenis Obat Berhasil diubah
                </div>'
            );
            redirect('obat/jenis_obat');
        }
    }

    public function hapus_jenis_obat()
    {
        cek_login();
        cek_akses();

        $data['user'] = $this->ModelUser->cekDataUser(['email' => $this->session->userdata('email')]);

        $this->ModelObat->hapusJenisObat($this->uri->segment(3));
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-message">
                &#129395; Data Jenis Obat Berhasil dihapus
            </div>'
        );
        redirect('obat/jenis_obat');
    }

    public function beli_obat($id)
    {
        cek_belum_login();

        $data['judul'] = "Beli Obat";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role_id'] = $this->session->userdata('role_id');
        $data['obat'] = $this->ModelObat->getObatById($id);

        $this->ModelObat->form_validation_beli_obat();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('obat/beli-obat', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $stok = $data['obat']['stok'];
            $jumlah_obat = $this->input->post('jumlah');

            $new_stok = $stok - $jumlah_obat;
            $this->ModelObat->updateStokObat($data['obat']['id'], $new_stok);

            $this->ModelObat->tambahPemesananObat();
            echo "<script>
                    alert('Obat berhasil dipesan');
                    window.location.href='" . base_url('obat') . "';
                </script>";
            exit;
        }
    }

    public function pemesanan_obat()
    {
        cek_login();
        cek_akses();

        $data['judul'] = "Data Pemesanan Obat";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role_id'] = $this->session->userdata('role_id');
        $data['pemesanan_obat'] = $this->ModelObat->getAllPemesananObat();

        $this->load->view('templates/adm_header', $data);
        $this->load->view('templates/adm_sidebar', $data);
        $this->load->view('templates/adm_topbar', $data);
        $this->load->view('obat/pemesanan-obat', $data);
        $this->load->view('templates/adm_footer', $data);
    }

    public function detailPemesananObat()
    {
        cek_masuk();

        $data['judul'] = 'Detail Pemesanan Obat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role_id'] = $this->session->userdata('role_id');
        $data['pemesanan_obat'] = $this->ModelObat->pemesananObatWhere(['id' => $this->uri->segment(3)]);

        $this->load->view('templates/adm_header', $data);
        $this->load->view('templates/adm_sidebar', $data);
        $this->load->view('templates/adm_topbar', $data);
        $this->load->view('obat/detail-pemesanan-obat', $data);
        $this->load->view('templates/adm_footer');
    }

    public function hapusPemesananObat($id)
    {
        cek_masuk();

        $data['judul'] = 'Hapus Obat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role_id'] = $this->session->userdata('role_id');
        $data['pemesanan_obat'] = $this->ModelObat->obatWhere(['obat.id' => $this->uri->segment(3)]);

        $this->ModelObat->hapusPemesananObat($id);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-message">
                &#129395; Data Pemesanan Obat Berhasil dihapus
            </div>'
        );
        redirect('obat/pemesananObat');
    }
}
