<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        cek_akses();
    }

    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['user'] = $this->ModelUser->cekDataUser(['email' => $this->session->userdata('email')]);
        // $data['total_dokter'] = $this->ModelDokter->hitungDokter();
        // $data['total_obat'] = $this->ModelObat->hitungObat();
        // $data['total_janji_temu'] = $this->ModelJanjiTemu->hitungJanjiTemu();
        $data['total_anggota'] = $this->ModelUser->hitungAnggota();

        $this->load->view('templates/adm_header', $data);
        $this->load->view('templates/adm_sidebar', $data);
        $this->load->view('templates/adm_topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/adm_footer');
    }

    public function ubah_profil()
    {
        cek_login();
        cek_akses();

        $data['judul'] = 'Ubah Profil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/adm_header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/adm_topbar', $data);
            $this->load->view('user/ubah-profil', $data);
            $this->load->view('templates/adm_footer');
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['gambar'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $gambar_lama = $data['user']['gambar'];
                    if ($gambar_lama != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $gambar_lama);
                    }

                    $gambar_baru = $this->upload->data('file_name');
                    $this->db->set('gambar', $gambar_baru);
                }
            }

            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('pesan', '
                    <div class="alert alert-success" role="alert">
                        &#129395; Profil anda berhasil diperbarui;
                    </div>
                ');
            redirect('user');
        }
    }

    public function ubah_password()
    {
        cek_login();
        cek_akses();

        $data['judul'] = 'Ubah Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->ModelUser->form_validation_ubah_password();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/adm_header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/adm_topbar', $data);
            $this->load->view('user/ubah-password', $data);
            $this->load->view('templates/adm_footer');
        } else {
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru1');

            // jika password lama salah
            if (!password_verify($password_lama, $data['user']['password'])) {
                $this->session->set_flashdata('pesan', '
                    <div class="alert alert-danger" role="alert">
                        Password salah! ;
                    </div>
                ');
                redirect('user/ubahPassword');
            } else {
                // jika password lama benar
                if ($password_lama == $password_baru) {
                    // jika password lama sama dengan password baru
                    $this->session->set_flashdata('pesan', '
                    <div class="alert alert-danger" role="alert">
                        Password lama tidak boleh sama, dengan password baru! ;
                    </div>
                ');
                    redirect('user/ubahPassword');
                } else {
                    // jika password sudah benar
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('pesan', '
                    <div class="alert alert-success" role="alert">
                        &#129395; Password berhasil diubah;
                    </div>
                ');
                    redirect('user/ubahPassword');
                }
            }
        }
    }
}
