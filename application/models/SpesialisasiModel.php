<?php 
defined('BASEPATH') OR exit('No Direct Script Access Allowed');

class SpesialisasiModel extends CI_Model
{
    public function getAllSpesialisasi()
    {
        return $this->db->get('spesialisasi')->result_array();
    }

    public function getSpesialisasiById($where)
    {
        $this->db->from('spesialisasi');
        $this->db->where($where);
        return $this->db->get()->row_array();
    }

    public function insertSpesialisasi()
    {
        $data = ['nama' => $this->input->post('spesialisasi', true)];
        $this->db->insert('spesialisasi', $data);
    }

    public function updateSpesialisasi()
    {
        $data = [
            "nama" => $this->input->post('spesialisasi', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('spesialisasi', $data);
    }

    public function deleteSpesialisasi($id)
    {
        $this->db->delete('spesialisasi', ['id' => $id]);
    }
}