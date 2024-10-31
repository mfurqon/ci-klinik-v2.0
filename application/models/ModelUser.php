<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelUser extends CI_Model
{
    // Pengolahan data pada table user
    public function getAllUser()
    {
        return $this->db->get('user')->result_array();
    }

    public function getJoinUserRole()
    {
        $this->db->select('user.id AS user_id, user.nama, user.email, user.tanggal_dibuat, user.gambar, user.role_id, role.id AS role_id, role.role AS role_nama');
        $this->db->from('user');
        $this->db->join('role', 'user.role_id = role.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function hitungAnggota()
    {
        return $this->db->get('user')->num_rows();
    }

    public function simpanDataUser()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'gambar' => 'default.jpg',
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'role_id' => $this->input->post('role'),
            'is_active' => 1,
            'tanggal_dibuat' => date('d-m-Y')
        ];

        $this->db->insert('user', $data);
    }

    public function hapusAnggota($where = null)
    {
        $this->db->delete('user', $where);
    }

    public function cekDataUser($where = null)
    {
        return $this->db->get_where('user', $where)->row_array();
    }

    public function getUserWhere($where = null)
    {
        return $this->db->get_where('user', $where)->row_array();
    }

    public function getUserLimit()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->limit(10, 0);
        return $this->db->get();
    }


    // Pengolahan data pada table role
    public function getAllRole()
    {
        return $this->db->get('role')->result_array();
    }

    public function getJoinRoleIdById($userId)
    {
        $this->db->select('user.id AS user_id, user.nama, user.email, user.tanggal_dibuat, user.gambar, user.role_id, role.id AS role_id, role.role AS role_nama');
        $this->db->from('user');
        $this->db->join('role', 'user.role_id = role.id');
        $query = $this->db->where('user.id', $userId['user_id']);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getRoleById($where)
    {
        $this->db->from('role');
        $this->db->where($where);
        return $this->db->get()->row_array();
    }

    public function tambahRole()
    {
        $data = ['role' => $this->input->post('role', true)];
        $this->db->insert('role', $data);
    }

    public function ubahRole()
    {
        $data = [
            "role" => $this->input->post('role', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('role', $data);
    }

    public function hapusRole($id)
    {
        $this->db->delete('role', ['id' => $id]);
    }


    // Kumpulan kode form_validation
    // Kumpulan kode form_validation user
    public function form_validation_user()
    {
        $this->form_validation->set_rules('nama', 'Nama Anggota', 'required|trim');
        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|trim|min_length[3]|matches[password1]');
    }

    public function form_validation_ubah_anggota()
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('role_id', 'Role', 'required');
    }

    public function form_validation_ubah_password()
    {
        $this->form_validation->set_rules('password_lama', 'Password Saat Ini', 'required|trim');
        $this->form_validation->set_rules('password_baru1', 'Password Baru', 'required|trim|min_length[3]|matches[password_baru2]');
        $this->form_validation->set_rules('password_baru2', 'Konfirmasi Password Baru', 'required|trim|min_length[3]|matches[password_baru1]');
    }


    // Kumpulan kode form_validation role
    public function form_validation_role()
    {
        $this->form_validation->set_rules('role', 'Role', 'required|trim');
    }
}
