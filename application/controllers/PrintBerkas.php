<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PrintBerkas extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     cek_login();
    // }

    public function index()
    {
        // $data['tes'] = 'tes';
        // $this->load->library('pdf');
	    // $this->pdf->setPaper('A4', 'landscape');
	    // $this->pdf->filename = "Laporan-Dompdf-Codeigniter.pdf";
	    // $this->pdf->load_view('v_tampil_pdf', $data);
        // $id_user = $this->session->userdata('id_user');
        // $data['user'] = $this->session->userdata('nama');
        $data['judul'] = "Cetak Bukti Booking";
        // $data['useraktif'] = $this->ModelUser->cekData(['id' => $this->session->userdata('id_user')])->result();
        $sroot = $_SERVER['DOCUMENT_ROOT']; 
        require_once($sroot."/kuliah/pembayaran_sekolah/application/third_party/dompdf-2/autoload.inc.php"); 
        // require_once($sroot."/kuliah/pembayaran_sekolah/application/third_party/dompdf/dompdf_config.inc.php"); 
        $dompdf = new Dompdf\Dompdf();
        // $this->load->view('v_tampil_pdf');
        $html
        
        $paper_size = 'A4'; // ukuran kertas
        $orientation = 'landscape'; //tipe format kertas potrait atau landscape $html = $this->output->get_output();
        $dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $dompdf->load_html($html);
        $dompdf->render();
        // ob_end_clean();
        $dompdf->stream("bukti-booking-.pdf", array('Attachment' => 0)); // nama file pdf yang di hasilkan
        
    }
    
}
