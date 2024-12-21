<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
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

    public function countUser()
    {
        return $this->db->get('user')->num_rows();
    }

    public function insertUser($data)
    {
        $this->db->insert('user', $data);
    }

    public function deleteUser($where = null)
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
}
