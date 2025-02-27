<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BerandaController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Beranda';

        $data['user'] = $this->db
            ->select('user.*, user_wilayah.nama as nama_wilayah')
            ->from('user')
            ->join('user_wilayah', 'user_wilayah.id_wilayah = user.id_wilayah')
            ->where('user.email', $this->session->userdata('email'))
            ->get()
            ->row_array();
        $data = array_merge($data, $this->_getCountBerita());
        $data = array_merge($data, $this->_getCountPengujung());
        $data['total_user'] = $this->_getUser();
        $this->load->view('backend/beranda', $data);
    }

    private function _getCountBerita()
    {
        $filter = $this->input->get('filter') ?? 'semua';
        switch ($filter) {
            case 'hari':
                $data['total_berita'] = $this->Beranda_model->get_berita_hari_ini();
                $data['filter_label'] = 'Hari Ini';
                break;
            case 'bulan':
                $data['total_berita'] = $this->Beranda_model->get_berita_bulan_ini();
                $data['filter_label'] = 'Bulan Ini';
                break;
            case 'tahun':
                $data['total_berita'] = $this->Beranda_model->get_berita_tahun_ini();
                $data['filter_label'] = 'Tahun Ini';
                break;
            default:
                $data['total_berita'] = $this->Beranda_model->get_semua_berita();
                $data['filter_label'] = 'Semua';
                break;
        }
        return $data;
    }
    public function _getCountPengujung()
    {
        $filter = $this->input->get('filter') ?? 'semua';
        switch ($filter) {
            case 'hari':
                $data['total_pengunjung'] = $this->Beranda_model->get_pengunjung_hari_ini();
                $data['filter_label'] = 'Hari Ini';
                break;
            case 'bulan':
                $data['total_pengunjung'] = $this->Beranda_model->get_pengunjung_bulan_ini();
                $data['filter_label'] = 'Bulan Ini';
                break;
            case 'tahun':
                $data['total_pengunjung'] = $this->Beranda_model->get_pengunjung_tahun_ini();
                $data['filter_label'] = 'Tahun Ini';
                break;
            default:
                $data['total_pengunjung'] = $this->Beranda_model->get_semua_pengunjung();
                $data['filter_label'] = 'Semua';
                break;
        }
        return $data;
    }
    private function _getUser()
    {
        return $this->db->count_all('user');
    }
    public function getDiagramKunjungan($year = null)
    {
        if ($year === null) {
            $input = json_decode(file_get_contents('php://input'), true);
            $year = isset($input['year']) ? $input['year'] : date('Y');
        }

        $this->db->select("DATE_FORMAT(visit_time, '%Y-%m') as month, 
        CASE 
            WHEN country = 'ID' THEN 'Indonesia' 
            ELSE 'Luar Negeri' 
        END as country, 
        COUNT(*) as total");
        $this->db->from('visits');
        $this->db->where('YEAR(visit_time)', $year);
        $this->db->group_by(['month', 'country']);
        $this->db->order_by('month', 'ASC');
        $query = $this->db->get();
        $data = $query->result();

        echo json_encode($data);
    }
}