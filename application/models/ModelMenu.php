<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelMenu extends CI_Model
{
    public function submenuWhere($where)
    {
        return $this->db->get_where('user_sub_menu', $where);
    }

    public function getSubMenu()
    {
        $query = "
            SELECT `user_sub_menu`. *, `user_menu`.`menu`
            FROM `user_sub_menu` JOIN `user_menu`
            ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
        ";
        return $this->db->query($query)->result_array();
    }

    public function ubahSubmenu()
    {
        $data = [
            'judul' => $this->input->post('judul'),
            'menu_id' => $this->input->post('menu_id'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'is_active' => $this->input->post('is_active')
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_sub_menu', $data);
    }

    public function hapusSubMenu($where = null)
    {
        $this->db->delete('user_sub_menu', $where);
    }
}
