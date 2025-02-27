<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda_model extends CI_Model
{

    public function get_berita_hari_ini()
    {
        return $this->db->query("SELECT COUNT(*) AS total FROM tb_berita WHERE DATE(tgl_berita) = CURDATE()")->row()->total;
    }

    public function get_berita_bulan_ini()
    {
        return $this->db->query("SELECT COUNT(*) AS total FROM tb_berita WHERE MONTH(tgl_berita) = MONTH(CURDATE()) AND YEAR(tgl_berita) = YEAR(CURDATE())")->row()->total;
    }

    public function get_berita_tahun_ini()
    {
        return $this->db->query("SELECT COUNT(*) AS total FROM tb_berita WHERE YEAR(tgl_berita) = YEAR(CURDATE())")->row()->total;
    }

    public function get_semua_berita()
    {
        return $this->db->count_all('tb_berita');
    }

    //pengunjung
    public function get_pengunjung_hari_ini()
    {
        return $this->db->query("SELECT COUNT(*) AS total FROM visits WHERE DATE(visit_time) = CURDATE()")->row()->total;
    }

    public function get_pengunjung_bulan_ini()
    {
        return $this->db->query("SELECT COUNT(*) AS total FROM visits WHERE MONTH(visit_time) = MONTH(CURDATE()) AND YEAR(visit_time) = YEAR(CURDATE()) ")->row()->total;
    }

    public function get_pengunjung_tahun_ini()
    {
        return $this->db->query("SELECT COUNT(*) AS total FROM visits WHERE YEAR(visit_time) = YEAR(CURDATE())")->row()->total;
    }
    public function get_semua_pengunjung()
    {
        return $this->db->count_all('visits');
    }
    //end pengunjung

}