<?php
defined('BASEPATH') OR exit('No Direct Script Access Allowed');

class TempPemesananObatModel extends CI_Model
{
    public function countTempPemesananObat()
    {
        return $this->db->get('temp_pemesanan_obat')->num_rows();
    }

    public function insertTempPemesananObat($data)
    {
        $this->db->insert('temp_pemesanan_obat', $data);
    }

    // mengembalikan nilai baris pada table temp_pemesanan_obat where id_user
    public function getDataPemesananObatWhere($id_user)
    {
        $this->db->where($id_user);
        return $this->db->get('temp_pemesanan_obat')->num_rows();
    }

    // mengembalikan seluruh data dari table temp_pemesanan_obat where id_user
    public function getTempPemesananObatWhere($id_user)
    {
        return $this->db->get_where('temp_pemesanan_obat', ['id_user' => $id_user])->result_array();
    }

    // menghapus data table temp_pemesanan_obat where id_user
    public function deleteTempPemesananObat($id_user)
    {
        $this->db->delete('temp_pemesanan_obat', ['id_user' => $id_user]);
    }

    // menghapus data table temp_pemesanan_obat where id_temp
    public function deleteTempPemesananObatById($id_temp)
    {
        $this->db->delete('temp_pemesanan_obat', ['id' => $id_temp]);
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