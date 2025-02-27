<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BeritaController extends CI_Controller
{

	public function index()
	{
		$data['title'] = "Berita";
		$data['populer'] = $this->_populer();
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama,a.jam,c.nm_kategori_master,c.url');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->join('tb_kategori_master c ', 'a.id_kategori = c.id_kat_master');
		$this->db->where('a.aktif', "Y");
		$this->db->where('a.status', 1);
		$id_kategori_master = array(2, 3, 4);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
			$this->db->where('a.aktif', "Y");
			$this->db->where('a.status', 1);
		}

		$this->db->order_by('a.tgl_berita', 'desc');

		$isal = $this->db->get()->result_array();

		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 100);
		}
		$data['berita'] = $isal;
		$this->load->view('frontend/listberita', $data);
	}
	public function get_berita_internasional()
	{
		$page = $this->input->get('page') ? (int) $this->input->get('page') : 1;
		$per_page = 5;
		$offset = ($page - 1) * $per_page;
		$api_url = "https://newsapi.org/v2/everything?q=indonesia&language=id&sortBy=publishedAt&apiKey=07665009240e481fb1b460894950fd4d";
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, ['User-Agent: MyNewsApp']);
		$response = curl_exec($ch);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		if ($http_code !== 200) {
			echo json_encode(['error' => "Gagal mengambil data dari API"]);
			exit();
		}
		$berita = json_decode($response, true);
		$berita['articles'] = array_values(array_filter($berita['articles'], function ($article) {
			return $article['source']['name'] !== 'Pypi.org';
		}));
		$total_data = count($berita['articles']);
		$total_pages = ceil($total_data / $per_page);
		$data_paginated = array_slice($berita['articles'], $offset, $per_page);

		header('Content-Type: application/json');
		echo json_encode([
			'articles' => $data_paginated,
			'total_pages' => $total_pages,
			'current_page' => $page
		]);
	}
	public function internasional()
	{
		$data['title'] = "Internasional";
		$data['populer'] = $this->_populer();
		$this->load->view('frontend/listberita_internasional', $data);
	}
	public function nasional()
	{
		$data['title'] = "Nasional";
		$data['populer'] = $this->_populer();
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama,a.jam,c.nm_kategori_master,c.url');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->join('tb_kategori_master c ', 'a.id_kategori = c.id_kat_master');
		$this->db->where('a.aktif', "Y");
		$this->db->where('a.status', 1);

		$id_kategori_master = array(22);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);

		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
			$this->db->where('a.aktif', "Y");
			$this->db->where('a.status', 1);
		}
		$this->db->order_by('a.tgl_berita', 'desc');
		$isal = $this->db->get()->result_array();

		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 100);
		}

		$data['berita'] = $isal;

		$this->load->view('frontend/listberita', $data);
	}
	public function hukum()
	{
		$data['title'] = "Hukum";
		$data['populer'] = $this->_populer();
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama,a.jam,c.nm_kategori_master,c.url');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->join('tb_kategori_master c ', 'a.id_kategori = c.id_kat_master');
		$this->db->where('a.aktif', "Y");
		$this->db->where('a.status', 1);

		$id_kategori_master = array(2);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);

		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
			$this->db->where('a.aktif', "Y");
			$this->db->where('a.status', 1);
		}
		$this->db->order_by('a.tgl_berita', 'desc');
		$isal = $this->db->get()->result_array();

		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 100);
		}

		$data['berita'] = $isal;

		$this->load->view('frontend/listberita', $data);
	}
	public function politik()
	{
		$data['title'] = "Politik";
		$data['populer'] = $this->_populer();
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama,a.jam,c.nm_kategori_master,c.url');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->join('tb_kategori_master c ', 'a.id_kategori = c.id_kat_master');
		$this->db->where('a.aktif', "Y");
		$this->db->where('a.status', 1);

		$id_kategori_master = array(3);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);

		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
			$this->db->where('a.aktif', "Y");
			$this->db->where('a.status', 1);
		}

		$this->db->order_by('a.tgl_berita', 'desc');
		$isal = $this->db->get()->result_array();

		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 100);
		}

		$data['berita'] = $isal;

		$this->load->view('frontend/listberita', $data);
	}

	public function pemerintahan()
	{
		$data['title'] = "Pemerintahan";
		$data['populer'] = $this->_populer();
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama,a.jam,c.nm_kategori_master,c.url');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->join('tb_kategori_master c ', 'a.id_kategori = c.id_kat_master');
		$this->db->where('a.aktif', "Y");
		$this->db->where('a.status', 1);


		$id_kategori_master = array(4);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
			$this->db->where('a.aktif', "Y");
			$this->db->where('a.status', 1);
		}
		$this->db->order_by('a.tgl_berita', 'desc');
		$isal = $this->db->get()->result_array();

		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 100);
		}

		$data['berita'] = $isal;

		$this->load->view('frontend/listberita', $data);
	}
	public function daerah()
	{
		$data['title'] = "Daerah";
		$data['populer'] = $this->_populer();
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama,a.jam,c.nm_kategori_master,c.url');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->join('tb_kategori_master c ', 'a.id_kategori = c.id_kat_master');
		$this->db->where('a.aktif', "Y");
		$this->db->where('a.status', 1);

		$id_kategori_master = array(5, 6, 7, 8, 9, 10,24,25,26);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
			$this->db->where('a.aktif', "Y");
			$this->db->where('a.status', 1);
		}
		$this->db->order_by('a.tgl_berita', 'desc');
		$isal = $this->db->get()->result_array();

		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 100);
		}

		$data['berita'] = $isal;

		$this->load->view('frontend/listberita', $data);
	}
	public function sulawesi_utara()
	{
		$data['title'] = "Sulawesi Utara";
		$data['populer'] = $this->_populer();
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama,a.jam,c.nm_kategori_master,c.url');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->join('tb_kategori_master c ', 'a.id_kategori = c.id_kat_master');
		$this->db->where('a.aktif', "Y");
		$this->db->where('a.status', 1);


		$id_kategori_master = array(5, 6, 7,25,26);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
			$this->db->where('a.aktif', "Y");
			$this->db->where('a.status', 1);
		}
		$this->db->order_by('a.tgl_berita', 'desc');

		$isal = $this->db->get()->result_array();

		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 100);
		}

		$data['berita'] = $isal;

		$this->load->view('frontend/listberita', $data);
	}
	public function bolmut()
	{
		$data['title'] = "Bolaang Mongondow Utara";
		$data['populer'] = $this->_populer();
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama,a.jam,c.nm_kategori_master,c.url');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->join('tb_kategori_master c ', 'a.id_kategori = c.id_kat_master');
		$this->db->where('a.aktif', "Y");
		$this->db->where('a.status', 1);


		$id_kategori_master = array(5);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
			$this->db->where('a.aktif', "Y");
			$this->db->where('a.status', 1);
		}
		$this->db->order_by('a.tgl_berita', 'desc');
		$isal = $this->db->get()->result_array();

		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 100);
		}

		$data['berita'] = $isal;

		$this->load->view('frontend/listberita', $data);
	}
	public function manado()
	{
		$data['title'] = "Manado";
		$data['populer'] = $this->_populer();
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama,a.jam,c.nm_kategori_master,c.url');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->join('tb_kategori_master c ', 'a.id_kategori = c.id_kat_master');
		$this->db->where('a.aktif', "Y");
		$this->db->where('a.status', 1);


		$id_kategori_master = array(26);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
			$this->db->where('a.aktif', "Y");
			$this->db->where('a.status', 1);
		}
		$this->db->order_by('a.tgl_berita', 'desc');
		$isal = $this->db->get()->result_array();

		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 100);
		}

		$data['berita'] = $isal;

		$this->load->view('frontend/listberita', $data);
	}
	public function bolsel()
	{
		$data['title'] = "Bolaang Mongondow Selatan";
		$data['populer'] = $this->_populer();
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama,a.jam,c.nm_kategori_master,c.url');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->join('tb_kategori_master c ', 'a.id_kategori = c.id_kat_master');
		$this->db->where('a.aktif', "Y");
		$this->db->where('a.status', 1);


		$id_kategori_master = array(6);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
			$this->db->where('a.aktif', "Y");
			$this->db->where('a.status', 1);
		}
		$this->db->order_by('a.tgl_berita', 'desc');
		$isal = $this->db->get()->result_array();

		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 100);
		}

		$data['berita'] = $isal;

		$this->load->view('frontend/listberita', $data);
	}
	public function boltim()
	{
		$data['title'] = "Bolaang Mongondow Timur";
		$data['populer'] = $this->_populer();
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama,a.jam,c.nm_kategori_master,c.url');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->join('tb_kategori_master c ', 'a.id_kategori = c.id_kat_master');
		$this->db->where('a.aktif', "Y");
		$this->db->where('a.status', 1);


		$id_kategori_master = array(7);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
			$this->db->where('a.aktif', "Y");
			$this->db->where('a.status', 1);
		}
		$this->db->order_by('a.tgl_berita', 'desc');
		$isal = $this->db->get()->result_array();

		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 100);
		}

		$data['berita'] = $isal;

		$this->load->view('frontend/listberita', $data);
	}
	public function kotamobagu()
	{
		$data['title'] = "Kotamobagu";
		$data['populer'] = $this->_populer();
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama,a.jam,c.nm_kategori_master,c.url');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->join('tb_kategori_master c ', 'a.id_kategori = c.id_kat_master');
		$this->db->where('a.aktif', "Y");
		$this->db->where('a.status', 1);


		$id_kategori_master = array(25);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
			$this->db->where('a.aktif', "Y");
			$this->db->where('a.status', 1);
		}
		$this->db->order_by('a.tgl_berita', 'desc');
		$isal = $this->db->get()->result_array();

		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 100);
		}

		$data['berita'] = $isal;

		$this->load->view('frontend/listberita', $data);
	}
	
	public function gorontalo()
	{
		$data['title'] = "Gorontalo";
		$data['populer'] = $this->_populer();
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama,a.jam,c.nm_kategori_master,c.url');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->join('tb_kategori_master c ', 'a.id_kategori = c.id_kat_master');
		$this->db->where('a.aktif', "Y");
		$this->db->where('a.status', 1);


		$id_kategori_master = array(8, 9, 10, 24);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
			$this->db->where('a.aktif', "Y");
			$this->db->where('a.status', 1);
		}
		$this->db->order_by('a.tgl_berita', 'desc');
		$isal = $this->db->get()->result_array();

		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 100);
		}

		$data['berita'] = $isal;

		$this->load->view('frontend/listberita', $data);
	}
	public function kota_gorontalo()
	{
		$data['title'] = "Kota Gorontalo";
		$data['populer'] = $this->_populer();
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama,a.jam,c.nm_kategori_master,c.url');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->join('tb_kategori_master c ', 'a.id_kategori = c.id_kat_master');
		$this->db->where('a.aktif', "Y");
		$this->db->where('a.status', 1);


		$id_kategori_master = array(8);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
			$this->db->where('a.aktif', "Y");
			$this->db->where('a.status', 1);
		}
		$this->db->order_by('a.tgl_berita', 'desc');
		$isal = $this->db->get()->result_array();

		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 100);
		}

		$data['berita'] = $isal;

		$this->load->view('frontend/listberita', $data);
	}
	public function kabupaten_gorontalo()
	{
		$data['title'] = "Kabupaten Gorontalo";
		$data['populer'] = $this->_populer();
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama,a.jam,c.nm_kategori_master,c.url');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->join('tb_kategori_master c ', 'a.id_kategori = c.id_kat_master');
		$this->db->where('a.aktif', "Y");
		$this->db->where('a.status', 1);


		$id_kategori_master = array(9);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
			$this->db->where('a.aktif', "Y");
			$this->db->where('a.status', 1);
		}
		$this->db->order_by('a.tgl_berita', 'desc');
		$isal = $this->db->get()->result_array();

		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 100);
		}

		$data['berita'] = $isal;

		$this->load->view('frontend/listberita', $data);
	}
	public function gorontalo_utara()
	{
		$data['title'] = "Gorontalo Utara";
		$data['populer'] = $this->_populer();
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama,a.jam,c.nm_kategori_master,c.url');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->join('tb_kategori_master c ', 'a.id_kategori = c.id_kat_master');
		$this->db->where('a.aktif', "Y");
		$this->db->where('a.status', 1);


		$id_kategori_master = array(10);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
			$this->db->where('a.aktif', "Y");
			$this->db->where('a.status', 1);
		}
		$this->db->order_by('a.tgl_berita', 'desc');
		$isal = $this->db->get()->result_array();

		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 100);
		}
		$data['berita'] = $isal;
		$this->load->view('frontend/listberita', $data);
	}

	public function ragam()
	{
		$data['title'] = "Ragam";
		$data['populer'] = $this->_populer();
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama,a.jam,c.nm_kategori_master,c.url');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->join('tb_kategori_master c ', 'a.id_kategori = c.id_kat_master');
		$this->db->where('a.aktif', "Y");
		$this->db->where('a.status', 1);

		$id_kategori_master = array(11, 12, 13, 14, 15, 16, 18, 19, 20, 21);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);

		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
			$this->db->where('a.aktif', "Y");
			$this->db->where('a.status', 1);
		}

		$this->db->order_by('a.tgl_berita', 'desc');


		$isal = $this->db->get()->result_array();
		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 100);
		}
		$data['berita'] = $isal;
		$this->load->view('frontend/listberita', $data);
	}
	public function budaya()
	{
		$data['title'] = "Budaya";
		$data['populer'] = $this->_populer();
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama,a.jam,c.nm_kategori_master,c.url');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->join('tb_kategori_master c ', 'a.id_kategori = c.id_kat_master');
		$this->db->where('a.aktif', "Y");
		$this->db->where('a.status', 1);


		$id_kategori_master = array(11);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
			$this->db->where('a.aktif', "Y");
			$this->db->where('a.status', 1);
		}
		$this->db->order_by('a.tgl_berita', 'desc');
		$isal = $this->db->get()->result_array();

		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 100);
		}

		$data['berita'] = $isal;

		$this->load->view('frontend/listberita', $data);
	}
	public function seni()
	{
		$data['title'] = "Seni";
		$data['populer'] = $this->_populer();
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama,a.jam,c.nm_kategori_master,c.url');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->join('tb_kategori_master c ', 'a.id_kategori = c.id_kat_master');
		$this->db->where('a.aktif', "Y");
		$this->db->where('a.status', 1);


		$id_kategori_master = array(12);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
			$this->db->where('a.aktif', "Y");
			$this->db->where('a.status', 1);
		}
		$this->db->order_by('a.tgl_berita', 'desc');
		$isal = $this->db->get()->result_array();

		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 100);
		}

		$data['berita'] = $isal;

		$this->load->view('frontend/listberita', $data);
	}
	public function keanekaragaman_hayati()
	{
		$data['title'] = "Keanekaragaman Hayati";
		$data['populer'] = $this->_populer();
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama,a.jam,c.nm_kategori_master,c.url');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->join('tb_kategori_master c ', 'a.id_kategori = c.id_kat_master');
		$this->db->where('a.aktif', "Y");
		$this->db->where('a.status', 1);


		$id_kategori_master = array(13);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
			$this->db->where('a.aktif', "Y");
			$this->db->where('a.status', 1);
		}
		$this->db->order_by('a.tgl_berita', 'desc');
		$isal = $this->db->get()->result_array();

		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 100);
		}

		$data['berita'] = $isal;

		$this->load->view('frontend/listberita', $data);
	}
	public function pariwisata()
	{
		$data['title'] = "Pariwisata";
		$data['populer'] = $this->_populer();
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama,a.jam,c.nm_kategori_master,c.url');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->join('tb_kategori_master c ', 'a.id_kategori = c.id_kat_master');
		$this->db->where('a.aktif', "Y");
		$this->db->where('a.status', 1);


		$id_kategori_master = array(14);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
			$this->db->where('a.aktif', "Y");
			$this->db->where('a.status', 1);
		}
		$this->db->order_by('a.tgl_berita', 'desc');
		$isal = $this->db->get()->result_array();

		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 100);
		}

		$data['berita'] = $isal;

		$this->load->view('frontend/listberita', $data);
	}
	public function komoditas()
	{
		$data['title'] = "Komoditas";
		$data['populer'] = $this->_populer();
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama,a.jam,c.nm_kategori_master,c.url');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->join('tb_kategori_master c ', 'a.id_kategori = c.id_kat_master');
		$this->db->where('a.aktif', "Y");
		$this->db->where('a.status', 1);


		$id_kategori_master = array(15);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
			$this->db->where('a.aktif', "Y");
			$this->db->where('a.status', 1);
		}
		$this->db->order_by('a.tgl_berita', 'desc');
		$isal = $this->db->get()->result_array();

		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 100);
		}

		$data['berita'] = $isal;

		$this->load->view('frontend/listberita', $data);
	}
	public function kuliner()
	{
		$data['title'] = "Kuliner";
		$data['populer'] = $this->_populer();
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama,a.jam,c.nm_kategori_master,c.url');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->join('tb_kategori_master c ', 'a.id_kategori = c.id_kat_master');
		$this->db->where('a.aktif', "Y");
		$this->db->where('a.status', 1);


		$id_kategori_master = array(16);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
			$this->db->where('a.aktif', "Y");
			$this->db->where('a.status', 1);
		}
		$this->db->order_by('a.tgl_berita', 'desc');
		$isal = $this->db->get()->result_array();

		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 100);
		}

		$data['berita'] = $isal;

		$this->load->view('frontend/listberita', $data);
	}
	public function lingkungan()
	{
		$data['title'] = "Lingkungan";
		$data['populer'] = $this->_populer();
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama,a.jam,c.nm_kategori_master,c.url');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->join('tb_kategori_master c ', 'a.id_kategori = c.id_kat_master');
		$this->db->where('a.aktif', "Y");
		$this->db->where('a.status', 1);


		$id_kategori_master = array(18);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
			$this->db->where('a.aktif', "Y");
			$this->db->where('a.status', 1);
		}
		$this->db->order_by('a.tgl_berita', 'desc');
		$isal = $this->db->get()->result_array();

		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 100);
		}

		$data['berita'] = $isal;

		$this->load->view('frontend/listberita', $data);
	}
	public function kesehatan()
	{
		$data['title'] = "Kesehatan";
		$data['populer'] = $this->_populer();
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama,a.jam,c.nm_kategori_master,c.url');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->join('tb_kategori_master c ', 'a.id_kategori = c.id_kat_master');
		$this->db->where('a.aktif', "Y");
		$this->db->where('a.status', 1);

		$id_kategori_master = array(19);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
			$this->db->where('a.aktif', "Y");
			$this->db->where('a.status', 1);
		}
		$this->db->order_by('a.tgl_berita', 'desc');
		$isal = $this->db->get()->result_array();

		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 100);
		}

		$data['berita'] = $isal;

		$this->load->view('frontend/listberita', $data);
	}
	public function religi()
	{
		$data['title'] = "Religi";
		$data['populer'] = $this->_populer();
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama,a.jam,c.nm_kategori_master,c.url');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->join('tb_kategori_master c ', 'a.id_kategori = c.id_kat_master');
		$this->db->where('a.aktif', "Y");
		$this->db->where('a.status', 1);


		$id_kategori_master = array(21);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
			$this->db->where('a.aktif', "Y");
			$this->db->where('a.status', 1);
		}
		$this->db->order_by('a.tgl_berita', 'desc');
		$isal = $this->db->get()->result_array();

		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 100);
		}

		$data['berita'] = $isal;

		$this->load->view('frontend/listberita', $data);
	}
	public function olahraga()
	{
		$data['title'] = "Olahraga";
		$data['populer'] = $this->_populer();
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama,a.jam,c.nm_kategori_master,c.url');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->join('tb_kategori_master c ', 'a.id_kategori = c.id_kat_master');
		$this->db->where('a.aktif', "Y");
		$this->db->where('a.status', 1);

		$id_kategori_master = array(20);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
			$this->db->where('a.aktif', "Y");
			$this->db->where('a.status', 1);
		}
		$this->db->order_by('a.tgl_berita', 'desc');
		$isal = $this->db->get()->result_array();

		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 100);
		}

		$data['berita'] = $isal;

		$this->load->view('frontend/listberita', $data);
	}
	public function infografis()
	{
		$data['title'] = "Infografis";
		$data['populer'] = $this->_populer();
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama,a.jam,c.nm_kategori_master,c.url');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->join('tb_kategori_master c ', 'a.id_kategori = c.id_kat_master');
		$this->db->where('a.aktif', "Y");
		$this->db->where('a.status', 1);
		$this->db->where('a.status', '1');
		$id_kategori_master = array(17);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
			$this->db->where('a.aktif', "Y");
			$this->db->where('a.status', 1);
		}
		$this->db->order_by('a.tgl_berita', 'desc');
		$isal = $this->db->get()->result_array();

		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 100);
		}

		$data['berita'] = $isal;

		$this->load->view('frontend/listberita', $data);
	}

	private function ambil_kata($string, $start, $end)
	{
		$kata = explode(' ', $string);
		$potongan_kata = array_slice($kata, $start, $end - $start + 1);
		return implode(' ', $potongan_kata);
	}

	public function detail($tgl_buat, $sub_judul)
	{
		$data['populer'] = $this->_populer();
		$sub_judul = urldecode($sub_judul);

		$this->db->select('a.id_berita, a.judul, a.tgl_berita, a.sub_judul, a.gambar, a.isi_berita, b.nama, a.keterangan_gambar, a.tag, a.jam, a.id_kategori,a.dibaca');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->where('a.aktif', "Y");
		$this->db->where('a.tgl_berita', $tgl_buat);
		$this->db->where('a.sub_judul', $sub_judul);
		$data['berita_detail'] = $this->db->get()->row_array();

		if (isset($data['berita_detail']['judul'])) {
			$data['title'] = $data['berita_detail']['judul'];
			$id_berita = $data['berita_detail']['id_berita'];
			$id_kategori = $data['berita_detail']['id_kategori'];

			$this->db->set('dibaca', 'dibaca+1', FALSE);
			$this->db->where('id_berita', $id_berita);
			$this->db->update('tb_berita');

			// Dapatkan berita sebelumnya
			$this->db->select("IF(LENGTH(judul) > 35, CONCAT(LEFT(judul, 35), '...'), judul) AS judul, id_berita, tgl_berita, sub_judul");
			$this->db->from('tb_berita');
			$this->db->where('id_berita <', $id_berita);
			$this->db->where('aktif', 'Y');
			$this->db->where('status', '1');
			$this->db->order_by('id_berita', 'DESC');
			$this->db->limit(1);
			$data['previous_news'] = $this->db->get()->row_array();

			// Dapatkan berita selanjutnya
			$this->db->select("IF(LENGTH(judul) > 35, CONCAT(LEFT(judul, 35), '...'), judul) AS judul, id_berita, tgl_berita, sub_judul");
			$this->db->from('tb_berita');
			$this->db->where('id_berita >', $id_berita);
			$this->db->where('aktif', 'Y');
			$this->db->where('status', '1');
			$this->db->order_by('id_berita', 'ASC');
			$this->db->limit(1);
			$data['next_news'] = $this->db->get()->row_array();

			// Dapatkan berita terkait berdasarkan id_kategori
			$this->db->select("id_berita, IF(LENGTH(judul) > 35, CONCAT(LEFT(judul, 35), '...'), judul) AS judul, tgl_berita, sub_judul, gambar");
			$this->db->from('tb_berita');
			$this->db->where('id_kategori', $id_kategori);
			$this->db->where('id_berita !=', $id_berita); // Tidak termasuk berita saat ini
			$this->db->where('aktif', 'Y');
			$this->db->where('status', '1');
			$this->db->order_by('id_berita', 'DESC');
			$this->db->limit(3);
			$data['related_news'] = $this->db->get()->result_array();
		} else {
			$data['title'] = "Berita tidak ditemukan";
		}

		$this->load->view('frontend/detailberita', $data);
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