<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class PembayaranModel extends CI_Model
{
    public function getAllBank()
    {
        return $this->db->get('daftar_bank')->result_array();
    }

    public function getAllEwallet()
    {
        return $this->db->get('daftar_ewallet')->result_array();
    }
}