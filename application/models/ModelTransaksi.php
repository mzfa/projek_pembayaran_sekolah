<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelTransaksi extends CI_Model
{
    public function simpanData($data = null)
    {
        $this->db->insert('transaksi', $data);
    }
    public function updateData($data, $where)
    {
        $this->db->update('transaksi', $data, $where);
    }
    public function all()
    {
        return $this->db->get('transaksi');
    }
    
    public function cekData($where = null)
    {
        return $this->db->get_where('transaksi', $where);
    }

    public function getWhere($where = null)
    {
        return $this->db->get_where('transaksi', $where);
    }


}
