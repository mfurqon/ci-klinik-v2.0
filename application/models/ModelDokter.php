<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModelDokter extends CI_Model
{
    // Pengolahan data pada table dokter
    public function getAllDokter()
    {
        return $this->db->get('dokter')->result_array();
    }

    public function getDokterLimit($limit = 4)
    {
        $this->db->limit($limit);
        $this->db->select('dokter.id AS id_dokter, dokter.nip, dokter.nama AS nama_dokter, dokter.jenis_kelamin, dokter.telepon, dokter.email, dokter.alamat, dokter.jam_masuk, dokter.jam_keluar, dokter.tanggal_ditambahkan, dokter.gambar, spesialis.id AS id_spesialis, spesialis.gelar_spesialis');
        $this->db->from('dokter');
        $this->db->join('spesialis', 'dokter.id_spesialis = spesialis.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function hitungDokter()
    {
        return $this->db->get('dokter')->num_rows();
    }

    public function dokterWhere($where)
    {
        return $this->db->get_where('dokter', $where);
    }

    public function tambahDokter($gambar)
    {
        $data = [
            "nama" => $this->input->post('nama_dokter', true),
            "nip" => $this->input->post('nip', true),
            "id_spesialis" => $this->input->post('spesialis', true),
            "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
            "telepon" => $this->input->post('telepon', true),
            "email" => $this->input->post('email', true),
            "alamat" => $this->input->post('alamat', true),
            "jam_masuk" => $this->input->post('jam_masuk', true),
            "jam_keluar" => $this->input->post('jam_keluar', true),
            "tanggal_ditambahkan" => $this->input->post('tanggal_ditambahkan', true),
            "gambar" => $gambar
        ];

        $this->db->insert('dokter', $data);
    }

    public function hapusDataDokter($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('dokter', ['id' => $id]);
    }

    public function getDokterById($id)
    {
        return $this->db->get_where('dokter', ['id' => $id])->row_array();
    }

    public function cariDataDokter()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama_dokter', $keyword);
        return $this->db->get('dokter')->result_array();
    }


    // Pengolahan data pada table spesialis
    public function getAllSpesialis()
    {
        return $this->db->get('spesialis')->result_array();
    }

    public function getSpesialisById($where)
    {
        $this->db->from('spesialis');
        $this->db->where($where);
        return $this->db->get()->row_array();
    }

    public function tambahSpesialis()
    {
        $data = ['gelar_spesialis' => $this->input->post('spesialis', true)];
        $this->db->insert('spesialis', $data);
    }

    public function ubahSpesialis()
    {
        $data = [
            "gelar_spesialis" => $this->input->post('spesialis', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('spesialis', $data);
    }

    public function hapusSpesialis($id)
    {
        $this->db->delete('spesialis', ['id' => $id]);
    }

    public function getJoinDokterSpesialis()
    {
        $this->db->select('dokter.id AS id_dokter, dokter.nip, dokter.nama AS nama_dokter, dokter.jenis_kelamin, dokter.telepon, dokter.email, dokter.alamat, dokter.jam_masuk, dokter.jam_keluar, dokter.tanggal_ditambahkan, dokter.gambar, spesialis.id AS id_spesialis, spesialis.gelar_spesialis');
        $this->db->from('dokter');
        $this->db->join('spesialis', 'dokter.id_spesialis = spesialis.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getJoinDokterSpesialisById($where)
    {
        $this->db->select('dokter.id AS id_dokter, dokter.nip, dokter.nama AS nama_dokter, dokter.jenis_kelamin, dokter.telepon, dokter.email, dokter.alamat, dokter.jam_masuk, dokter.jam_keluar, dokter.tanggal_ditambahkan, dokter.gambar, spesialis.id AS id_spesialis, spesialis.gelar_spesialis');
        $this->db->from('dokter');
        $this->db->join('spesialis', 'dokter.id_spesialis = spesialis.id');
        $this->db->where($where);
        return $this->db->get()->row_array();
    }
}
