<?php

class Login extends CI_Controller
{

    public function index()
    {
        // jika statusnya sudah login, maka tidak bisa mengakses halaman login alias dikembalikan ke tampilan user
        if($this->session->userdata('username')){
            redirect('home');
        }
        $this->load->view('auth/login');
    }

    public function action_login(){
        // die('ok');
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username Harus diisi!!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password Harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = htmlspecialchars($this->input->post('username', true));
        $password = $this->input->post('password', true);

        $user = $this->ModelUser->cekData(['username' => $username,'is_active' => 1])->row_array();

        //jika usernya ada
        if ($user) {
            //jika user sudah aktif
            if ($user['is_active'] == 1) {
                //cek password
                if ($password === $user['password']) {
                    $data = [
                        'username' => $user['username'],
                        'nama' => $user['nama'],
                        'user_id' => $user['user_id'],
                        'role' => $user['role']
                    ];
                    $this->session->set_userdata($data);
                    redirect('home');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password salah!!</div>');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">User belum diaktifasi!!</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email tidak terdaftar!!</div>');
            redirect('login');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('role');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda telah logout!!</div>');
        redirect('login');
    }

    public function blok()
    {
        $this->load->view('login/blok');
    }

    public function gagal()
    {
        $this->load->view('login/gagal');
    }
}
