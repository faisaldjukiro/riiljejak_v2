<?php
defined('BASEPATH') or exit('No direct script access allowed');

class WaController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Wa';
        $data['user'] = $this->db
            ->select('user.*, user_wilayah.nama as nama_wilayah')
            ->from('user')
            ->join('user_wilayah', 'user_wilayah.id_wilayah = user.id_wilayah')
            ->where('user.email', $this->session->userdata('email'))
            ->get()
            ->row_array();

        $this->load->view('backend/whatsapp', $data);
    }

    public function send()
    {
        $pesan = $this->input->post('pesan');
        $nowa = $this->input->post('nowa');
        $token = 'o+e7yhAXtBNizyrZW26b';

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $nowa,
                'message' => $pesan,

            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $token
            ),
        ));

        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
        }
        curl_close($curl);

        redirect('rj/wa');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Wahtsap Berhasil Di Kirim!</div>');
    }
}