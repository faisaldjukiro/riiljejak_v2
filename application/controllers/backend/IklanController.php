<?php
defined('BASEPATH') or exit('No direct script access allowed');

class IklanController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Iklan';
        $data['user'] = $this->db
            ->select('user.*, user_wilayah.nama as nama_wilayah')
            ->from('user')
            ->join('user_wilayah', 'user_wilayah.id_wilayah = user.id_wilayah')
            ->where('user.email', $this->session->userdata('email'))
            ->get()
            ->row_array();
        $data['iklan'] = $this->db
            ->select('a.*, b.nama as nama')
            ->from('tb_iklan as a')
            ->join('user as b', 'a.id_user = b.id_user')
            ->get()
            ->result_array();

        $this->load->view('backend/iklan', $data);
    }
}
