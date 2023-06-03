<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['transaksi'] = $this->db->query("SELECT * FROM transaksi LEFT JOIN jenis_pembayaran ON transaksi.jenis_pembayaran_id=jenis_pembayaran.jenis_pembayaran_id LEFT JOIN siswa ON transaksi.siswa_id=siswa.siswa_id")->result_array();
        // $sql="SELECT * FROM siswa";    
        // $query = $this->db->query($sql);
        // $data =  $query->result_array();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();

        $this->load->view('layouts/header');
        $this->load->view('laporan/index', $data);
        $this->load->view('layouts/footer');
    }

    public function edit($id){
        $data['transaksi'] = $this->ModelJenisPembayaran->cekData(['transaksi_id' => $id])->result_array();
        // print_r($data['transaksi']);
        // die();
        $this->load->view('laporan/edit', $data);
    }
    public function bayar($id,$periode,$jenis){
        $data['siswa'] = $this->ModelSiswa->cekData(['siswa_id' => $id])->result_array();
        $data['id'] = $id;
        $data['periode'] = $periode;
        $data['jenis'] = $jenis;
        // print_r($data['transaksi']);
        // die();
        $this->load->view('laporan/bayar', $data);
    }

    public function simpan_bayaran(){
        // $data['transaksi'] = $this->ModelJenisPembayaran->cekData(['transaksi_id' => $id])->result_array();
        // var_dump($data['transaksi']);
        // die();
        $data = [
            // 'total_bayar' => htmlspecialchars($this->input->post('total_bayar', true)),
            'total_bayar' => $this->input->post('total_bayar'),
            'periode_transaksi' => $this->input->post('periode'),
            'jenis_pembayaran_id' => $this->input->post('jenis_pembayaran_id'),
            'siswa_id' => $this->input->post('siswa_id'),
            'user_id' => $this->session->userdata('user_id'),
        ];
        $this->ModelTransaksi->simpanData($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! Data berhasil dibuat.</div>');
        redirect(base_url('transaksi'));
    }

    public function cetak_bukti($id,$periode,$jenis){
        $data['siswa'] = $this->ModelSiswa->cekData(['siswa_id' => $id])->result_array();
        $data['transaksi'] = $this->db->query("SELECT * FROM transaksi LEFT JOIN jenis_pembayaran ON transaksi.jenis_pembayaran_id=jenis_pembayaran.jenis_pembayaran_id WHERE periode_transaksi='$periode' AND siswa_id='$id'")->result_array();
        $data['id'] = $id;
        $data['periode'] = $periode;
        $data['jenis'] = $jenis;
        // print_r($data['transaksi']);
        // die();
        $this->load->view('laporan/cetak_bukti', $data);
    }

    public function detail($id){
        $data['siswa'] = $this->ModelSiswa->cekData(['siswa_id' => $id])->result_array();
        // print_r($data['transaksi']);
        // die();
        $this->load->view('layouts/header');
        $this->load->view('laporan/detail', $data);
        $this->load->view('layouts/footer');
    }
    
    public function tambah(){
        // $data['transaksi'] = $this->ModelJenisPembayaran->cekData(['transaksi_id' => $id])->result_array();
        // var_dump($data['transaksi']);
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
        $this->ModelJenisPembayaran->updateData($data, ['transaksi_id' => $this->input->post('id')]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! Data berhasil diubah.</div>');
        redirect(base_url('jenispembayaran'));
    }
    public function hapus($id){
        $data = [
            'status_batal' => 1,
        ];
        $this->ModelJenisPembayaran->updateData($data, ['transaksi_id' => $id]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! Data berhasil dihapus.</div>');
        redirect(base_url('jenispembayaran'));
    }

    public function ubahPassword()
    {
        $data['judul'] = 'Ubah Password';
        $data['transaksi'] = $this->ModelJenisPembayaran->cekData(['email' => $this->session->transaksidata('email')])->row_array();

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
            $this->load->view('laporan/ubah-password', $data);
            $this->load->view('layouts/footer');
        } else {
            $pwd_skrg = $this->input->post('password_sekarang', true);
            $pwd_baru = $this->input->post('password_baru1', true);
            if (!password_verify($pwd_skrg, $data['transaksi']['password'])) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password Saat ini Salah!!! </div>');
                redirect('laporan/ubahPassword');
            } else {
                if ($pwd_skrg == $pwd_baru) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password Baru tidak boleh sama dengan password saat ini!!! </div>');
                    redirect('laporan/ubahPassword');
                } else {
                    //password ok
                    $password_hash = password_hash($pwd_baru, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->transaksidata('email'));
                    $this->db->update('transaksi');

                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Password Berhasil diubah</div>');
                    redirect('laporan/ubahPassword');
                }
            }
        }
    }
}
