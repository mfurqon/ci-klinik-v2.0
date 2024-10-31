<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModelObat extends CI_Model
{
    // Pengolahan data pada table obat
    public function getAllObat()
    {
        $this->db->select('obat.*, jenis_obat.nama');
        $this->db->from('obat');
        $this->db->join('jenis_obat', 'obat.id_jenis_obat = jenis_obat.id');
        return $this->db->get()->result_array();
    }

    public function obatWhere($where)
    {
        $this->db->select('obat.*, jenis_obat.nama_jenis_obat');
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
    
    public function tambahDataObat($data)
    {
        $this->db->insert('obat', $data);
    }

    public function ubahDataObat()
    {
        $data = [
            "nama_obat" => $this->input->post('nama_obat', true),
            "harga" => $this->input->post('harga', true),
            "deskripsi" => $this->input->post('deskripsi', true),
            "stok" => $this->input->post('stok', true),
            "tanggal_kadaluwarsa" => $this->input->post('tanggal_kadaluwarsa', true),
            "gambar_obat" => $this->input->post('gambar_obat', true),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('obat', $data);
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

    public function joinObatJenisObat()
    {
        $this->db->select('obat.*, jenis_obat.nama_jenis_obat');
        $this->db->from('obat');
        $this->db->join('jenis_obat', 'obat.id_jenis_obat = jenis_obat.id');
        return $this->db->get()->result_array();
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


    // Kumpulan kode form_validation

    // Kumpulan kode form_validation jenis_obat
    public function form_validation_jenis_obat()
    {
        $this->form_validation->set_rules('jenis_obat', 'Jenis Obat', 'required|trim');
    }


    // Kumpulan kode form_validation obat
    public function form_validation_tambah_obat()
    {
        $this->form_validation->set_rules('nama_obat', 'Nama Obat', 'required|trim');
        $this->form_validation->set_rules('id_jenis_obat', 'Jenis Obat', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('stok', 'Stok', 'required|trim|numeric');
        $this->form_validation->set_rules('tanggal_kadaluwarsa', 'Tanggal Kadaluwarsa', 'required');
    }

    public function form_validation_ubah_obat()
    {
        $this->form_validation->set_rules('nama_obat', 'Nama Obat', 'required|trim');
        $this->form_validation->set_rules('id_jenis_obat', 'Jenis Obat', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('stok', 'Stok', 'required|trim|numeric');
        $this->form_validation->set_rules('tanggal_kadaluwarsa', 'Tanggal Kadaluwarsa', 'required');
    }

    public function form_validation_beli_obat()
    {
        $this->form_validation->set_rules('nama_pemesan', 'Nama Pemesan', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('telepon', 'Nomor Telepon', 'required|trim|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('nama_obat', 'Nama Obat', 'required|trim');
        $this->form_validation->set_rules('pembayaran', 'Pembayaran', 'required|trim');
        $this->form_validation->set_rules('pengiriman', 'Pengiriman', 'required|trim');
        $this->form_validation->set_rules('jumlah', 'Jumlah Obat', 'required|trim|numeric');
    }
}
