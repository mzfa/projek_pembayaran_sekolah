<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['user'] = $this->ModelUser->all()->result_array();
        // var_dump($data['user']);
        // die();

        $this->load->view('layouts/header');
        $this->load->view('user/index', $data);
        $this->load->view('layouts/footer');
    }

    public function edit($id){
        $data['user'] = $this->ModelUser->cekData(['user_id' => $id])->result_array();
        // print_r($data['user']);
        // die();
        $this->load->view('user/edit', $data);
    }
    
    public function tambah(){
        $data['user'] = $this->ModelUser->cekData(['user_id' => $id])->result_array();
        // var_dump($data['user']);
        // die();
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => $this->input->post('password'),
            'role' => $this->input->post('role'),
            'is_active' => 1,
            'tanggal_input' => time(),
        ];
        $this->ModelUser->simpanData($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! User berhasil dibuat.</div>');
        redirect(base_url('user'));
    }
    public function ubah(){
        // $data['user'] = $this->ModelUser->cekData(['user_id' => $id])->result_array();
        // var_dump($data['user']);
        // die();
        $data = '';
        if(!empty($this->input->post('password'))){
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => $this->input->post('password'),
                'role' => $this->input->post('role'),
            ];
        }else{
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'role' => $this->input->post('role'),
            ];
        }
        // var_dump($data);
        // die();
        $this->ModelUser->updateData($data, ['user_id' => $this->input->post('id')]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! User berhasil diubah.</div>');
        redirect(base_url('user'));
    }

    public function ubahPassword()
    {
        $data['judul'] = 'Ubah Password';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('password_sekarang', 'Password Saat ini', 'required|trim', [
            'required' => 'Password saat ini harus diisi'
        ]);

        $this->form_validation->set_rules('password_baru1', 'Password Baru', 'required|trim|min_length[4]|matches[password_baru2]', [
            'required' => 'Password Baru harus diisi',
            'min_length' => 'Password tidak boleh kurang dari 4 digit',
            'matches' => 'Password Baru tidak sama dengan ulangi password'
        ]);

        $this->form_validation->set_rules('password_baru2', 'Konfirmasi Password Baru', 'required|trim|min_length[4]|matches[password_baru1]', [
            'required' => 'Ulangi Password harus diisi',
            'min_length' => 'Password tidak boleh kurang dari 4 digit',
            'matches' => 'Ulangi Password tidak sama dengan password baru'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar', $data);
            $this->load->view('layouts/topbar', $data);
            $this->load->view('user/ubah-password', $data);
            $this->load->view('layouts/footer');
        } else {
            $pwd_skrg = $this->input->post('password_sekarang', true);
            $pwd_baru = $this->input->post('password_baru1', true);
            if (!password_verify($pwd_skrg, $data['user']['password'])) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password Saat ini Salah!!! </div>');
                redirect('user/ubahPassword');
            } else {
                if ($pwd_skrg == $pwd_baru) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password Baru tidak boleh sama dengan password saat ini!!! </div>');
                    redirect('user/ubahPassword');
                } else {
                    //password ok
                    $password_hash = password_hash($pwd_baru, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Password Berhasil diubah</div>');
                    redirect('user/ubahPassword');
                }
            }
        }
    }
}
