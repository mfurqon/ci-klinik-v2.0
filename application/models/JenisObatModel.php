<?php
defined('BASEPATH') OR exit('No Direct Script Access Allowed');

class JenisObatModel extends CI_Model
{
    public function getAllJenisObat()
    {
        return $this->db->get('jenis_obat')->result_array();
    }

    public function getJenisObatById($where)
    {
        $this->db->from('jenis_obat');
        $this->db->where($where);
        return $this->db->get()->row_array();
    }

    public function insertJenisObat()
    {
        $data = ['nama' => $this->input->post('jenis_obat', true)];
        $this->db->insert('jenis_obat', $data);
    }

    public function updateJenisObat()
    {
        $data = [
            "nama" => $this->input->post('jenis_obat', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('jenis_obat', $data);
    }

    public function deleteJenisObat($id)
    {
        $this->db->delete('jenis_obat', ['id' => $id]);
    }
}