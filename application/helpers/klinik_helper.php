<?php

function cek_akses()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('autentifikasi');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('autentifikasi/blok');
        }
    }
}

function cek_role()
{
    $ci = get_instance();
    if ($ci->session->userdata('role_id') != 1) {
        redirect('autentifikasi/blok');
    }
}

function cek_login()
{
    $ci = get_instance();
    if ($ci->session->userdata('email')) {
        redirect('user');
    }
}

function cek_belum_login()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('autentifikasi');
    }
}

function cek_masuk()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('autentifikasi');
    } else {
        if ($ci->session->userdata('role_id') != 1 && $ci->session->userdata('role_id') != 3) {
            redirect('autentifikasi/blok');
        }
    }
}
