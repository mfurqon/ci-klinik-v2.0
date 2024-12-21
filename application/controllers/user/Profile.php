<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class Profile extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'Profil Saya';
        
        $user = $this->UserModel->cekData(['email' => $this->session->userdata('email')])->row_array();

        foreach ($user as $a) {
            $data = [
                'judul' => 'Profil Saya', //untuk title di header
                'image' => $user['image'],
                'user' => $user['nama'],
                'email' => $user['email'],
                'tanggal_input' => $user['tanggal_input']
            ];
        }

        $this->load->view('templates/templates-user/header', $data);
        $this->load->view('member/index', $data);
        $this->load->view('templates/templates-user/modal');
        $this->load->view('templates/templates-user/footer', $data);
    }

    public function ubahProfile()
    {
        $user = $this->UserModel->cekData(['email' => $this->session->userdata('email')])->row_array();

        foreach ($user as $a) {
            $data = [
                'judul' => 'Profil Saya', //untuk title di header
                'image' => $user['image'],
                'user' => $user['nama'],
                'email' => $user['email'],
                'tanggal_input' => $user['tanggal_input']
            ];
        }

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/templates-user/header', $data);
            $this->load->view('member/ubah-anggota', $data);
            $this->load->view('templates/templates-user/modal', $data);
            $this->load->view('templates/templates-user/footer', $data);
        } else {
            $nama = $this->input->post('nama', true);
            $email = $this->input->post('email', true);

            // Jika ada gambar yang akan di-upload
            $upload_immage = $_FILES['image']['name'];

            if ($upload_immage) {
                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '3000';
                $config['max_width'] = '1024';
                $config['max_height'] = '2048';
                $config['file_name'] = $nama . time();

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $gambar_lama = $data['user']['image'];
                    if ($gambar_lama != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $gambar_lama);
                    }

                    $gambar_baru = $this->upload->data('file_name');
                    $this->db->set('image', $gambar_baru);
                }
            }

            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Profil berhasil diubah</div>');
            redirect('member/myProfile');
        }
    }
}