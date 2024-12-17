<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'Beranda';
        $data['user'] = $this->ModelUser->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['dokter'] = $this->ModelDokter->getAllDokter();
        $data['dokter_limit'] = $this->ModelDokter->getDokterLimit();
        $data['data_keranjang'] = $this->ModelObat->getDataWhere(['id_user' => $this->session->userdata('id_user')]);

        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }

    public function janji_temu()
    {
        cek_belum_login();

        $data['judul'] = "Janji Temu";
        $data['user'] = $this->ModelUser->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['dokter'] = $this->ModelDokter->getAllDokter();
        $data['data_keranjang'] = $this->ModelObat->getDataWhere(['id_user' => $this->session->userdata('id_user')]);

        set_buat_janji_temu_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('home/janji-temu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->ModelJanjiTemu->tambahJanjiTemu($data);
            $this->session->set_flashdata('pesan', [
                'title' => 'Berhasil',
                'text' => '🥳 Janji Temu berhasil dibuat',
                'icon' => 'success'
            ]);
            redirect('home');
        }
    }

    public function obat()
    {
        $data['judul'] = "Obat";
        $data['user'] = $this->ModelUser->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['obat'] = $this->ModelObat->getAllObat();
        $data['data_keranjang'] = $this->ModelObat->getDataWhere(['id_user' => $this->session->userdata('id_user')]);

        $this->load->view('templates/header', $data);
        $this->load->view('obat/index', $data);
        $this->load->view('templates/footer');
    }

    public function dokter()
    {
        $data['judul'] = "Dokter";
        $data['user'] = $this->ModelUser->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['dokter'] = $this->ModelDokter->getJoinDokterSpesialis();
        $data['data_keranjang'] = $this->ModelObat->getDataWhere(['id_user' => $this->session->userdata('id_user')]);

        $this->load->view('templates/header', $data);
        $this->load->view('dokter/index', $data);
        $this->load->view('templates/footer');
    }

    public function tentang()
    {
        $data['judul'] = 'Tentang';
        $data['user'] = $this->ModelUser->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['data_keranjang'] = $this->ModelObat->getDataWhere(['id_user' => $this->session->userdata('id_user')]);

        $this->load->view('templates/header', $data);
        $this->load->view('home/tentang');
        $this->load->view('templates/footer');
    }

    public function riwayat_janji_temu()
    {
        $data['judul'] = 'Riwayat Janji Temu';
        $data['user'] = $this->ModelUser->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['janji_temu'] = $this->ModelJanjiTemu->getJanjiTemuById($data['user']['id']);
        $data['data_keranjang'] = $this->ModelObat->getDataWhere(['id_user' => $this->session->userdata('id_user')]);

        $this->load->view('templates/header', $data);
        $this->load->view('home/riwayat-janji-temu', $data);
        $this->load->view('templates/footer');
    }

    public function keranjang()
    {
        cek_belum_login();

        $id_user = $this->session->userdata('id_user');

        $data['judul'] = "Data Keranjang Obat";
        $data['user'] = $this->ModelUser->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['data_keranjang'] = $this->ModelObat->getDataWhere(['id_user' => $this->session->userdata('id_user')]);

        $dtb = $this->ModelObat->showTempPemesananObat(['id_user' => $id_user])->num_rows();

        if ($dtb < 1) {
            $this->session->set_flashdata('pesan', [
                'title' => 'Kosong',
                'text' => 'Tidak ada apapun di keranjang 😞',
                'icon' => 'error'
            ]);
            redirect(base_url());
        } else {
            $data['temp_pemesanan_obat'] = $this->ModelObat->joinObatTempPemesananObat($id_user);
        }

        $this->load->view('templates/header', $data);
        $this->load->view('obat/keranjang', $data);
        $this->load->view('templates/footer');
    }

    public function hapus_keranjang()
    {
        $id_temp = $this->uri->segment(3);

        $this->ModelObat->deleteKeranjang(['id' => $id_temp]);

        redirect('home/keranjang');
    }

    public function update_keranjang()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $id = $data['id'];
        $quantity = $data['quantity'];
        $this->db->where('id', $id);
        $this->db->update('temp_pemesanan_obat', ['jumlah_obat' => $quantity]);
        echo json_encode(['success' => true]);
    }
}
