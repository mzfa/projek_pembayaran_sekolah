<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JenisPembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['jenis_pembayaran'] = $this->ModelJenisPembayaran->cekData(['status_batal' => null])->result_array();
        // var_dump($data['jenis_pembayaran']);
        // die();

        $this->load->view('layouts/header');
        $this->load->view('jenis_pembayaran/index', $data);
        $this->load->view('layouts/footer');
    }

    public function edit($id){
        $data['jenis_pembayaran'] = $this->ModelJenisPembayaran->cekData(['jenis_pembayaran_id' => $id])->result_array();
        // print_r($data['jenis_pembayaran']);
        // die();
        $this->load->view('jenis_pembayaran/edit', $data);
    }
    
    public function tambah(){
        $data['jenis_pembayaran'] = $this->ModelJenisPembayaran->cekData(['jenis_pembayaran_id' => $id])->result_array();
        // var_dump($data['jenis_pembayaran']);
        // die();
        $data = [
            'nama_jenis_bayar' => htmlspecialchars($this->input->post('nama_jenis_bayar', true)),
            'keterangan' => $this->input->post('keterangan'),
            'tanggal_input' => time(),
        ];
        $this->ModelJenisPembayaran->simpanData($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! Data berhasil dibuat.</div>');
        redirect(base_url('jenispembayaran'));
    }
    public function ubah(){
        $data = [
            'nama_jenis_bayar' => htmlspecialchars($this->input->post('nama_jenis_bayar', true)),
            'keterangan' => $this->input->post('keterangan'),
            'tanggal_input' => time(),
        ];
        // var_dump($data);
        // die();
        $this->ModelJenisPembayaran->updateData($data, ['jenis_pembayaran_id' => $this->input->post('id')]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! Data berhasil diubah.</div>');
        redirect(base_url('jenispembayaran'));
    }
    public function hapus($id){
        $data = [
            'status_batal' => 1,
        ];
        $this->ModelJenisPembayaran->updateData($data, ['jenis_pembayaran_id' => $id]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! Data berhasil dihapus.</div>');
        redirect(base_url('jenispembayaran'));
    }

    public function ubahPassword()
    {
        $data['judul'] = 'Ubah Password';
        $data['jenis_pembayaran'] = $this->ModelJenisPembayaran->cekData(['email' => $this->session->jenis_pembayarandata('email')])->row_array();

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
            $this->load->view('jenis_pembayaran/ubah-password', $data);
            $this->load->view('layouts/footer');
        } else {
            $pwd_skrg = $this->input->post('password_sekarang', true);
            $pwd_baru = $this->input->post('password_baru1', true);
            if (!password_verify($pwd_skrg, $data['jenis_pembayaran']['password'])) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password Saat ini Salah!!! </div>');
                redirect('jenis_pembayaran/ubahPassword');
            } else {
                if ($pwd_skrg == $pwd_baru) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password Baru tidak boleh sama dengan password saat ini!!! </div>');
                    redirect('jenis_pembayaran/ubahPassword');
                } else {
                    //password ok
                    $password_hash = password_hash($pwd_baru, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->jenis_pembayarandata('email'));
                    $this->db->update('jenis_pembayaran');

                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Password Berhasil diubah</div>');
                    redirect('jenis_pembayaran/ubahPassword');
                }
            }
        }
    }
}
