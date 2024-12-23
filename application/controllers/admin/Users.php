<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_belum_login_admin();
        cek_akses();
    }

    public function index()
    {
        $data['judul'] = 'Data Anggota';
        $data['user'] = $this->UserModel->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['role'] = $this->RoleModel->getAllRole();
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

            $this->UserModel->insertUser($data);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message" role="alert">
                    &#129395; Data anggota baru berhasil ditambah
                </div>'
            );
            redirect('admin/users');
        }
    }

    public function ubah()
    {
        $data['judul'] = 'Ubah Data Anggota';
        $data['user'] = $this->UserModel->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['anggota'] = $this->RoleModel->getJoinRoleIdById(['user_id' => $this->uri->segment(4)]);
        $data['role'] = $this->RoleModel->getAllRole();

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
            redirect('admin/users');
        }
    }

    public function hapus()
    {
        $where = ['id' => $this->uri->segment(4)];
        $this->UserModel->deleteUser($where);
        $data['anggota'] = $this->UserModel->getUserWhere(['id' => $this->uri->segment(4)]);

        $gambar_user = $data['anggota']['gambar'];
        unlink(FCPATH . 'assets/img/profile/' . $gambar_user);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-message">
                &#129395; Data anggota berhasil dihapus
            </div>'
        );
        redirect('admin/users');
    }
}
