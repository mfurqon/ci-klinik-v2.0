<?php
defined('BASEPATH') OR exit('No Direct Script Access Allowed');

function cek_login()
{
    $ci = get_instance();

    if (!$ci->session->userdata('email')) {
        $ci->session->set_flashdata(
            'pesan',
            '<div class="alert alert-message alert-danger" role="alert">
                Akses ditolak. Anda belum login!!
            </div>'
        );
        if ($ci->session->userdata('role_id') == 1) {
            redirect('autentifikasi');
        } else {
            redirect('home');
        }
    } else {
        $role_id = $ci->session->userdata('role_id');
        $id_user = $ci->session->userdata('id_user');
    }
}

// jika user belum login, maka user akan di-redirect ke halaman login
function cek_belum_login()
{
    $ci = get_instance();

    if(!$ci->session->userdata('email')) {
        redirect('member');
    }
}

// jika user sudah login, maka halaman login dan registrasi akan diblok
function cek_sudah_login()
{
    $ci = get_instance();

    if ($ci->session->userdata('email')) {
        $ci->session->set_flashdata(
            'pesan',
            '<div class="alert alert-danger" role="alert">
                Anda sudah login!!
            </div>'
        );
        redirect('user');
    }
}

// jika user sudah login, maka halaman login dan daftar akan diblok
function cek_sudah_login_member()
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

// jika role_id user bukan administrator, maka user akan di-redirect ke halaman home
function cek_akses()
{
    $ci = get_instance();

    $role_id = $ci->session->userdata('role_id');
    if ($role_id != 1) {
        redirect('member/blok');
    }
}