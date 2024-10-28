<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelPemeriksaan extends CI_Model
{
    public function getAllPemeriksaan()
    {
        return $this->db->get('pemeriksaan')->result_array();
    }

    public function pemeriksaanWhere($where)
    {
        return $this->db->get_where('pemeriksaan', $where);
    }

    public function tambahPemeriksaan()
    {
        $data = [
            'nama_pasien' => $this->input->post('nama_pasien'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'telepon' => $this->input->post('telepon'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'nama_dokter' => $this->input->post('nama_dokter'),
            'catatan' => $this->input->post('catatan'),
            'tanggal_pemeriksaan' => $this->input->post('tanggal_pemeriksaan'),
            'status_pembayaran' => $this->input->post('status_pembayaran')
        ];

        $this->db->insert('pemeriksaan', $data);
    }

    public function ubahPemeriksaan()
    {
        $this->db->set('nama_pasien', $this->input->post('nama_pasien', true));
        $this->db->set('jenis_kelamin', $this->input->post('jenis_kelamin', true));
        $this->db->set('tanggal_lahir', $this->input->post('tanggal_lahir', true));
        $this->db->set('telepon', $this->input->post('telepon', true));
        $this->db->set('email', $this->input->post('email', true));
        $this->db->set('nama_dokter', $this->input->post('nama_dokter', true));
        $this->db->set('catatan', $this->input->post('catatan', true));
        $this->db->set('status_pembayaran', $this->input->post('status_pembayaran', true));

        $this->db->where('id', $this->input->post('id', true));
        $this->db->update('pemeriksaan');
    }

    public function hapusPemeriksaan()
    {
        $this->db->where('id', $this->uri->segment(3));
        $this->db->delete('pemeriksaan');
    }

    public function form_validation_tambah_pemeriksaan()
    {
        $this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('telepon', 'Nomor Telepon', 'required|trim|numeric|min_length[10]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('nama_dokter', 'Nama Dokter', 'required|trim');
        $this->form_validation->set_rules('status_pembayaran', 'Status Pembayaran', 'required|trim');
    }

    public function form_validation_ubah_pemeriksaan()
    {
        $this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('telepon', 'Nomor Telepon', 'required|trim|numeric|min_length[10]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('nama_dokter', 'Nama Dokter', 'required|trim');
        $this->form_validation->set_rules('status_pembayaran', 'Status Pembayaran', 'required|trim');
    }
}
