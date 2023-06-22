<?php
class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $awal = date('Y-m-d'). ' 00:01:00';
        $akhir = date('Y-m-d'). ' 23:59:00';
        $periode = '%'.date('Y-m').'%';
        $data['hari_ini'] = $this->db->query("SELECT sum(total_bayar) as total FROM transaksi WHERE tanggal_transaksi BETWEEN '$awal' AND '$akhir'")->result_array();
        $data['bulan_ini'] = $this->db->query("SELECT sum(total_bayar) as total FROM transaksi WHERE tanggal_transaksi LIKE '$periode'")->result_array();
        $data['user'] = $this->db->query("SELECT count(nama) as total FROM user")->result_array();
        $data['siswa'] = $this->db->query("SELECT count(nama_siswa) as total FROM siswa")->result_array();

        
    // var_dump($hari_ini);
    // die();
        $this->load->view('layouts/header');
        $this->load->view('home',$data);
        $this->load->view('layouts/footer');
    }

}
