<?php
defined('BASEPATH') OR exit('No Direct Script Access Allowed');

class PemesananObatModel extends CI_Model
{
    public function getAllPemesananObat()
    {
        return $this->db->get('pemesanan_obat')->result_array();
    }

    public function pemesananObatWhere($where)
    {
        return $this->db->get_where('pemesanan_obat', $where)->row_array();
    }

    public function deletePemesananObat($id)
    {
        $this->db->delete('pemesanan_obat', ['id' => $id]);
    }

    public function insertPemesananObat()
    {
        $data = [
            'nama_pemesan' => $this->input->post('nama_pemesan'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'telepon' => $this->input->post('telepon'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'nama_obat' => $this->input->post('nama_obat'),
            'jumlah' => $this->input->post('jumlah'),
            'pembayaran' => $this->input->post('pembayaran'),
            'pengiriman' => $this->input->post('pengiriman'),
            'waktu_pesan' => $this->input->post('waktu_pesan')
        ];
        $this->db->insert('pemesanan_obat', $data);
    }
}