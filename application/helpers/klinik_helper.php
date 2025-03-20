<?php
defined('BASEPATH') OR exit('No Direct Script Access Allowed');

// function untuk admin
// jika admin belum login, maka admin akan di-redirect ke halaman login admin
function cek_belum_login_admin()
{
    $ci = get_instance();

    if (!$ci->session->userdata('email')) {
        $ci->session->set_flashdata(
            'pesan',
            '<div class="alert alert-message alert-danger" role="alert">
                Akses ditolak. Anda belum login!!
            </div>'
        );
        redirect('admin/auth');
    } 
}

// jika user sudah login, maka halaman login dan registrasi akan diblok
function cek_sudah_login_admin()
{
    $ci = get_instance();
    $role_id = $ci->session->userdata('role_id');

    if ($ci->session->userdata('email') && $role_id == 1) {
        $ci->session->set_flashdata(
            'pesan',
            '<div class="alert alert-danger" role="alert">
                Anda sudah login!!
            </div>'
        );
        redirect('admin/dashboard');
    } elseif ($ci->session->userdata('email') && $role_id == 2) {
        redirect(base_url());
    }
}

// jika role_id user bukan administrator, maka user akan di-redirect ke halaman home
function cek_akses()
{
    $ci = get_instance();

    $role_id = $ci->session->userdata('role_id');
    if ($role_id != 1) {
        redirect('auth/blok');
    }
}


// function untuk user
// jika user belum login, maka user akan di-redirect ke halaman login user
function cek_belum_login_user()
{
    $ci = get_instance();

    if(!$ci->session->userdata('email')) {
        $ci->session->set_flashdata(
            'pesan',
            '<div class="alert alert-danger" role="alert">
                Anda belum login!!
            </div>'
        );
        redirect('auth');
    }
}

// jika user sudah login, maka halaman login dan daftar akan diblok
function cek_sudah_login_user()
{
    $ci = get_instance();

    if ($ci->session->userdata('email')) {
        $ci->session->set_flashdata(
            'pesan',
            '<div class="alert alert-message alert-danger" role="alert">
                Anda sudah login!!
            </div>'
        );
        redirect('home');
    }
}