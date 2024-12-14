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

        $this->ModelJanjiTemu->form_validation_buat_janji_temu();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('home/janji-temu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->ModelJanjiTemu->tambahJanjiTemu($data);
            $this->session->set_flashdata('pesan', '🥳 Janji Temu berhasil dibuat');
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
}
