<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class Obat extends CI_Controller
{
    public function index()
    {
        $data['judul'] = "Obat";
        $data['user'] = $this->UserModel->getUserWhere(['email' => $this->session->userdata('email')]);
        $data['obat'] = $this->ObatModel->getAllObat();
        $data['data_keranjang'] = $this->TempPemesananObatModel->getDataWhere(['id_user' => $this->session->userdata('id_user')]);

        $this->load->view('frontend/templates/main/header', $data);
        $this->load->view('frontend/obat/index', $data);
        $this->load->view('frontend/templates/main/footer');
    }

    public function beli_obat($id)
    {
        cek_belum_login_user();

        $data['judul'] = "Beli Obat";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role_id'] = $this->session->userdata('role_id');
        $data['obat'] = $this->ObatModel->getObatById($id);

        // $this->ObatModel->form_validation_beli_obat(); -> tidak digunakan lagi

        if ($this->form_validation->run() == false) {
            $this->load->view('frontend/templates/main/header', $data);
            $this->load->view('backend/obat/data/beli_obat', $data);
            $this->load->view('frontend/templates/main/footer', $data);
        } else {
            $stok = $data['obat']['stok'];
            $jumlah_obat = $this->input->post('jumlah');

            $new_stok = $stok - $jumlah_obat;
            $this->ObatModel->updateStokObat($data['obat']['id'], $new_stok);

            $this->PemesananObatModel->insertPemesananObat();
            echo "<script>
                    alert('Obat berhasil dipesan');
                    window.location.href='" . base_url('obat') . "';
                </script>";
            exit;
        }
    }
}