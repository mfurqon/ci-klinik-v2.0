<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModelJanjiTemu extends CI_Model
{
    public function getAllJanjiTemu()
    {
        return $this->db->get('janji_temu')->result_array();
    }

    public function getJanjiTemuById($id_user)
    {
        $this->db->select('janji_temu.*, user.nama AS nama_user, dokter.nama AS nama_dokter');
        $this->db->from('janji_temu');
        $this->db->join('user', 'janji_temu.id_user = user.id');
        $this->db->join('dokter', 'janji_temu.id_dokter = dokter.id');
        $this->db->where('janji_temu.id_user', $id_user);
        $query = $this->db->get();
        return $query->result_array();
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
            'id_user' => $this->input->post('id_user'),
            'id_dokter' => $this->input->post('dokter', true),
            'tanggal_temu' => $this->input->post('tanggal_temu', true),
            'jam_temu' => $this->input->post('jam_temu', true),
            'keluhan' => $this->input->post('keluhan', true),
            'status' => 'Diproses', // Default status untuk janji temu baru
            'tanggal_dibuat' => date('Y-m-d'),
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


    // form validation janji temu
    public function form_validation_buat_janji_temu()
    {
        $this->form_validation->set_rules('telepon', 'Nomor Handphone', 'required|trim|numeric');
        $this->form_validation->set_rules('dokter', 'Dokter', 'required');
        $this->form_validation->set_rules('tanggal_temu', 'Tanggal Temu', 'required');
        $this->form_validation->set_rules('jam_temu', 'Jam Temu', 'required');
    }
}
