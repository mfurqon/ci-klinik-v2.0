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

    public function getPemesananByIdUser($id_user)
    {
        $this->db->select('po.*, f.*, u.*, p.*, DATE(po.tanggal_pemesanan) AS tanggal, TIME(po.tanggal_pemesanan) AS jam');
        $this->db->from('pemesanan_obat po');
        $this->db->join('faktur f', 'po.id_pemesanan = f.id_pemesanan', 'left');
        $this->db->join('pembayaran p', 'po.id_pemesanan = p.id_pemesanan', 'left');
        $this->db->join('user u', 'u.id = po.id_user');
        $this->db->where('po.id_user', $id_user);

        return $this->db->get()->result_array();
    }

    public function getPemesananByIdPemesanan($id_pemesanan)
    {
        $this->db->select('*');
        $this->db->from('pemesanan_obat po');
        $this->db->join('faktur f', 'po.id_pemesanan = f.id_pemesanan');
        $this->db->join('pembayaran p', 'p.id_pemesanan = po.id_pemesanan');
        $this->db->join('user u', 'u.id = f.id_user');
        $this->db->where('po.id_pemesanan', $id_pemesanan);

        return $this->db->get()->row_array();
    }
    
    public function getDetailPemesananByIdPemesanan($id_pemesanan)
    {
        $this->db->select('dpo.nama_obat, dpo.jumlah_obat, dpo.harga_obat');
        $this->db->from('detail_pemesanan_obat dpo');
        $this->db->join('pemesanan_obat po', 'dpo.id_pemesanan = po.id_pemesanan');
        $this->db->where('dpo.id_pemesanan', $id_pemesanan);
        return $this->db->get()->result_array();
    }
}