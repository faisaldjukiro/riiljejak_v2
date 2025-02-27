<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->output->set_content_type('application/json');
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST");
        header("Access-Control-Allow-Headers: Content-Type");
    }
    private function isValidApiKey($apiKey)
    {
        $this->db->where('key', $apiKey);
        $query = $this->db->get('api_keys');
        return $query->num_rows() > 0;
    }
    public function internasional()
    {
        $titile = 'Internasional';
        try {
            $apiKey = $this->input->get_request_header('API-Key', TRUE);

            if (empty($apiKey) || !$this->isValidApiKey($apiKey)) {
                $response = array(
                    'status' => false,
                    'message' => 'Key API tidak valid',
                    'data' => null
                );
                $this->output->set_status_header(401);
                $this->output->set_output(json_encode($response));
                return;
            }
            $this->db->select('a.id_berita,b.nm_kategori_master, a.tgl_berita, a.judul, a.gambar, a.dibaca');
            $this->db->from('tb_berita a');
            $this->db->join('tb_kategori_master b', 'a.id_kategori = b.id_kat_master');
            $this->db->order_by('a.tgl_berita', 'DESC');
            $this->db->where('a.id_kategori', '1');
            $query = $this->db->get()->result_array();

            if ($query) {
                foreach ($query as &$item) {
                    if (!empty($item['gambar'])) {
                        $item['tgl_berita'] = date('d F Y', strtotime($item['tgl_berita']));
                        $item['gambar'] = base_url('img/berita/' . $item['gambar']);
                    }
                }
                $response = array(
                    'status' => true,
                    'message' => 'success',
                    'data' => $query
                );
            } else {
                $response = array(
                    'status' => true,
                    'message' => 'Berita ' . $titile . ' Tidak ditemukan!',
                    'data' => []
                );
            }
        } catch (Exception $e) {

            $response = array(
                'status' => false,
                'message' => 'Internal Server Error: ' . $e->getMessage(),
                'data' => null
            );
            $this->output->set_status_header(500);
        }

        $this->output->set_output(json_encode($response));
    }

    public function nasional()
    {
        $titile = 'Nasional';
        try {
            $apiKey = $this->input->get_request_header('API-Key', TRUE);

            if (empty($apiKey) || !$this->isValidApiKey($apiKey)) {
                $response = array(
                    'status' => false,
                    'message' => 'Key API tidak valid',
                    'data' => null
                );
                $this->output->set_status_header(401);
                $this->output->set_output(json_encode($response));
                return;
            }
            $this->db->select('a.id_berita,b.nm_kategori_master, a.tgl_berita, a.judul, a.gambar, a.dibaca');
            $this->db->from('tb_berita a');
            $this->db->join('tb_kategori_master b', 'a.id_kategori = b.id_kat_master');
            $this->db->order_by('a.tgl_berita', 'DESC');
            $this->db->where('a.id_kategori', '22');
            $query = $this->db->get()->result_array();

            if ($query) {
                foreach ($query as &$item) {
                    if (!empty($item['gambar'])) {
                        $item['tgl_berita'] = date('d F Y', strtotime($item['tgl_berita']));
                        $item['gambar'] = base_url('img/berita/' . $item['gambar']);
                    }
                }
                $response = array(
                    'status' => true,
                    'message' => 'success',
                    'data' => $query
                );
            } else {
                $response = array(
                    'status' => true,
                    'message' => 'Berita ' . $titile . ' Tidak ditemukan!',
                    'data' => []
                );
            }
        } catch (Exception $e) {

            $response = array(
                'status' => false,
                'message' => 'Internal Server Error: ' . $e->getMessage(),
                'data' => null
            );
            $this->output->set_status_header(500);
        }

        $this->output->set_output(json_encode($response));
    }
    public function daerah()
    {
        $titile = 'Derah';
        try {
            $apiKey = $this->input->get_request_header('API-Key', TRUE);

            if (empty($apiKey) || !$this->isValidApiKey($apiKey)) {
                $response = array(
                    'status' => false,
                    'message' => 'Key API tidak valid',
                    'data' => null
                );
                $this->output->set_status_header(401);
                $this->output->set_output(json_encode($response));
                return;
            }
            $this->db->select('a.id_berita,b.nm_kategori_master, a.tgl_berita, a.judul, a.gambar, a.dibaca');
            $this->db->from('tb_berita a');
            $this->db->join('tb_kategori_master b', 'a.id_kategori = b.id_kategori');
            $this->db->order_by('a.tgl_berita', 'DESC');
            $this->db->where('b.id_kategori', '3');
            $this->db->group_by('a.id_berita');
            $query = $this->db->get()->result_array();

            if ($query) {
                foreach ($query as &$item) {
                    if (!empty($item['gambar'])) {
                        $item['tgl_berita'] = date('d F Y', strtotime($item['tgl_berita']));
                        $item['gambar'] = base_url('img/berita/' . $item['gambar']);
                    }
                }
                $response = array(
                    'status' => true,
                    'message' => 'success',
                    'data' => $query
                );
            } else {
                $response = array(
                    'status' => true,
                    'message' => 'Berita ' . $titile . ' Tidak ditemukan!',
                    'data' => []
                );
            }
        } catch (Exception $e) {

            $response = array(
                'status' => false,
                'message' => 'Internal Server Error: ' . $e->getMessage(),
                'data' => null
            );
            $this->output->set_status_header(500);
        }

        $this->output->set_output(json_encode($response));
    }
    public function hukum()
    {
        $titile = 'Hukum';
        try {
            $apiKey = $this->input->get_request_header('API-Key', TRUE);

            if (empty($apiKey) || !$this->isValidApiKey($apiKey)) {
                $response = array(
                    'status' => false,
                    'message' => 'Key API tidak valid',
                    'data' => null
                );
                $this->output->set_status_header(401);
                $this->output->set_output(json_encode($response));
                return;
            }
            $this->db->select('a.id_berita,b.nm_kategori_master, a.tgl_berita, a.judul, a.gambar, a.dibaca');
            $this->db->from('tb_berita a');
            $this->db->join('tb_kategori_master b', 'a.id_kategori = b.id_kat_master');
            $this->db->order_by('a.tgl_berita', 'DESC');
            $this->db->where('a.id_kategori', '2');
            $query = $this->db->get()->result_array();

            if ($query) {
                foreach ($query as &$item) {
                    if (!empty($item['gambar'])) {
                        $item['tgl_berita'] = date('d F Y', strtotime($item['tgl_berita']));
                        $item['gambar'] = base_url('img/berita/' . $item['gambar']);
                    }
                }
                $response = array(
                    'status' => true,
                    'message' => 'success',
                    'data' => $query
                );
            } else {
                $response = array(
                    'status' => true,
                    'message' => 'Berita ' . $titile . ' Tidak ditemukan!',
                    'data' => []
                );
            }
        } catch (Exception $e) {

            $response = array(
                'status' => false,
                'message' => 'Internal Server Error: ' . $e->getMessage(),
                'data' => null
            );
            $this->output->set_status_header(500);
        }

        $this->output->set_output(json_encode($response));
    }
    public function pemerintahan()
    {
        $titile = 'Pemerintahan';
        try {
            $apiKey = $this->input->get_request_header('API-Key', TRUE);

            if (empty($apiKey) || !$this->isValidApiKey($apiKey)) {
                $response = array(
                    'status' => false,
                    'message' => 'Key API tidak valid',
                    'data' => null
                );
                $this->output->set_status_header(401);
                $this->output->set_output(json_encode($response));
                return;
            }
            $this->db->select('a.id_berita,b.nm_kategori_master, a.tgl_berita, a.judul, a.gambar, a.dibaca');
            $this->db->from('tb_berita a');
            $this->db->join('tb_kategori_master b', 'a.id_kategori = b.id_kat_master');
            $this->db->order_by('a.tgl_berita', 'DESC');
            $this->db->where('a.id_kategori', '4');
            $query = $this->db->get()->result_array();

            if ($query) {
                foreach ($query as &$item) {
                    if (!empty($item['gambar'])) {
                        $item['tgl_berita'] = date('d F Y', strtotime($item['tgl_berita']));
                        $item['gambar'] = base_url('img/berita/' . $item['gambar']);
                    }
                }
                $response = array(
                    'status' => true,
                    'message' => 'success',
                    'data' => $query
                );
            } else {
                $response = array(
                    'status' => true,
                    'message' => 'Berita ' . $titile . ' Tidak ditemukan!',
                    'data' => []
                );
            }
        } catch (Exception $e) {

            $response = array(
                'status' => false,
                'message' => 'Internal Server Error: ' . $e->getMessage(),
                'data' => null
            );
            $this->output->set_status_header(500);
        }

        $this->output->set_output(json_encode($response));
    }
    public function pendidikan()
    {
        $titile = 'Pendidikan';
        try {
            $apiKey = $this->input->get_request_header('API-Key', TRUE);

            if (empty($apiKey) || !$this->isValidApiKey($apiKey)) {
                $response = array(
                    'status' => false,
                    'message' => 'Key API tidak valid',
                    'data' => null
                );
                $this->output->set_status_header(401);
                $this->output->set_output(json_encode($response));
                return;
            }
            $this->db->select('a.id_berita,b.nm_kategori_master, a.tgl_berita, a.judul, a.gambar, a.dibaca');
            $this->db->from('tb_berita a');
            $this->db->join('tb_kategori_master b', 'a.id_kategori = b.id_kat_master');
            $this->db->order_by('a.tgl_berita', 'DESC');
            $this->db->where('a.id_kategori', '23');
            $query = $this->db->get()->result_array();

            if ($query) {
                foreach ($query as &$item) {
                    if (!empty($item['gambar'])) {
                        $item['tgl_berita'] = date('d F Y', strtotime($item['tgl_berita']));
                        $item['gambar'] = base_url('img/berita/' . $item['gambar']);
                    }
                }
                $response = array(
                    'status' => true,
                    'message' => 'success',
                    'data' => $query
                );
            } else {
                $response = array(
                    'status' => true,
                    'message' => 'Berita ' . $titile . ' Tidak ditemukan!',
                    'data' => []
                );
            }
        } catch (Exception $e) {

            $response = array(
                'status' => false,
                'message' => 'Internal Server Error: ' . $e->getMessage(),
                'data' => null
            );
            $this->output->set_status_header(500);
        }

        $this->output->set_output(json_encode($response));
    }
}
