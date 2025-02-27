<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FooterController extends CI_Controller
{

	public function tentang_kami()
	{
        $data['title'] = 'Tentang Kami';
         $data['populer'] = $this->_populer();
		$data['tentang'] = $this->db->get('tb_about')->row_array();
		$this->load->view('frontend/tentang_kami',$data);
	}

    public function redaksi()
    {
        $data['title'] = 'Redaksi';
        $data['populer'] = $this->_populer();
        $data['redaksi'] = $this->db->get('tb_redaksi')->row_array();
        $this->load->view('frontend/redaksi',$data);
    }
    public function kontak()
    {
        $data['title'] = 'Kontak';
        $data['populer'] = $this->_populer();
        $data['kontak'] = $this->db->get('tb_kontak')->row_array();
        $this->load->view('frontend/kontak',$data);
    }
    public function pedoman_pemberitaan()
    {
        $data['title'] = 'Pedoman Pemberitaan';
        $data['populer'] = $this->_populer();
        $data['pedoman'] = $this->db->get('tb_pedoman')->row_array();
        $this->load->view('frontend/pedoman_pemberitaan',$data);
    }
    public function privacy()
    {
        $data['title'] = 'Privacy';
        $data['populer'] = $this->_populer();
        $data['privacy'] = $this->db->get('tb_privacy')->row_array();
        $this->load->view('frontend/privacy',$data);
    }
    
     public function _populer()
    {
        $this->db->select("IF(LENGTH(a.judul) > 80, CONCAT(LEFT(a.judul, 80), '...'), a.judul) AS judul, a.sub_judul, a.tgl_berita, a.gambar,b.nm_kategori_master,c.nama,b.url");
        $this->db->from("tb_berita a");
        $this->db->join('tb_kategori_master b', 'b.id_kat_master = a.id_kategori');
        $this->db->join('user c', 'c.id_user = a.id_user');
        $this->db->order_by('a.dibaca', 'DESC');
		$this->db->where('a.status', '1');
        $this->db->limit(10);
        $query = $this->db->get();
        $results = $query->result_array();
        return $results;
    }
}