<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ObatModel extends CI_Model
{
    // Pengolahan data pada table obat
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

    public function hitungObat()
    {
        return $this->db->get('obat')->num_rows();
    }

    public function tambahDataObat($gambar)
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

    public function hapusDataObat($id)
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


    // Pengolahan data pada table jenis_obat
    public function getAllJenisObat()
    {
        return $this->db->get('jenis_obat')->result_array();
    }

    public function getJenisObatById($where)
    {
        $this->db->from('jenis_obat');
        $this->db->where($where);
        return $this->db->get()->row_array();
    }

    public function tambahJenisObat()
    {
        $data = ['nama' => $this->input->post('jenis_obat', true)];
        $this->db->insert('jenis_obat', $data);
    }

    public function ubahJenisObat()
    {
        $data = [
            "nama" => $this->input->post('jenis_obat', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('jenis_obat', $data);
    }

    public function hapusJenisObat($id)
    {
        $this->db->delete('jenis_obat', ['id' => $id]);
    }



    // Pengolahan data pada table pemesanan_obat
    public function getAllPemesananObat()
    {
        return $this->db->get('pemesanan_obat')->result_array();
    }

    public function pemesananObatWhere($where)
    {
        return $this->db->get_where('pemesanan_obat', $where)->row_array();
    }

    public function hapusPemesananObat($id)
    {
        $this->db->delete('pemesanan_obat', ['id' => $id]);
    }

    public function tambahPemesananObat()
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

    // pengolahan data keranjang obat
    public function masukKeranjang($data)
    {
        $this->db->insert('temp_pemesanan_obat', $data);
    }

    public function getDataWhere($where)
    {
        $this->db->where($where);
        return $this->db->get('temp_pemesanan_obat')->num_rows();
    }

    public function showTempPemesananObat($where)
    {
        return $this->db->get('temp_pemesanan_obat', $where);
    }

    public function deleteKeranjang($where)
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
