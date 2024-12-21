<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class Role extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'Data Role';
        $data['user'] = $this->UserModel->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['role'] = $this->RoleModel->getAllRole();
        
        set_tambah_role_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/templates/main/header', $data);
            $this->load->view('backend/templates/main/sidebar', $data);
            $this->load->view('backend/templates/main/topbar', $data);
            $this->load->view('backend/user/role/list_role', $data);
            $this->load->view('backend/templates/main/footer');
        } else {
            $this->RoleModel->insertRole();
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message" role="alert">
                    &#129395; Data role baru berhasil ditambah
                </div>'
            );
            redirect('user/role');
        }
    }

    public function ubah()
    {
        cek_login();

        $data['judul'] = 'Ubah Role';
        $data['user'] = $this->UserModel->cekDataUser(['email' => $this->input->post('email')]);
        $data['role'] = $this->RoleModel->getRoleById(['role.id' => $this->uri->segment(3)]);

        set_ubah_role_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/templates/main/header', $data);
            $this->load->view('backend/templates/main/sidebar', $data);
            $this->load->view('backend/templates/main/topbar', $data);
            $this->load->view('backend/user/role/edit_role', $data);
            $this->load->view('backend/templates/main/footer');
        } else {
            $this->RoleModel->updateRole();
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message">
                    &#129395; Data Role Berhasil diubah
                </div>'
            );
            redirect('user/role');
        }
    }

    public function hapus()
    {
        cek_login();

        $data['user'] = $this->UserModel->cekDataUser(['email' => $this->input->post('email')]);

        $this->RoleModel->deleteRole($this->uri->segment(3));
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-message">
                &#129395; Data Role Berhasil dihapus
            </div>'
        );
        redirect('user/role');
    }
}