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

        $this->load->view('templates/adm_header', $data);
        $this->load->view('templates/adm_sidebar', $data);
        $this->load->view('templates/adm_topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/adm_footer');
    }

    public function manage()
    {
        $data['judul'] = 'Data Anggota';
        $data['user'] = $this->ModelUser->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['role'] = $this->ModelUser->getAllRole();
        $data['anggota'] = $this->ModelUser->getJoinUserRole();

        $this->ModelUser->form_validation_user();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/adm_header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/adm_topbar', $data);
            $this->load->view('user/anggota', $data);
            $this->load->view('templates/adm_footer');
        } else {
            $this->ModelUser->simpanDataUser(); //Menggunakan Model
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
        $data['user'] = $this->ModelUser->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['role'] = $this->ModelUser->getAllRole();
        
        $this->ModelUser->form_validation_role();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/adm_header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/adm_topbar', $data);
            $this->load->view('user/role', $data);
            $this->load->view('templates/adm_footer');
        } else {
            $this->ModelUser->tambahRole();
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
        cek_akses();

        $data['judul'] = 'Ubah Data Anggota';
        $data['user'] = $this->ModelUser->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['anggota'] = $this->ModelUser->getJoinRoleIdById(['user_id' => $this->uri->segment(3)]);
        $data['role'] = $this->ModelUser->getAllRole();

        $this->ModelUser->form_validation_ubah_anggota();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/adm_header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/adm_topbar', $data);
            $this->load->view('user/ubah-anggota', $data);
            $this->load->view('templates/adm_footer');
        } else {
            $nama = $this->input->post('nama', true);
            $id = $this->input->post('id', true);
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
        cek_akses();

        $where = ['id' => $this->uri->segment(3)];
        $this->ModelUser->hapusAnggota($where);
        $data['anggota'] = $this->ModelUser->getUserWhere(['id' => $this->uri->segment(3)]);

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
        cek_akses();

        $data['judul'] = 'Ubah Role';
        $data['user'] = $this->ModelUser->cekDataUser(['email' => $this->input->post('email')]);
        $data['role'] = $this->ModelUser->getRoleById(['role.id' => $this->uri->segment(3)]);

        $this->ModelUser->form_validation_role();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/adm_header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/adm_topbar', $data);
            $this->load->view('user/ubah-role', $data);
            $this->load->view('templates/adm_footer');
        } else {
            $this->ModelUser->ubahRole();
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
        cek_akses();

        $data['user'] = $this->ModelUser->cekDataUser(['email' => $this->input->post('email')]);

        $this->ModelUser->hapusRole($this->uri->segment(3));
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-message">
                &#129395; Data Role Berhasil dihapus
            </div>'
        );
        redirect('user/role');
    }
}
