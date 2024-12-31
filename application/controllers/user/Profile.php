<?php
defined('BASEPATH') or exit('no direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_belum_login_user();
    }

    public function index()
    {
        $data['judul'] = 'Profil Saya';
        $data['user'] = $this->UserModel->getUserWhere(['email' => $this->session->userdata('email')]);
        $data['data_keranjang'] = $this->TempPemesananObatModel->getDataPemesananObatWhere(['id_user' => $this->session->userdata('id_user')]);

        $this->load->view('frontend/templates/main/header.php', $data);
        $this->load->view('frontend/profile/index', $data);
        $this->load->view('frontend/templates/main/footer.php', $data);
    }

    public function ubahProfile()
    {
        $data['judul'] = 'Ubah Profil';
        $data['user'] = $this->UserModel->getUserWhere(['email' => $this->session->userdata('email')]);
        $data['data_keranjang'] = $this->TempPemesananObatModel->getDataPemesananObatWhere(['id_user' => $this->session->userdata('id_user')]);

        set_ubah_user_rules();

        if ($this->form_validation->run() == false) {
            $this->load->view('frontend/templates/main/header.php', $data);
            $this->load->view('frontend/profile/edit_profile', $data);
            $this->load->view('frontend/templates/main/footer.php', $data);
        } else {
            $nama = $this->input->post('nama', true);
            $email = $this->input->post('email', true);
            $telepon = $this->input->post('telepon', true);
            $alamat = $this->input->post('alamat', true);

            // cek jika ada gambar yang akan di-upload
            $upload_immage = $_FILES['gambar']['name'];

            if ($upload_immage) {
                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
                $config['max_size'] = '3000';
                $config['max_width'] = '1024';
                $config['max_height'] = '2048';
                $config['file_name'] = $nama . time();

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $gambar_lama = $data['user']['gambar'];

                    if ($gambar_lama != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $gambar_lama);
                    }

                    $gambar_baru = $this->upload->data('file_name');

                    $this->db->set('gambar', $gambar_baru);
                } else {
                    // Menangkap pesan error jika upload gagal 
                    $error = strip_tags($this->upload->display_errors());
                    $this->session->set_flashdata('pesan', [
                        'title' => 'Gagal',
                        'text' => $error,
                        'icon' => 'error'
                    ]);
                    redirect('profile/ubah-profile');
                }
            }

            $this->db->set('nama', $nama);
            $this->db->set('telepon', $telepon);
            $this->db->set('alamat', $alamat);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('pesan', [
                'title' => 'Berhasil',
                'text' => 'Profil Anda berhasil diubah',
                'icon' => 'success'
            ]);
            redirect('profile');
        }
    }
}
