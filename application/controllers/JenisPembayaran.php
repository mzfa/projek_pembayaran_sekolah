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
}
