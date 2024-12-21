<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ObatModel extends CI_Model
{
    public function getAllObat()
    {
        $this->db->select('obat.*, jenis_obat.nama');
        $this->db->from('obat');
        $this->db->join('jenis_obat', 'obat.id_jenis_obat = jenis_obat.id');
        return $this->db->get()->result_array();
    }

    public function getJoinObatJenisObat()
    {
        $this->db->select('obat.id AS id_obat, obat.nama AS nama_obat, obat.harga, obat.deskripsi, obat.stok, obat.tanggal_kedaluwarsa, obat.gambar, jenis_obat.id AS id_jenis_obat, jenis_obat.nama AS nama_jenis_obat');
        $this->db->from('obat');
        $this->db->join('jenis_obat', 'obat.id_jenis_obat = jenis_obat.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getObatJenisObatById($where)
    {
        $this->db->select('obat.id AS id_obat, obat.nama AS nama_obat, obat.harga, obat.deskripsi, obat.stok, obat.tanggal_kedaluwarsa, obat.gambar, jenis_obat.id AS id_jenis_obat, jenis_obat.nama AS nama_jenis_obat');
        $this->db->from('obat');
        $this->db->join('jenis_obat', 'obat.id_jenis_obat = jenis_obat.id');
        $this->db->where($where);
        return $this->db->get()->row_array();
    }

    public function getObatById($id)
    {
        return $this->db->get_where('obat', ['id' => $id])->row_array();
    }

    public function countObat()
    {
        return $this->db->get('obat')->num_rows();
    }

    public function insertObat($gambar)
    {
        $data = [
            'nama' => $this->input->post('nama_obat', true),
            'id_jenis_obat' => $this->input->post('id_jenis_obat', true),
            'harga' => $this->input->post('harga', true),
            'deskripsi' => $this->input->post('deskripsi', true),
            'stok' => $this->input->post('stok', true),
            'tanggal_kedaluwarsa' => $this->input->post('tanggal_kedaluwarsa', true),
            'gambar' => $gambar
        ];

        $this->db->insert('obat', $data);
    }

    public function deleteObat($id)
    {
        $this->db->delete('obat', ['id' => $id]);
    }

    public function cariDataObat()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama_obat', $keyword);
        return $this->db->get('obat')->result_array();
    }

    public function updateStokObat($id, $new_stok)
    {
        $data = ['stok' => $new_stok];
        $this->db->where('id', $id);
        return $this->db->update('obat', $data);
    }
}
