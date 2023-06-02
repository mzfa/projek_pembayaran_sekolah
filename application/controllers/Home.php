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
        
    // var_dump($this->session->userdata('nama'));
    // die();
        $this->load->view('layouts/header');
        $this->load->view('home');
        $this->load->view('layouts/footer');
    }

}
