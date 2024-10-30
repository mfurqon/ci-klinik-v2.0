<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelUser extends CI_Model
{
    public function getAllUser()
    {
        return $this->db->get('user');
    }

    public function hitungAnggota()
    {
        return $this->db->get('user')->num_rows();
    }

    public function getAllRole()
    {
        return $this->db->get('user_role');
    }

    public function simpanDataUser($data = null)
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
        return $this->db->get_where('user', $where);
    }

    public function cekUserAccess($where = null)
    {
        $this->db->select('*');
        $this->db->from('access_menu');
        $this->db->where($where);
        return $this->db->get();
    }

    public function getUserLimit()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->limit(10, 0);
        return $this->db->get();
    }

    public function getByRoleId()
    {
        $this->db->select('
            user.* user_role, role.name
        ');
        $this->db->join('user_role', 'user.role = role.id');
        $this->db->from('user');
        $query = $this->db->get();
        return $query->result();
    }

    public function joinRoleIdById($where)
    {
        $this->db->select('user.*, user_role.role');
        $this->db->from('user');
        $this->db->join('user_role', 'user.role_id = user_role.id');
        $this->db->where($where);
        return $this->db->get();
    }

    public function tambahRole($data = null)
    {
        $this->db->insert('user_role', $data);
    }
}
