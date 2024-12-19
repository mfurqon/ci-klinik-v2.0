<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_akses();
    }

    public function index()
    {
        $data['judul'] = 'Profil Saya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('backend/templates/main/header', $data);
        $this->load->view('backend/templates/main/sidebar', $data);
        $this->load->view('backend/templates/main/topbar', $data);
        $this->load->view('backend/profile/index', $data);
        $this->load->view('backend/templates/main/footer');
    }

    public function manage()
    {
        $data['judul'] = 'Data Anggota';
        $data['user'] = $this->UserModel->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['role'] = $this->UserModel->getAllRole();
        $data['anggota'] = $this->UserModel->getJoinUserRole();

        set_tambah_user_rules();

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/templates/main/header', $data);
            $this->load->view('backend/templates/main/sidebar', $data);
            $this->load->view('backend/templates/main/topbar', $data);
            $this->load->view('backend/user/data/list_user', $data);
            $this->load->view('backend/templates/main/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'telepon' => htmlspecialchars($this->input->post('telepon', true)),
                'gambar' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => htmlspecialchars($this->input->post('role', true)),
                'is_active' => 1,
                'tanggal_dibuat' => date('d-m-Y')
            ];

            $this->UserModel->simpanDataUser($data);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message" role="alert">
                    &#129395; Data anggota baru berhasil ditambah
                </div>'
            );
            redirect('user/manage');
        }
    }

    public function role()
    {
        $data['judul'] = 'Data Role';
        $data['user'] = $this->UserModel->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['role'] = $this->UserModel->getAllRole();
        
        set_tambah_role_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/templates/main/header', $data);
            $this->load->view('backend/templates/main/sidebar', $data);
            $this->load->view('backend/templates/main/topbar', $data);
            $this->load->view('backend/user/role/list_role', $data);
            $this->load->view('backend/templates/main/footer');
        } else {
            $this->UserModel->tambahRole();
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message" role="alert">
                    &#129395; Data role baru berhasil ditambah
                </div>'
            );
            redirect('user/role');
        }
    }

    public function ubah_anggota()
    {
        cek_login();

        $data['judul'] = 'Ubah Data Anggota';
        $data['user'] = $this->UserModel->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['anggota'] = $this->UserModel->getJoinRoleIdById(['user_id' => $this->uri->segment(3)]);
        $data['role'] = $this->UserModel->getAllRole();

        set_ubah_user_rules();

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/templates/main/header', $data);
            $this->load->view('backend/templates/main/sidebar', $data);
            $this->load->view('backend/templates/main/topbar', $data);
            $this->load->view('backend/user/data/edit_user', $data);
            $this->load->view('backend/templates/main/footer');
        } else {
            $nama = $this->input->post('nama', true);
            $id = $this->input->post('id', true);
            $telepon = $this->input->post('telepon', true);
            $alamat = $this->input->post('alamat', true);
            $role = $this->input->post('role_id', true);

            // Jika ada gambar yang akan di-upload
            $upload_image = $_FILES['gambar'];

            if ($upload_image) {
                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '3000';
                $config['file_name'] = 'user-' . time();

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

            $this->db->set('role_id', $role);
            $this->db->set('nama', $nama);
            $this->db->set('telepon', $telepon);
            $this->db->set('alamat', $alamat);
            $this->db->where('id', $id);
            $this->db->update('user');

            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message">
                    &#129395; Data anggota berhasil diubah
                </div>'
            );
            redirect('user/manage');
        }
    }

    public function hapus_anggota()
    {
        cek_login();

        $where = ['id' => $this->uri->segment(3)];
        $this->UserModel->hapusAnggota($where);
        $data['anggota'] = $this->UserModel->getUserWhere(['id' => $this->uri->segment(3)]);

        $gambar_user = $data['anggota']['gambar'];
        unlink(FCPATH . 'assets/img/profile/' . $gambar_user);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-message">
                &#129395; Data anggota berhasil dihapus
            </div>'
        );
        redirect('user/manage');
    }

    public function ubah_role()
    {
        cek_login();

        $data['judul'] = 'Ubah Role';
        $data['user'] = $this->UserModel->cekDataUser(['email' => $this->input->post('email')]);
        $data['role'] = $this->UserModel->getRoleById(['role.id' => $this->uri->segment(3)]);

        set_ubah_role_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/templates/main/header', $data);
            $this->load->view('backend/templates/main/sidebar', $data);
            $this->load->view('backend/templates/main/topbar', $data);
            $this->load->view('backend/user/role/edit_role', $data);
            $this->load->view('backend/templates/main/footer');
        } else {
            $this->UserModel->ubahRole();
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message">
                    &#129395; Data Role Berhasil diubah
                </div>'
            );
            redirect('user/role');
        }
    }

    public function hapus_role()
    {
        cek_login();

        $data['user'] = $this->UserModel->cekDataUser(['email' => $this->input->post('email')]);

        $this->UserModel->hapusRole($this->uri->segment(3));
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-message">
                &#129395; Data Role Berhasil dihapus
            </div>'
        );
        redirect('user/role');
    }

    public function ubah_profil()
    {
        cek_login();

        $data['judul'] = 'Ubah Profil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        set_ubah_user_rules();

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/templates/main/header', $data);
            $this->load->view('backend/templates/main/sidebar', $data);
            $this->load->view('backend/templates/main/topbar', $data);
            $this->load->view('backend/profile/edit_profile', $data);
            $this->load->view('backend/templates/main/footer');
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $telepon = $this->input->post('telepon');
            $alamat = $this->input->post('alamat');

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
            $this->db->set('telepon', $telepon);
            $this->db->set('alamat', $alamat);
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

        $data['judul'] = 'Ubah Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        set_ubah_password_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/templates/main/header', $data);
            $this->load->view('backend/templates/main/sidebar', $data);
            $this->load->view('backend/templates/main/topbar', $data);
            $this->load->view('backend/profile/edit_password', $data);
            $this->load->view('backend/templates/main/footer');
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
                redirect('user/ubah_password');
            } else {
                // jika password lama benar
                if ($password_lama == $password_baru) {
                    // jika password lama sama dengan password baru
                    $this->session->set_flashdata('pesan', '
                    <div class="alert alert-danger" role="alert">
                        Password lama tidak boleh sama, dengan password baru! ;
                    </div>
                ');
                    redirect('user/ubah_password');
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
                    redirect('user/ubah_password');
                }
            }
        }
    }
}
