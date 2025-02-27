<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BerandaController extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Riiljejak Media Online Bolaang Mongondow';
        $data['headline'] = $this->_headline();
        $data['empat'] = $this->_empatBerita();
        $data['terbaru'] = $this->_beritaTerbaru();
        $data['populer'] = $this->_populer();
        $data['politik'] = $this->_politik();
        $data['pemerintahan'] = $this->_pemerintahan();
        $data['olahraga'] = $this->_olahraga();
        $data['nasional'] = $this->_nasional();
        $data['religi'] = $this->_religi();
        $data['hukum'] = $this->_hukum();
        $this->_log_visit();
        $this->load->view('frontend/beranda', $data);
    }

    public function _headline()
    {
        $this->db->select("IF(LENGTH(a.judul) > 80, CONCAT(LEFT(a.judul, 80), '...'), a.judul) AS judul, a.sub_judul, a.tgl_berita, a.gambar");
        $this->db->from("tb_berita a");
        $this->db->where("a.headline", "Y");
        $this->db->order_by('a.id_berita', 'DESC');
        $query = $this->db->get();
        $results = $query->result_array();
        return $results;
    }

    public function _empatBerita()
    {
        $this->db->select("IF(LENGTH(a.judul) > 50, CONCAT(LEFT(a.judul, 50), '...'), a.judul) AS judul, a.sub_judul, a.tgl_berita, a.gambar,b.nm_kategori_master,c.nama,b.url");
        $this->db->from("tb_berita a");
        $this->db->join('tb_kategori_master b', 'b.id_kat_master = a.id_kategori');
        $this->db->join('user c', 'c.id_user = a.id_user');
        $this->db->where('a.aktif', "Y");
        $this->db->where('a.status', 1);
        $this->db->order_by('a.tgl_berita', 'DESC');
        $this->db->limit(4);
        $query = $this->db->get();
        $results = $query->result_array();

        return $results;
    }

    public function _beritaTerbaru()
    {
        $this->db->select("a.judul, a.sub_judul, a.tgl_berita, a.gambar,b.nm_kategori_master,c.nama,b.url");
        $this->db->from("tb_berita a");
        $this->db->join('tb_kategori_master b', 'b.id_kat_master = a.id_kategori');
        $this->db->join('user c', 'c.id_user = a.id_user');
        $this->db->where('a.aktif', "Y");
        $this->db->where('a.status', 1);
        $this->db->order_by('a.tgl_berita', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get();
        $results = $query->result_array();

        return $results;
    }

    public function _populer()
    {
        $this->db->select("a.judul, a.sub_judul, a.tgl_berita, a.gambar,b.nm_kategori_master,c.nama,b.url");
        $this->db->from("tb_berita a");
        $this->db->join('tb_kategori_master b', 'b.id_kat_master = a.id_kategori');
        $this->db->join('user c', 'c.id_user = a.id_user');
        $this->db->where('a.aktif', "Y");
        $this->db->where('a.status', 1);
        $this->db->order_by('a.dibaca', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get();
        $results = $query->result_array();
        return $results;
    }

    public function _politik()
    {
        $this->db->select("IF(LENGTH(a.judul) > 50, CONCAT(LEFT(a.judul, 50), '...'), a.judul) AS judul, a.sub_judul, a.tgl_berita, a.gambar,b.nm_kategori_master,c.nama,b.url");
        $this->db->from("tb_berita a");
        $this->db->join('tb_kategori_master b', 'b.id_kat_master = a.id_kategori');
        $this->db->join('user c', 'c.id_user = a.id_user');
        $this->db->where("a.id_kategori", "3");
        $this->db->where('a.aktif', "Y");
        $this->db->where('a.status', 1);
        $this->db->order_by('a.tgl_berita', 'DESC');
        $query = $this->db->get();
        $results = $query->row_array();
        return $results;
    }

    public function _pemerintahan()
    {
        $this->db->select("IF(LENGTH(a.judul) > 50, CONCAT(LEFT(a.judul, 50), '...'), a.judul) AS judul, a.sub_judul, a.tgl_berita, a.gambar,b.nm_kategori_master,c.nama,b.url");
        $this->db->from("tb_berita a");
        $this->db->join('tb_kategori_master b', 'b.id_kat_master = a.id_kategori');
        $this->db->join('user c', 'c.id_user = a.id_user');
        $this->db->where("a.id_kategori", "4");
        $this->db->where('a.aktif', "Y");
        $this->db->where('a.status', 1);
        $this->db->order_by('a.tgl_berita', 'DESC');
        $query = $this->db->get();
        $results = $query->row_array();
        return $results;
    }

    public function _olahraga()
    {
        $this->db->select("IF(LENGTH(a.judul) > 50, CONCAT(LEFT(a.judul, 50), '...'), a.judul) AS judul, a.sub_judul, a.tgl_berita, a.gambar,b.nm_kategori_master,c.nama,b.url");
        $this->db->from("tb_berita a");
        $this->db->join('tb_kategori_master b', 'b.id_kat_master = a.id_kategori');
        $this->db->join('user c', 'c.id_user = a.id_user');
        $this->db->where("a.id_kategori", "20");
        $this->db->where('a.aktif', "Y");
        $this->db->where('a.status', 1);
        $this->db->order_by('a.tgl_berita', 'DESC');
        $query = $this->db->get();
        $results = $query->row_array();
        return $results;
    }
    public function _nasional()
    {
        $this->db->select("IF(LENGTH(a.judul) > 50, CONCAT(LEFT(a.judul, 50), '...'), a.judul) AS judul, a.sub_judul, a.tgl_berita, a.gambar,b.nm_kategori_master,c.nama,b.url");
        $this->db->from("tb_berita a");
        $this->db->join('tb_kategori_master b', 'b.id_kat_master = a.id_kategori');
        $this->db->join('user c', 'c.id_user = a.id_user');
        $this->db->where("a.id_kategori", "22");
        $this->db->where('a.aktif', "Y");
        $this->db->where('a.status', 1);
        $this->db->order_by('a.tgl_berita', 'DESC');
        $query = $this->db->get();
        $results = $query->row_array();
        return $results;
    }
    public function _religi()
    {
        $this->db->select("IF(LENGTH(a.judul) > 50, CONCAT(LEFT(a.judul, 50), '...'), a.judul) AS judul, a.sub_judul, a.tgl_berita, a.gambar,b.nm_kategori_master,c.nama,b.url");
        $this->db->from("tb_berita a");
        $this->db->join('tb_kategori_master b', 'b.id_kat_master = a.id_kategori');
        $this->db->join('user c', 'c.id_user = a.id_user');
        $this->db->where("a.id_kategori", "21");
        $this->db->where('a.aktif', "Y");
        $this->db->where('a.status', 1);
        $this->db->order_by('a.tgl_berita', 'DESC');
        $query = $this->db->get();
        $results = $query->row_array();
        return $results;
    }

    public function _hukum()
    {
        $this->db->select("IF(LENGTH(a.judul) > 50, CONCAT(LEFT(a.judul, 50), '...'), a.judul) AS judul, a.sub_judul, a.tgl_berita, a.gambar,b.nm_kategori_master,c.nama,b.url");
        $this->db->from("tb_berita a");
        $this->db->join('tb_kategori_master b', 'b.id_kat_master = a.id_kategori');
        $this->db->join('user c', 'c.id_user = a.id_user');
        $this->db->where("a.id_kategori", "2");
        $this->db->where('a.aktif', "Y");
        $this->db->where('a.status', 1);
        $this->db->order_by('a.tgl_berita', 'DESC');
        $query = $this->db->get();
        $results = $query->row_array();
        return $results;
    }

    private function limit_words($string, $word_limit)
    {
        $words = explode(' ', $string);
        return implode(' ', array_splice($words, 0, $word_limit));
    }

    private function _log_visit()
    {
        $data = array(
            'ip_address' => $this->input->ip_address(),
            'user_agent' => $this->input->user_agent(),
            'browser' => $this->agent->browser() . ' ' . $this->agent->version(),
            'platform' => $this->agent->platform()
        );
        if ($this->agent->is_mobile()) {
            $data['platform'] .= ' (Mobile)';
        } else {
            $data['platform'] .= ' (Desktop)';
        }
        $ip_address = $this->input->ip_address();
        $country = $this->_get_country_by_ip($ip_address);
        $data['country'] = $country;
        try {
            $visit_time = new DateTime('now', new DateTimeZone('Asia/Makassar'));
            $data['visit_time'] = $visit_time->format('Y-m-d H:i:s');
        } catch (Exception $e) {
            error_log("Error setting timezone to Makassar: " . $e->getMessage());
            $data['visit_time'] = (new DateTime('now', new DateTimeZone('UTC')))->format('Y-m-d H:i:s');
        }
        $this->Visit_model->log_visit($data);
    }
    private function _get_country_by_ip($ip_address)
    {
        $this->load->driver('cache', ['adapter' => 'file']);
    
        if ($ip_address == "::1" || $ip_address == "127.0.0.1") {
            $ip_address = "8.8.8.8";
        }
        $cache_key = 'geo_' . $ip_address;
        $cached_data = $this->cache->get($cache_key);
    
        if ($cached_data) {
            return $cached_data; 
        }
        $url = "http://ipinfo.io/{$ip_address}/json";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($http_code == 429 || $response === false) {
            log_message('error', "Gagal mengambil data lokasi untuk IP: {$ip_address}");
            return "Unknown";
        }
        $data = json_decode($response, true);
        $country = isset($data['country']) ? $data['country'] : "Unknown";
        $this->cache->save($cache_key, $country, 3600);
    
        return $country;
    }
    

    private function _cari($keyword, $limit = 5, $offset = 0)
    {
        $this->db->select('a.judul, a.tgl_berita, a.sub_judul, a.gambar, a.isi_berita, b.nama, a.jam, c.nm_kategori_master, c.url as url_kategori');
        $this->db->from('tb_berita a');
        $this->db->join('user b', 'a.id_user = b.id_user');
        $this->db->join('tb_kategori_master c', 'a.id_kategori = c.id_kat_master');
        $this->db->group_start();
        $this->db->like('a.judul', $keyword);
        $this->db->or_like('a.isi_berita', $keyword);
        $this->db->or_like('a.tag', $keyword);
        $this->db->group_end();
        $this->db->where('a.aktif', "Y");
        $this->db->where('a.status', 1);
        $this->db->order_by('a.tgl_berita', 'DESC');
        $this->db->limit($limit, $offset);
        return $this->db->get()->result_array();
    }

    public function cari()
    {
        $keyword = $this->input->get('keyword');
        $page = $this->input->get('page') ?? 1;
        $limit = 5;
        $offset = ($page - 1) * $limit;

        $data['title'] = 'Pencarian';
        $data['populer'] = $this->_populer();

        if (empty($keyword)) {
            $data['result'] = ["Data Tidak Ditemukan"];
            $data['berita'] = [];
        } else {
            $data['berita'] = $this->_cari($keyword, $limit, $offset);
            if (empty($data['berita'])) {
                $data['result'] = ["Data Tidak Ditemukan"];
            }
        }
        foreach ($data['berita'] as &$item) {
            $item['tgl_beritaa'] = tanggal_indo($item['tgl_berita'], $item['jam']);
            $item['url'] = 'detail/' . url_title($item['tgl_berita'], 'dash', TRUE) . '/' . url_title($item['sub_judul'], 'dash', TRUE);
        }
        $this->db->like('a.judul', $keyword);
        $this->db->or_like('a.isi_berita', $keyword);
        $this->db->or_like('a.tag', $keyword);
        $total_berita = $this->db->count_all_results('tb_berita a');
        $total_pages = ceil($total_berita / $limit);
        if ($this->input->is_ajax_request()) {
            echo json_encode([
                'berita' => $data['berita'],
                'pagination' => $this->generate_pagination($total_pages, $page, $keyword),
                'total_berita' => $total_berita
            ]);
            return;
        }
        $this->load->view('frontend/pencarian', $data);
    }



    private function generate_pagination($total_pages, $current_page, $keyword)
    {
        $max_links = 2;
        $pagination = '';
        if ($current_page > 1) {
            $pagination .= '<li class="back-next"><a href="#" class="pagination-link" data-page="' . ($current_page - 1) . '">Back</a></li>';
        }
        $start_page = max(1, $current_page - floor($max_links / 2));
        $end_page = min($total_pages, $start_page + $max_links - 1);

        if ($end_page - $start_page + 1 < $max_links) {
            $start_page = max(1, $end_page - $max_links + 1);
        }
        if ($start_page > 1) {
            $pagination .= '<li><a href="#" class="pagination-link" data-page="1">1</a></li>';
            if ($start_page > 2) {
                $pagination .= '<li><span>...</span></li>';
            }
        }

        for ($i = $start_page; $i <= $end_page; $i++) {
            $pagination .= '<li class="' . ($i == $current_page ? 'active' : '') . '">
                            <a href="#" class="pagination-link" data-page="' . $i . '">' . $i . '</a>
                        </li>';
        }

        if ($end_page < $total_pages) {
            if ($end_page < $total_pages - 1) {
                $pagination .= '<li><span>...</span></li>';
            }
            $pagination .= '<li><a href="#" class="pagination-link" data-page="' . $total_pages . '">' . $total_pages . '</a></li>';
        }

        if ($current_page < $total_pages) {
            $pagination .= '<li class="back-next"><a href="#" class="pagination-link" data-page="' . ($current_page + 1) . '">Next</a></li>';
        }

        return $pagination;
    }

    public function semuaBerita()
    {
        $data['title'] = 'Index Berita';
        $data['populer'] = $this->_populer();
        $startdate = $this->input->get('startdate');
        $enddate = $this->input->get('enddate');
        $this->db->select('a.judul, a.tgl_berita, a.sub_judul, a.gambar, a.isi_berita, b.nama, a.jam, c.nm_kategori_master, c.url');
        $this->db->from('tb_berita a');
        $this->db->join('user b', 'a.id_user = b.id_user');
        $this->db->join('tb_kategori_master c', 'a.id_kategori = c.id_kat_master');
        $this->db->where('a.aktif', "Y");
        $this->db->where('a.status', 1);
        $this->db->order_by('a.tgl_berita', 'DESC');

        if (!empty($startdate) && !empty($enddate)) {
            $this->db->where('a.tgl_berita >=', $startdate);
            $this->db->where('a.tgl_berita <=', $enddate);
        } else {
            $today = date('Y-m-d');
            $this->db->where('a.tgl_berita', $today);
        }

        $data['berita'] = $this->db->get()->result_array();

        $this->load->view('frontend/semua-berita', $data);
    }
}