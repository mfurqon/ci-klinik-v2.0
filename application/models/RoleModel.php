<?php
defined('BASEPATH') OR exit('No Direct Script Access Allowed');

class RoleModel extends CI_Model
{
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

    public function insertRole()
    {
        $data = ['role' => $this->input->post('role', true)];
        $this->db->insert('role', $data);
    }

    public function updateRole()
    {
        $data = [
            "role" => $this->input->post('role', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('role', $data);
    }

    public function deleteRole($id)
    {
        $this->db->delete('role', ['id' => $id]);
    }
}