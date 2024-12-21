<?php
defined('BASEPATH') OR exit('No Direct Script Access Allowed');

class TempPemesananObatModel extends CI_Model
{
    public function insertTempPemesananObat($data)
    {
        $this->db->insert('temp_pemesanan_obat', $data);
    }

    public function getDataWhere($where)
    {
        $this->db->where($where);
        return $this->db->get('temp_pemesanan_obat')->num_rows();
    }

    public function getTempPemesananObatWhere($where)
    {
        return $this->db->get('temp_pemesanan_obat', $where)->num_rows();
    }

    public function deleteTempPemesananObat($where)
    {
        $this->db->where($where);
        $this->db->delete('temp_pemesanan_obat');
    }

    // Lakukan join antara temp_pemesanan_obat dan obat untuk mendapatkan stok
    public function joinObatTempPemesananObat($id_user)
    {
        $this->db->select('temp_pemesanan_obat.id, temp_pemesanan_obat.gambar_obat, temp_pemesanan_obat.nama_obat, temp_pemesanan_obat.harga_obat, temp_pemesanan_obat.jumlah_obat, temp_pemesanan_obat.id_obat, obat.stok');
        $this->db->from('temp_pemesanan_obat');
        $this->db->join('obat', 'temp_pemesanan_obat.id_obat = obat.id');
        $this->db->where('temp_pemesanan_obat.id_user', $id_user);
        return $this->db->get()->result_array();
    }
}