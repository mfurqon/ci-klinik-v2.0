<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        cek_sudah_login_admin();

        $data['judul'] = 'Login';

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/templates/login/header', $data);
            $this->load->view('backend/auth/login');
            $this->load->view('backend/templates/login/footer');
        } else {
            $this->_login();
        }
    }

    public function daftar()
    {
        cek_sudah_login_admin();
        
        $data['judul'] = 'Registrasi Admin';

        set_buat_akun_user();

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/templates/login/header', $data);
            $this->load->view('backend/auth/registrasi');
            $this->load->view('backend/templates/login/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'telepon' => htmlspecialchars($this->input->post('telepon', true)),
                'jenis_kelamin_user' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
                'tanggal_lahir_user' => htmlspecialchars($this->input->post('tanggal_lahir', true)),
                'gambar' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 1,
                'is_active' => 1,
                'tanggal_dibuat' => date('d-m-Y')
            ];

            $this->UserModel->insertUser($data);
            $this->session->set_flashdata(
                'pesan', 
                '<div class="alert alert-success" role="alert">
                    &#129395; Selamat!! akun anda sudah berhasil ditambahkan. Silakan login
                </div>
            ');
            redirect('admin/auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('pesan',
            '<div class="alert alert-success" role="alert">
                &#129395; Anda berhasil logout
            </div>'
        );
        redirect('admin/auth');
    }

    public function blok()
    {
        $this->load->view('backend/auth/blok');
    }

    private function _login()
    {
        $email = htmlspecialchars($this->input->post('email', true));
        $password = $this->input->post('password', true);

        $user = $this->UserModel->getUserWhere(['email' => $email]);

        // Jika usernya ada
        if ($user) {
            // Jika usernya sudah aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'id_user' => $user['id'],
                        'nama' => $user['nama']
                    ];

                    $this->session->set_userdata($data);

                    if ($user['role_id'] == 1) {
                        redirect('admin/dashboard');
                    } else {
                        if ($user['image'] == 'default.jpg') {
                            $this->session->set_flashdata(
                                'pesan',
                                '<div class="alert alert-info alert-message" role="alert">Silakan Ubah Foto Profil Anda</div>'
                            );
                            redirect('admin/profile');
                        }
                        redirect('admin/profile');
                    }
                } else {
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-danger" role="alert">
                        Password anda salah &#128542;
                    </div>'
                    );
                    redirect('admin/auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '
                    <div class="alert alert-danger" role="alert">
                        Email anda belum diaktivasi &#128542;
                    </div>
                ');
                redirect('admin/auth');
            }
        } else {
            $this->session->set_flashdata('pesan', 
                '<div class="alert alert-danger" role="alert">
                    Email anda belum terdaftar &#128542;
                </div>'
            );
            redirect('admin/auth');
        }
    }
}
