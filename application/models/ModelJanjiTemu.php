<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModelJanjiTemu extends CI_Model
{
    public function getAllJanjiTemu()
    {
        return $this->db->get('janji_temu')->result_array();
    }

    public function hitungJanjiTemu()
    {
        return $this->db->get('janji_temu')->num_rows();
    }

    public function janjiTemuWhere($where)
    {
        return $this->db->get_where('janji_temu', $where);
    }

    public function tambahJanjiTemu()
    {
        $data = [
            'nama' => $this->input->post('nama', true),
            'email' => $this->input->post('email', true),
            'telepon' => $this->input->post('telepon', true),
            'nama_dokter' => $this->input->post('dokter', true),
            'tanggal_temu' => $this->input->post('tanggal_temu', true),
            'jam_temu' => $this->input->post('jam_temu', true),
            'keluhan' => $this->input->post('keluhan', true),
            'tanggal_dibuat' => $this->input->post('tanggal_dibuat', true),
        ];

        $this->db->insert('janji_temu', $data);
    }

    public function ubahJanjiTemu()
    {
        $data = [
            'nama' => $this->input->post('nama', true),
            'email' => $this->input->post('email', true),
            'telepon' => $this->input->post('telepon', true),
            'nama_dokter' => $this->input->post('nama_dokter', true),
            'tanggal_temu' => $this->input->post('tanggal_temu', true),
            'jam_temu' => $this->input->post('jam_temu', true),
            'keluhan' => $this->input->post('keluhan', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('janji_temu', $data);
    }

    public function hapusJanjiTemu($where = null)
    {
        $this->db->delete('janji_temu', $where);
    }
}
