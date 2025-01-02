<?php
defined('BASEPATH') or exit('no direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        cek_sudah_login_user();

        $data['judul'] = "Login Member";

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('frontend/templates/login/header', $data);
            $this->load->view('frontend/auth/login');
            $this->load->view('frontend/templates/login/footer');
        } else {
            $this->_login();
        }
    }

    public function daftar()
    {
        cek_sudah_login_user();

        $data['judul'] = "Daftar Member";

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('alamat', 'Alamat Tempat Tinggal', 'required');
        $this->form_validation->set_rules('telepon', 'Nomor Telepon', 'required|trim|numeric|min_length[5]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('frontend/templates/login/header', $data);
            $this->load->view('frontend/auth/registrasi');
            $this->load->view('frontend/templates/login/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'telepon' => htmlspecialchars($this->input->post('telepon', true)),
                'gambar' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'tanggal_dibuat' => date('d-m-Y')
            ];
            $this->UserModel->insertUser($data);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success" role="alert">
                    &#129395; Selamat!! akun anda sudah berhasil ditambahkan. Silakan login
                </div>'
            );
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->sess_destroy();
        
        $this->session->set_flashdata('pesan', [
            'title' => 'Berhasil',
            'text' => '🥳 Anda berhasil logout',
            'icon' => 'success'
        ]);
        redirect('home');
    }

    public function blok()
    {
        $data['judul'] = "Akses Tidak Sah!";
        $data['user'] = $this->UserModel->getUserWhere(['email' => $this->session->userdata('email')]);
        $data['data_keranjang'] = $this->TempPemesananObatModel->getDataPemesananObatWhere(['id_user' => $this->session->userdata('id_user')]);

        $this->load->view('frontend/templates/main/header', $data);
        $this->load->view('frontend/auth/blok');
        $this->load->view('frontend/templates/main/footer');
    }

    private function _login()
    {
        $email = htmlspecialchars($this->input->post('email', true));
        $password = $this->input->post('password', true);
        $user = $this->UserModel->getUserWhere(['email' => $email]);

        // Jika usernya ada
        if ($user) {
            // Jika user sudah aktif
            if ($user['is_active'] == 1) {
                // Cek Password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'id_user' => $user['id'],
                        'nama' => $user['nama']
                    ];

                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('pesan', [
                        'title' => 'Sukses',
                        'text' => "🥳 Selamat Datang {$user['nama']}",
                        'icon' => 'success'
                    ]);
                    redirect('home');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password salah!!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">User belum diaktifasi!!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email tidak terdaftar!!</div>');
            redirect('auth');
        }
    }
}
