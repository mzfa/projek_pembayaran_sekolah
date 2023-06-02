<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['siswa'] = $this->ModelSiswa->cekData(['status' => null])->result_array();
        // var_dump($data['siswa']);
        // die();

        $this->load->view('layouts/header');
        $this->load->view('siswa/index', $data);
        $this->load->view('layouts/footer');
    }

    public function edit($id){
        $data['siswa'] = $this->ModelSiswa->cekData(['siswa_id' => $id])->result_array();
        // print_r($data['siswa']);
        // die();
        $this->load->view('siswa/edit', $data);
    }
    
    public function tambah(){
        $data['siswa'] = $this->ModelSiswa->cekData(['siswa_id' => $id])->result_array();
        // var_dump($data['siswa']);
        // die();
        $data = [
            'nama_siswa' => htmlspecialchars($this->input->post('nama_siswa', true)),
            'nis' => htmlspecialchars($this->input->post('nis', true)),
            'alamat_siswa' => htmlspecialchars($this->input->post('alamat_siswa', true)),
            'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
            'periode_masuk' => htmlspecialchars($this->input->post('periode_masuk', true)),
            'biaya_awal' => htmlspecialchars($this->input->post('biaya_awal', true)),
            'biaya_spp' => htmlspecialchars($this->input->post('biaya_spp', true)),
            'daftar_ulang' => htmlspecialchars($this->input->post('daftar_ulang', true)),
            'tanggal_masuk' => $this->input->post('tanggal_masuk'),
            // 'tanggal_input' => time(),
        ];
        $this->ModelSiswa->simpanData($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! Data berhasil dibuat.</div>');
        redirect(base_url('siswa'));
    }
    public function ubah(){
        $data = [
            'nama_siswa' => htmlspecialchars($this->input->post('nama_siswa', true)),
            'nis' => htmlspecialchars($this->input->post('nis', true)),
            'alamat_siswa' => htmlspecialchars($this->input->post('alamat_siswa', true)),
            'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
            'periode_masuk' => htmlspecialchars($this->input->post('periode_masuk', true)),
            'biaya_awal' => htmlspecialchars($this->input->post('biaya_awal', true)),
            'biaya_spp' => htmlspecialchars($this->input->post('biaya_spp', true)),
            'daftar_ulang' => htmlspecialchars($this->input->post('daftar_ulang', true)),
            'tanggal_masuk' => $this->input->post('tanggal_masuk'),
        ];
        // var_dump($data);
        // die();
        $this->ModelSiswa->updateData($data, ['siswa_id' => $this->input->post('id')]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! Data berhasil diubah.</div>');
        redirect(base_url('Siswa'));
    }
    public function hapus($id){
        $data = [
            'status' => 1,
        ];
        $this->ModelSiswa->updateData($data, ['siswa_id' => $id]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! Data berhasil dihapus.</div>');
        redirect(base_url('Siswa'));
    }

    public function ubahPassword()
    {
        $data['judul'] = 'Ubah Password';
        $data['siswa'] = $this->ModelSiswa->cekData(['email' => $this->session->siswadata('email')])->row_array();

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
            $this->load->view('siswa/ubah-password', $data);
            $this->load->view('layouts/footer');
        } else {
            $pwd_skrg = $this->input->post('password_sekarang', true);
            $pwd_baru = $this->input->post('password_baru1', true);
            if (!password_verify($pwd_skrg, $data['siswa']['password'])) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password Saat ini Salah!!! </div>');
                redirect('siswa/ubahPassword');
            } else {
                if ($pwd_skrg == $pwd_baru) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password Baru tidak boleh sama dengan password saat ini!!! </div>');
                    redirect('siswa/ubahPassword');
                } else {
                    //password ok
                    $password_hash = password_hash($pwd_baru, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->siswadata('email'));
                    $this->db->update('siswa');

                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Password Berhasil diubah</div>');
                    redirect('siswa/ubahPassword');
                }
            }
        }
    }
}
