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

function cek_sudah_login()
{
    $ci = get_instance();

    if ($ci->session->userdata('email')) {
        $ci->session->set_flashdata(
            'pesan',
            '<div class="alert alert-message aler-danger" role="alert">
                Anda sudah login!!
            </div>'
        );
        redirect('user');
    }
}

function cek_akses()
{
    $ci = get_instance();

    $role_id = $ci->session->userdata('role_id');
    if ($role_id != 1) {
        $ci->session->set_flashdata(
            'pesan',
            '<div class="alert alert-message alert-danger" role="alert">
                Akses tidak diizinkan!!
            </div>'
        );
        redirect('home');
    }
}