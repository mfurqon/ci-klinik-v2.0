<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JanjiTemuModel extends CI_Model
{
    public function getAllJanjiTemu()
    {
        $this->db->select('janji_temu.*, user.nama AS nama_user, user.telepon AS telepon_user, dokter.nama AS nama_dokter, user.email AS email_user, dokter.email AS email_dokter, dokter.telepon AS telepon_dokter');
        $this->db->from('janji_temu');
        $this->db->join('user', 'janji_temu.id_user = user.id');
        $this->db->join('dokter', 'janji_temu.id_dokter = dokter.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getJanjiTemuById($id_janji_temu)
    {
        $this->db->select('janji_temu.*, user.*, dokter.*, spesialisasi.*, user.nama AS nama_user, dokter.nama AS nama_dokter, spesialisasi.nama AS nama_spesialisasi, dokter.gambar AS gambar_dokter, janji_temu.tanggal_dibuat AS tanggal_dibuat, user.tanggal_dibuat AS tanggal_user_dibuat');
        $this->db->from('janji_temu');
        $this->db->join('user', 'janji_temu.id_user = user.id');
        $this->db->join('dokter', 'janji_temu.id_dokter = dokter.id');
        $this->db->join('spesialisasi', 'dokter.id_spesialisasi = spesialisasi.id');
        $this->db->where('janji_temu.id', $id_janji_temu);
        return $this->db->get()->row_array();
    }

    public function getJanjiTemuByIdUser($id_user)
    {
        $this->db->select('janji_temu.*, user.nama AS nama_user, dokter.nama AS nama_dokter');
        $this->db->from('janji_temu');
        $this->db->join('user', 'janji_temu.id_user = user.id', 'left');
        $this->db->join('dokter', 'janji_temu.id_dokter = dokter.id', 'left');
        $this->db->where('janji_temu.id_user', $id_user);
        return $this->db->get()->result_array();
    }

    public function countJanjiTemu()
    {
        return $this->db->get('janji_temu')->num_rows();
    }

    public function janjiTemuWhere($where)
    {
        return $this->db->get_where('janji_temu', $where);
    }

    public function insertJanjiTemu()
    {
        $data = [
            'no_janji_temu' => $this->generateNoJanjiTemu(),
            'id_user' => $this->input->post('id_user'),
            'id_dokter' => $this->input->post('dokter', true),
            'tanggal_temu' => $this->input->post('tanggal_temu', true),
            'jam_temu' => $this->input->post('jam_temu', true),
            'keluhan' => $this->input->post('keluhan', true),
            'status' => 'Diproses', // Default status untuk janji temu baru
            'tanggal_dibuat' => date('Y-m-d'),
            'jam_dibuat' => date('H:i:s')
        ];

        $this->db->insert('janji_temu', $data);
    }

    public function updateStatusJanjiTemu($id)
    {
        $this->db->set('status', 'Dijadwalkan');
        $this->db->where('id', $id);
        $this->db->update('janji_temu');

        return $this->db->affected_rows() > 0;  // Kembalikan true jika update berhasil
    }

    public function updateJanjiTemuOtomatis()
    {
        $today = date('Y-m-d');
        $this->db->set('status', 'Selesai');
        $this->db->where('tanggal_temu <', $today);
        $this->db->where('status !=', 'Selesai');
        $this->db->update('janji_temu');
    }

    public function cancelJanjiTemu($id)
    {
        $this->db->set('status', 'Dibatalkan');
        $this->db->where('id', $id);
        $this->db->update('janji_temu');

        return $this->db->affected_rows() > 0;  // Kembalikan true jika update berhasil
    }

    public function generateNoJanjiTemu() {
        $tanggal = date('Ymd');
        $this->db->select('MAX(no_janji_temu) AS max_kode');
        $this->db->like('no_janji_temu', 'APT' . $tanggal, 'after');
        $query = $this->db->get('janji_temu');
        $data = $query->row_array();
        $noUrut = 1;
    
        if ($data['max_kode']) {
            $lastNoUrut = (int) substr($data['max_kode'], -3);
            $noUrut = $lastNoUrut + 1;
        }
    
        return 'APT' . $tanggal . '-' . str_pad($noUrut, 3, '0', STR_PAD_LEFT);
    }

    public function updateJanjiTemu()
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

    public function deleteJanjiTemu($where = null)
    {
        $this->db->delete('janji_temu', $where);
    }
}
