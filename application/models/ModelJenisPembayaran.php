<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelJenisPembayaran extends CI_Model
{
    public function simpanData($data = null)
    {
        $this->db->insert('jenis_pembayaran', $data);
    }
    public function updateData($data, $where)
    {
        $this->db->update('jenis_pembayaran', $data, $where);
    }
    public function all()
    {
        return $this->db->get('jenis_pembayaran');
    }
    
    public function cekData($where = null)
    {
        return $this->db->get_where('jenis_pembayaran', $where);
    }

    public function getWhere($where = null)
    {
        return $this->db->get_where('jenis_pembayaran', $where);
    }


}
