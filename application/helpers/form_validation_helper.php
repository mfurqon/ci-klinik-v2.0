<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

// Form validation dokter
if (!function_exists('set_tambah_dokter_rules')) {
    function set_tambah_dokter_rules()
    {
        $CI = get_instance();

        $CI->form_validation->set_rules('nip', 'NIP', 'required|trim|numeric|is_unique[dokter.nip]|min_length[8]');
        $CI->form_validation->set_rules('nama_dokter', 'Nama Dokter', 'required|trim');
        $CI->form_validation->set_rules('spesialisasi', 'Spesialisasi', 'required|trim');
        $CI->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $CI->form_validation->set_rules('telepon', 'Nomor Telepon', 'required|trim|numeric');
        $CI->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $CI->form_validation->set_rules('alamat', 'Alamat', 'required');
        $CI->form_validation->set_rules('jam_masuk', 'Jam Masuk', 'required');
        $CI->form_validation->set_rules('jam_keluar', 'Jam Keluar', 'required');
    }
}

if (!function_exists('set_ubah_dokter_rules')) {
    function set_ubah_dokter_rules()
    {
        $CI = get_instance();

        $CI->form_validation->set_rules('nama_dokter', 'Nama Dokter', 'required|trim');
        $CI->form_validation->set_rules('spesialisasi', 'Spesialisasi', 'required|trim');
        $CI->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $CI->form_validation->set_rules('telepon', 'Nomor Telepon', 'required|trim|numeric');
        $CI->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $CI->form_validation->set_rules('alamat', 'Alamat', 'required');
        $CI->form_validation->set_rules('jam_masuk', 'Jam Masuk', 'required');
        $CI->form_validation->set_rules('jam_keluar', 'Jam Keluar', 'required');
    }
}


// Form validation spesialisasi
if (!function_exists('set_tambah_spesialisasi_rules')) {
    function set_tambah_spesialisasi_rules()
    {
        $CI = get_instance();

        $CI->form_validation->set_rules('spesialisasi', 'Spesialisasi', 'required|trim');
    }
}

if (!function_exists('set_ubah_spesialisasi_rules')) {
    function set_ubah_spesialisasi_rules()
    {
        $CI = get_instance();

        $CI->form_validation->set_rules('spesialisasi', 'Spesialisasi', 'required|trim');
    }
}


// Form validation obat
if (!function_exists('set_tambah_obat_rules')) {
    function set_tambah_obat_rules()
    {
        $CI = get_instance();

        $CI->form_validation->set_rules('nama_obat', 'Nama Obat', 'required|trim');
        $CI->form_validation->set_rules('id_jenis_obat', 'Jenis Obat', 'required|trim');
        $CI->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric');
        $CI->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        $CI->form_validation->set_rules('stok', 'Stok', 'required|trim|numeric');
        $CI->form_validation->set_rules('tanggal_kedaluwarsa', 'Tanggal Kadaluwarsa', 'required');
    }
}

if (!function_exists('set_ubah_obat_rules')) {
    function set_ubah_obat_rules()
    {
        $CI = get_instance();

        $CI->form_validation->set_rules('nama_obat', 'Nama Obat', 'required|trim');
        $CI->form_validation->set_rules('id_jenis_obat', 'Jenis Obat', 'required|trim');
        $CI->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric');
        $CI->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        $CI->form_validation->set_rules('stok', 'Stok', 'required|trim|numeric');
        $CI->form_validation->set_rules('tanggal_kedaluwarsa', 'Tanggal Kadaluwarsa', 'required');
    }
}


// Form validation jenis_obat
if (!function_exists('set_tambah_jenis_obat_rules')) {
    function set_tambah_jenis_obat_rules()
    {
        $CI = get_instance();

        $CI->form_validation->set_rules('jenis_obat', 'Jenis Obat', 'required|trim');
    }
}

if (!function_exists('set_ubah_jenis_obat_rules')) {
    function set_ubah_jenis_obat_rules()
    {
        $CI = get_instance();

        $CI->form_validation->set_rules('jenis_obat', 'Jenis Obat', 'required|trim');
    }
}


// Form validation janji_temu
if (!function_exists('set_buat_janji_temu_rules')) {
    function set_buat_janji_temu_rules()
    {
        $CI = get_instance();

        $CI->form_validation->set_rules('dokter', 'Dokter', 'required');
        $CI->form_validation->set_rules('tanggal_temu', 'Tanggal Temu', 'required');
        $CI->form_validation->set_rules('jam_temu', 'Jam Temu', 'required');
    }
}


// Form validation user
if (!function_exists('set_tambah_user_rules')) {
    function set_tambah_user_rules()
    {
        $CI = get_instance();

        $CI->form_validation->set_rules('nama', 'Nama Anggota', 'required|trim');
        $CI->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email|is_unique[user.email]');
        $CI->form_validation->set_rules('role', 'Role', 'required');
        $CI->form_validation->set_rules('telepon', 'Nomor Telepon', 'required|trim|numeric|min_length[5]');
        $CI->form_validation->set_rules('alamat', 'Alamat', 'required');
        $CI->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]');
        $CI->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|trim|min_length[3]|matches[password1]');
    }
}

if (!function_exists('set_ubah_user_rules')) {
    function set_ubah_user_rules()
    {
        $CI = get_instance();

        $CI->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $CI->form_validation->set_rules('telepon', 'Nomor Telepon', 'required|trim|numeric|min_length[5]');
        $CI->form_validation->set_rules('alamat', 'Alamat', 'required|trim|min_length[7]');
    }
}


// Form validation ubah password
if (!function_exists('set_ubah_password_rules')) {
    function set_ubah_password_rules()
    {
        $CI = get_instance();

        $CI->form_validation->set_rules('password_lama', 'Password Saat Ini', 'required|trim');
        $CI->form_validation->set_rules('password_baru1', 'Password Baru', 'required|trim|min_length[3]|matches[password_baru2]');
        $CI->form_validation->set_rules('password_baru2', 'Konfirmasi Password Baru', 'required|trim|min_length[3]|matches[password_baru1]');
    }
}

// Form validation role
if (!function_exists('set_tambah_role_rules')) {
    function set_tambah_role_rules()
    {
        $CI = get_instance();

        $CI->form_validation->set_rules('role', 'Role', 'required|trim');
    }
}

if (!function_exists('set_ubah_role_rules')) {
    function set_ubah_role_rules()
    {
        $CI = get_instance();

        $CI->form_validation->set_rules('role', 'Role', 'required|trim');
    }
}
