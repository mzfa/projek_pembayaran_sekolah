<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelSiswa extends CI_Model
{
    public function simpanData($data = null)
    {
        $this->db->insert('siswa', $data);
    }
    public function updateData($data, $where)
    {
        $this->db->update('siswa', $data, $where);
    }
    public function all()
    {
        return $this->db->get('siswa');
    }
    
    public function cekData($where = null)
    {
        return $this->db->get_where('siswa', $where);
    }

    public function getWhere($where = null)
    {
        return $this->db->get_where('siswa', $where);
    }


}
