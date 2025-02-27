<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita_model extends CI_Model
{
    public function get_kategori() {
        $this->db->select("id_kat_master, nm_kategori_master");
        $this->db->from("tb_kategori_master");
        $query = $this->db->get();
        return $query->result_array();
    }
    
}