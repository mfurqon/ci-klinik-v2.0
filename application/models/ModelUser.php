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

    public function simpanDataUser($data)
    {
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
        $this->db->select('user.id AS user_id, user.nama, user.email, user.telepon, user.alamat, user.tanggal_dibuat, user.gambar, user.role_id, role.id AS role_id, role.role AS role_nama');
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
}
