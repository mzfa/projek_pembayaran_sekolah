<?php

function cek_login()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        $ci->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akses ditolak. Anda belum login!! </div>');
        if (empty($ci->session->userdata('role'))) {
            redirect('login');
        } else {
            redirect('home');
        }
    } else {
        $role = $ci->session->userdata('role');
        $user_id = $ci->session->userdata('user_id');
    }
}

function cek_user()
{
    $ci = get_instance();
    $role = $ci->session->userdata('role');
    if ($role != 1) {
        $ci->session->set_flashdata('pesan', '<div class="alert alertdanger" role="alert">Akses tidak diizinkan </div>');
        redirect('home');
    }
}
