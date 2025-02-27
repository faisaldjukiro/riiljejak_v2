<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
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

    public function index()
    {

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

            $this->db->select('a.id_berita, b.nm_kategori_master, a.tgl_berita, a.judul, a.gambar, a.dibaca');
            $this->db->from('tb_berita a');
            $this->db->join('tb_kategori_master b', 'a.id_kategori = b.id_kat_master');
            $this->db->order_by('a.tgl_berita', 'DESC');

            $query = $this->db->get()->result_array();

            if ($query) {
                foreach ($query as &$item) {
                    if (!empty($item['gambar'])) {
                        $item['gambar'] = base_url('img/berita/' . $item['gambar']);
                    }
                }

                $response = array(
                    'status' => true,
                    'message' => 'success',
                    'data' => $query
                );
                $this->output->set_status_header(200);
            } else {
                $response = array(
                    'status' => false,
                    'message' => 'Data tidak ditemukan!',
                    'data' => null
                );
                $this->output->set_status_header(404);
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


    public function beritadetail($id)
    {
        try {
            if (!is_numeric($id)) {
                $response = array(
                    'status' => false,
                    'message' => 'ID berita tidak valid!',
                    'data' => null
                );
                $this->output->set_status_header(400);
                $this->output->set_output(json_encode($response));
                return;
            }
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
            $this->db->select('a.id_berita, b.nm_kategori_master, a.tgl_berita, a.jam, a.judul, a.gambar, a.keterangan_gambar, a.dibaca, a.isi_berita, a.tag');
            $this->db->from('tb_berita a');
            $this->db->join('tb_kategori_master b', 'a.id_kategori = b.id_kat_master');
            $this->db->where('a.id_berita', $id);
            $query = $this->db->get()->row_array();
            if ($query) {

                if (!empty($query['tgl_berita'])) {
                    $query['tgl_berita'] = date('d F Y', strtotime($query['tgl_berita']));
                }


                if (!empty($query['gambar'])) {
                    $query['gambar'] = base_url('img/berita/' . $query['gambar']);
                }


                $response = array(
                    'status' => true,
                    'message' => 'success',
                    'data' => array(
                        'id_berita' => $query['id_berita'],
                        'nm_kategori_master' => $query['nm_kategori_master'],
                        'tgl_berita' => $query['tgl_berita'],
                        'jam' => $query['jam'],
                        'judul' => $query['judul'],
                        'gambar' => $query['gambar'],
                        'keterangan_gambar' => $query['keterangan_gambar'],
                        'dibaca' => $query['dibaca'],
                        'isi_berita' => $query['isi_berita'],
                        'tag' => $query['tag']
                    )
                );
                $this->output->set_status_header(200);
            } else {

                $response = array(
                    'status' => false,
                    'message' => 'Data tidak ditemukan!',
                    'data' => null
                );
                $this->output->set_status_header(404);
            }
        } catch (Exception $e) {

            $response = array(
                'status' => false,
                'message' => 'Server Error: ' . $e->getMessage(),
                'data' => null
            );
            $this->output->set_status_header(500);
        }


        $this->output->set_output(json_encode($response));
    }

    public function headline()
    {
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

            $this->db->select('a.id_berita,b.nm_kategori_master, a.tgl_berita, a.judul, a.gambar, a.dibaca, a.isi_berita');
            $this->db->from('tb_berita a');
            $this->db->join('tb_kategori_master b', 'a.id_kategori = b.id_kat_master');
            $this->db->order_by('a.tgl_berita', 'DESC');
            $this->db->where('a.headline', 'Y');
            $this->db->limit(4);
            $query = $this->db->get()->result_array();

            if ($query) {
                foreach ($query as &$item) {
                    if (!empty($item['gambar'])) {
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
                    'status' => false,
                    'message' => 'Data Tidak ditemukan!: ' . $this->db->_error_message(),
                    'data' => null
                );
                $this->output->set_status_header(500);
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
    public function populer()
    {
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

            $this->db->select('a.id_berita,b.nm_kategori_master, a.tgl_berita, a.judul, a.gambar, a.dibaca,a.jam');
            $this->db->from('tb_berita a');
            $this->db->join('tb_kategori_master b', 'a.id_kategori = b.id_kat_master');
            $this->db->order_by('a.dibaca', 'DESC');
            $this->db->limit(10);
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
                    'status' => false,
                    'message' => 'Data Tidak ditemukan!: ' . $this->db->_error_message(),
                    'data' => null
                );
                $this->output->set_status_header(500);
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
    public function terbaru()
    {
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
            $this->db->select('a.id_berita,b.nm_kategori_master, a.tgl_berita, a.judul, a.gambar, a.dibaca, a.jam');
            $this->db->from('tb_berita a');
            $this->db->join('tb_kategori_master b', 'a.id_kategori = b.id_kat_master');
            $this->db->order_by('a.tgl_berita', 'DESC');
            $this->db->limit(10);
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
                    'status' => false,
                    'message' => 'Data Tidak ditemukan!: ' . $this->db->_error_message(),
                    'data' => null
                );
                $this->output->set_status_header(500);
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
    public function insertBerita()
    {
        try {
            log_message('debug', 'Memulai fungsi insertBerita.');
            $apiKey = $this->input->get_request_header('API-Key', TRUE);
            log_message('debug', 'API-Key diterima: ' . $apiKey);

            if (empty($apiKey) || !$this->isValidApiKey($apiKey)) {
                log_message('error', 'API Key tidak valid.');
                $response = [
                    'status' => false,
                    'message' => 'Key API tidak valid',
                    'data' => null
                ];
                $this->output->set_status_header(401)->set_output(json_encode($response));
                return;
            }

            $this->form_validation->set_data($this->input->post());
            $this->form_validation->set_rules('judul', 'Judul', 'required|xss_clean', ["required" => "Judul Berita Tidak Boleh Kosong"]);
            $this->form_validation->set_rules('keterangan_gambar', 'Keterangan Gambar', 'required|xss_clean', ["required" => "Redaksi Foto Tidak Boleh Kosong"]);
            $this->form_validation->set_rules('tag[]', 'Tag Berita', 'required', ["required" => "Tag Berita Tidak Boleh Kosong"]);
            $this->form_validation->set_rules('tgl_berita', 'Tanggal Berita', 'required|callback_valid_date', ["required" => "Tanggal Berita Tidak Boleh Kosong", "valid_date" => "Format Tanggal Tidak Valid"]);

            if ($this->form_validation->run() === FALSE) {
                log_message('error', 'Validasi form gagal: ' . validation_errors());
                $response = [
                    'status' => false,
                    'message' => validation_errors(),
                    'data' => null
                ];
                $this->output->set_status_header(400)->set_output(json_encode($response));
                return;
            }
            log_message('debug', 'Validasi form berhasil.');

            date_default_timezone_set('Asia/Makassar');
            $waktu_sekarang = date('H:i');

            $input = $this->input->post();
            $tags_string = is_array($input['tag']) ? implode(',', $input['tag']) : $input['tag'];
            $judul = trim($input['judul']);
            $sub_judul = strtolower(preg_replace('/[\s!?]+/', '-', preg_replace('/[^!?a-zA-Z0-9\s]/', '', $judul)));

            $config = [
                'upload_path' => './img/berita/',
                'allowed_types' => 'jpg|jpeg|png|gif|webp',
                'max_size' => 2048,
                'encrypt_name' => TRUE,
            ];
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                log_message('error', 'Gagal upload gambar: ' . strip_tags($this->upload->display_errors()));
                $response = [
                    'status' => false,
                    'message' => strip_tags($this->upload->display_errors()),
                    'data' => null
                ];
                $this->output->set_status_header(400)->set_output(json_encode($response));
                return;
            }

            $upload_data = $this->upload->data();
            $gambar = $upload_data['file_name'];
            log_message('debug', 'Upload gambar berhasil: ' . $gambar);

            $insert_data = [
                'judul' => $judul,
                'sub_judul' => $sub_judul,
                'id_user' => 17,
                'id_kategori_master' => 5,
                'id_kategori' => 5,
                'gambar' => $gambar,
                'keterangan_gambar' => $input['keterangan_gambar'],
                'isi_berita' => $input['isi_berita'],
                'tag' => $tags_string,
                'tgl_berita' => $input['tgl_berita'],
                'headline' => "N",
                'youtube' => '',
                'jam' => $waktu_sekarang,
                'dibaca' => 0,
                'status' => 3,
                'aktif' => "Y",
            ];

            if ($this->db->insert('tb_berita', $insert_data)) {
                log_message('info', 'Berita berhasil ditambahkan.');
                $response = [
                    'status' => true,
                    'message' => 'Berita berhasil ditambahkan',
                    'data' => [
                        'judul' => $insert_data['judul']
                    ]
                ];
                $this->output->set_status_header(200)->set_output(json_encode($response));
            } else {
                log_message('error', 'Gagal menambahkan berita. Query: ' . $this->db->last_query());
                $response = [
                    'status' => false,
                    'message' => 'Gagal menambahkan berita',
                    'data' => null
                ];
                $this->output->set_status_header(500)->set_output(json_encode($response));
            }
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = [
                'status' => false,
                'message' => 'Internal Server Error',
                'data' => null
            ];
            $this->output->set_status_header(500)->set_output(json_encode($response));
        }
    }
    public function valid_date($date)
    {
        if (DateTime::createFromFormat('Y-m-d', $date) !== FALSE) {
            return TRUE;
        }
        $this->form_validation->set_message('valid_date', 'Format Tanggal Tidak Valid');
        return FALSE;
    }
}