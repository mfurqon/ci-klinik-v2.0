<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'Beranda';
        $data['user'] = $this->UserModel->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['dokter'] = $this->DokterModel->getAllDokter();
        $data['dokter_limit'] = $this->DokterModel->getDokterLimit();
        $data['data_keranjang'] = $this->TempPemesananObatModel->getDataWhere(['id_user' => $this->session->userdata('id_user')]);

        $this->load->view('frontend/templates/main/header', $data);
        $this->load->view('frontend/home/index', $data);
        $this->load->view('frontend/templates/main/footer');
    }

    public function janji_temu()
    {
        cek_belum_login();

        $data['judul'] = "Janji Temu";
        $data['user'] = $this->UserModel->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['dokter'] = $this->DokterModel->getAllDokter();
        $data['data_keranjang'] = $this->TempPemesananObatModel->getDataWhere(['id_user' => $this->session->userdata('id_user')]);

        set_buat_janji_temu_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('frontend/templates/main/header', $data);
            $this->load->view('frontend/janji_temu/index', $data);
            $this->load->view('frontend/templates/main/footer');
        } else {
            $this->JanjiTemuModel->insertJanjiTemu($data);
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
        $data['user'] = $this->UserModel->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['obat'] = $this->ObatModel->getAllObat();
        $data['data_keranjang'] = $this->TempPemesananObatModel->getDataWhere(['id_user' => $this->session->userdata('id_user')]);

        $this->load->view('frontend/templates/main/header', $data);
        $this->load->view('frontend/obat/index', $data);
        $this->load->view('frontend/templates/main/footer');
    }

    public function dokter()
    {
        $data['judul'] = "Dokter";
        $data['user'] = $this->UserModel->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['dokter'] = $this->DokterModel->getJoinDokterSpesialisasi();
        $data['data_keranjang'] = $this->TempPemesananObatModel->getDataWhere(['id_user' => $this->session->userdata('id_user')]);

        $this->load->view('frontend/templates/main/header', $data);
        $this->load->view('frontend/dokter/index', $data);
        $this->load->view('frontend/templates/main/footer');
    }

    public function tentang()
    {
        $data['judul'] = 'Tentang';
        $data['user'] = $this->UserModel->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['data_keranjang'] = $this->TempPemesananObatModel->getDataWhere(['id_user' => $this->session->userdata('id_user')]);

        $this->load->view('frontend/templates/main/header', $data);
        $this->load->view('frontend/tentang/index');
        $this->load->view('frontend/templates/main/footer');
    }

    public function riwayat_janji_temu()
    {
        $data['judul'] = 'Riwayat Janji Temu';
        $data['user'] = $this->UserModel->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['janji_temu'] = $this->JanjiTemuModel->getJanjiTemuById($data['user']['id']);
        $data['data_keranjang'] = $this->TempPemesananObatModel->getDataWhere(['id_user' => $this->session->userdata('id_user')]);

        $this->load->view('frontend/templates/main/header', $data);
        $this->load->view('frontend/riwayat/riwayat_janji_temu', $data);
        $this->load->view('frontend/templates/main/footer');
    }

    public function keranjang()
    {
        cek_belum_login();

        $id_user = $this->session->userdata('id_user');

        $data['judul'] = "Data Keranjang Obat";
        $data['user'] = $this->UserModel->cekDataUser(['email' => $this->session->userdata('email')]);
        $data['data_keranjang'] = $this->TempPemesananObatModel->getDataWhere(['id_user' => $this->session->userdata('id_user')]);

        $dtb = $this->TempPemesananObatModel->getTempPemesananObatWhere(['id_user' => $id_user]);

        if ($dtb < 1) {
            $this->session->set_flashdata('pesan', [
                'title' => 'Kosong',
                'text' => 'Tidak ada apapun di keranjang 😞',
                'icon' => 'error'
            ]);
            redirect(base_url());
        } else {
            $data['temp_pemesanan_obat'] = $this->TempPemesananObatModel->joinObatTempPemesananObat($id_user);
        }

        $this->load->view('frontend/templates/main/header', $data);
        $this->load->view('frontend/keranjang/index', $data);
        $this->load->view('frontend/templates/main/footer');
    }

    public function hapus_keranjang()
    {
        $id_temp = $this->uri->segment(3);

        $this->TempPemesananObatModel->deleteTempPemesananObat(['id' => $id_temp]);

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
