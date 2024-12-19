<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DokterModel extends CI_Model
{
    // Pengolahan data pada table dokter
    public function getAllDokter()
    {
        return $this->db->get('dokter')->result_array();
    }

    public function getDokterLimit($limit = 4)
    {
        $this->db->limit($limit);
        $this->db->select('dokter.id AS id_dokter, dokter.nip, dokter.nama AS nama_dokter, dokter.jenis_kelamin, dokter.telepon, dokter.email, dokter.alamat, dokter.jam_masuk, dokter.jam_keluar, dokter.tanggal_ditambahkan, dokter.gambar, spesialisasi.id AS id_spesialisasi, spesialisasi.nama AS nama_spesialisasi');
        $this->db->from('dokter');
        $this->db->join('spesialisasi', 'dokter.id_spesialisasi = spesialisasi.id');
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
            "id_spesialisasi" => $this->input->post('spesialisasi', true),
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


    // Pengolahan data pada table spesialisasi
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

    public function tambahSpesialisasi()
    {
        $data = ['nama' => $this->input->post('spesialisasi', true)];
        $this->db->insert('spesialisasi', $data);
    }

    public function ubahSpesialisasi()
    {
        $data = [
            "nama" => $this->input->post('spesialisasi', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('spesialisasi', $data);
    }

    public function hapusSpesialisasi($id)
    {
        $this->db->delete('spesialisasi', ['id' => $id]);
    }

    public function getJoinDokterSpesialisasi()
    {
        $this->db->select('dokter.id AS id_dokter, dokter.nip, dokter.nama AS nama_dokter, dokter.jenis_kelamin, dokter.telepon, dokter.email, dokter.alamat, dokter.jam_masuk, dokter.jam_keluar, dokter.tanggal_ditambahkan, dokter.gambar, spesialisasi.id AS id_spesialisasi, spesialisasi.nama AS nama_spesialisasi');
        $this->db->from('dokter');
        $this->db->join('spesialisasi', 'dokter.id_spesialisasi = spesialisasi.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getJoinDokterSpesialisasiById($where)
    {
        $this->db->select('dokter.id AS id_dokter, dokter.nip, dokter.nama AS nama_dokter, dokter.jenis_kelamin, dokter.telepon, dokter.email, dokter.alamat, dokter.jam_masuk, dokter.jam_keluar, dokter.tanggal_ditambahkan, dokter.gambar, spesialisasi.id AS id_spesialisasi, spesialisasi.nama AS nama_spesialisasi');
        $this->db->from('dokter');
        $this->db->join('spesialisasi', 'dokter.id_spesialisasi = spesialisasi.id');
        $this->db->where($where);
        return $this->db->get()->row_array();
    }
}
