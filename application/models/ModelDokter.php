<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModelDokter extends CI_Model
{
    public function getAllDokter()
    {
        return $this->db->get('dokter')->result_array();
    }

    public function getDokterLimit($limit = 4)
    {
        $this->db->limit($limit);
        return $this->db->get('dokter', $limit)->result_array();
    }

    public function hitungDokter()
    {
        return $this->db->get('dokter')->num_rows();
    }

    public function dokterWhere($where)
    {
        return $this->db->get_where('dokter', $where);
    }

    public function tambahDataDokter()
    {
        $data = [
            "nip" => $this->input->post('nip', true),
            "nama_dokter" => $this->input->post('nama_dokter', true),
            "spesialisasi" => $this->input->post('spesialisasi', true),
            "telepon" => $this->input->post('telepon', true),
            "email" => $this->input->post('email', true),
            "alamat" => $this->input->post('alamat', true),
            "jam_masuk" => $this->input->post('jam_masuk', true),
            "jam_keluar" => $this->input->post('jam_keluar', true),
            "tanggal_ditambahkan" => $this->input->post('tanggal_ditambahkan', true),
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

    public function ubahDataDokter()
    {
        $data = [
            "nama_dokter" => $this->input->post('nama_dokter', true),
            "spesialisasi" => $this->input->post('spesialisasi', true),
            "telepon" => $this->input->post('telepon', true),
            "email" => $this->input->post('email', true),
            "alamat" => $this->input->post('alamat', true),
            "jam_masuk" => $this->input->post('jam_masuk', true),
            "jam_keluar" => $this->input->post('jam_keluar', true),
            "tanggal_ditambahkan" => $this->input->post('tanggal_ditambahkan', true),
            "gambar_dokter" => $this->input->post('gambar_dokter', true),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('dokter', $data);
    }

    public function cariDataDokter()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama_dokter', $keyword);
        return $this->db->get('dokter')->result_array();
    }

    public function form_validation_tambah_dokter()
    {
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim|numeric|is_unique[dokter.nip]|min_length[8]');
        $this->form_validation->set_rules('nama_dokter', 'Nama Dokter', 'required|trim');
        $this->form_validation->set_rules('spesialisasi', 'Spesialisasi', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('telepon', 'Nomor Telepon', 'required|trim|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('jam_masuk', 'Jam Masuk', 'required');
        $this->form_validation->set_rules('jam_keluar', 'Jam Keluar', 'required');
    }
}
