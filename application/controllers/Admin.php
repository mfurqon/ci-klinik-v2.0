<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        cek_akses();
    }

    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['user'] = $this->ModelUser->cekDataUser(['email' => $this->session->userdata('email')]);
        // $data['total_dokter'] = $this->ModelDokter->hitungDokter();
        // $data['total_obat'] = $this->ModelObat->hitungObat();
        // $data['total_janji_temu'] = $this->ModelJanjiTemu->hitungJanjiTemu();
        $data['total_anggota'] = $this->ModelUser->hitungAnggota();

        $this->load->view('templates/adm_header', $data);
        $this->load->view('templates/adm_sidebar', $data);
        $this->load->view('templates/adm_topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/adm_footer');
    }

    public function anggota()
    {
        $data['judul'] = 'Data Anggota';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['anggota'] = $this->ModelUser->getAllUser()->result_array();
        $data['role'] = $this->ModelUser->getAllRole()->result_array();
        // $data['role_where'] = $this->ModelUser->joinRoleIdById(['user.id' => $this->uri->segment(3)])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Anggota', 'required|trim');
        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/adm_header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/adm_topbar', $data);
            $this->load->view('admin/anggota', $data);
            $this->load->view('templates/adm_footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($email),
                'gambar' => 'default.jpg',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role'),
                'is_active' => 1,
                'tanggal_dibuat' => date('Y-m-d')
            ];

            $this->ModelUser->simpanData($data); //Menggunakan Model
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message" role="alert">
                    &#129395; Data anggota baru berhasil ditambah
                </div>'
            );
            redirect('admin/anggota');
        }
    }

    public function ubahAnggota()
    {
        $data['judul'] = 'Ubah Data Anggota';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['anggota'] = $this->ModelUser->getUserWhere(['id' => $this->uri->segment(3)])->row_array();
        $data['role_where'] = $this->ModelUser->joinRoleIdById(['user.id' => $this->uri->segment(3)])->result_array();
        $data['role'] = $this->ModelUser->getAllRole()->result_array();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('role_id', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/adm_header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/adm_topbar', $data);
            $this->load->view('admin/ubah-anggota', $data);
            $this->load->view('templates/adm_footer');
        } else {
            $nama = $this->input->post('nama', true);
            $id = $this->input->post('id', true);
            $role = $this->input->post('role_id', true);

            // Jika ada gambar yang akan di-upload
            $upload_image = $_FILES['gambar'];

            if ($upload_image) {
                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '3000';
                $config['file_name'] = 'pro' . time();

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $gambar_lama = $data['user']['gambar'];
                    if ($gambar_lama != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $gambar_lama);
                    }

                    $gambar_baru = $this->upload->data('file_name');
                    $this->db->set('gambar', $gambar_baru);
                }
            }

            $this->db->set('role_id', $role);
            $this->db->set('nama', $nama);
            $this->db->where('id', $id);
            $this->db->update('user');

            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message">
                    &#129395; Data anggota berhasil diubah
                </div>'
            );
            redirect('admin/anggota');
        }
    }

    public function hapusAnggota()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelUser->hapusAnggota($where);
        $data['anggota'] = $this->ModelUser->getUserWhere(['id' => $this->uri->segment(3)])->row_array();

        $gambar_user = $data['anggota']['gambar'];
        unlink(FCPATH . 'assets/img/profile/' . $gambar_user);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-message">
                Data anggota berhasil dihapus
            </div>'
        );
        redirect('admin/anggota');
    }

    public function role()
    {
        $data['judul'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/adm_header', $data);
            $this->load->view('templates/adm_sidebar', $data);
            $this->load->view('templates/adm_topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/adm_footer');
        } else {
            $data = [
                'role' => $this->input->post('role', true)
            ];
            $this->ModelUser->tambahRole($data);
        }
    }

    public function aksesRole($role_id)
    {
        $data['judul'] = 'Akses Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/adm_header', $data);
        $this->load->view('templates/adm_sidebar', $data);
        $this->load->view('templates/adm_topbar', $data);
        $this->load->view('admin/akses-role', $data);
        $this->load->view('templates/adm_footer');
    }

    public function ubahAkses()
    {
        // Buat variabel data diambil dari data variable ajax
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('pesan', '
                <div class="alert alert-success" role="alert">
                &#129395; Akses berhasil diubah
                </div>
            ');
    }
}
