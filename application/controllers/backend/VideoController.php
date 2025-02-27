<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VideoController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Video';
        $data['user'] = $this->db
            ->select('user.*, user_wilayah.nama as nama_wilayah')
            ->from('user')
            ->join('user_wilayah', 'user_wilayah.id_wilayah = user.id_wilayah')
            ->where('user.email', $this->session->userdata('email'))
            ->get()
            ->row_array();
        $data['video'] = $this->db->query("SELECT a.id_video, a.judul_video, c.nama, a.url_video,a.jam, a.status, a.tgl_video
                                            FROM tb_video AS a
                                            INNER JOIN user AS c ON a.id_user = c.id_user 
                                            ORDER BY id_video DESC")->result_array();
        $this->load->view('backend/video', $data);
    }

    public function t_video()
    {
        $data['title'] = 'Tambah Video';
        $data['user'] = $this->db
            ->select('user.*, user_wilayah.nama as nama_wilayah')
            ->from('user')
            ->join('user_wilayah', 'user_wilayah.id_wilayah = user.id_wilayah')
            ->where('user.email', $this->session->userdata('email'))
            ->get()
            ->row_array();
        $this->form_validation->set_rules('judul_video', 'Judul', 'required', [
            "required" => "Judul Video Tidak Boleh Kosong"
        ]);
        $this->form_validation->set_rules('url_video', 'Url Video', 'required', [
            "required" => "Url Video Tidak Boleh Kosong"
        ]);
        $this->form_validation->set_rules('tgl_video', 'Tanggal Video', 'required', [
            "required" => "Tanggal Video Tidak Boleh Kosong"
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('backend/video_t', $data);
        } else {
            $judul = $this->input->post('judul_video');
            $judul1 = trim($judul);
            $judul2 = preg_replace('/[^!?a-zA-Z0-9\s]/', '', $judul1);
            $judul3 = preg_replace('/[\s!?]+/', '-', $judul2);
            $judul4 = rtrim($judul3, '-');
            $sub_judul = strtolower($judul4);

            $role_id = $this->input->post('role_id');
            $status = 3;

            if ($role_id == 1) {
                $status = 1;
            }
            $insert_data = [
                'judul_video' => $judul,
                'sub_judul' => $sub_judul,
                'id_user' => $this->input->post('id_user'),
                'url_video' => $this->input->post('url_video'),
                'tgl_video' => $this->input->post('tgl_video'),
                'jam' => $this->input->post('jam'),
                'status' => $status
            ];

            if ($this->db->insert('tb_video', $insert_data)) {
                $this->session->set_flashdata('message_type', 'success');
                $this->session->set_flashdata('message', 'Video Berhasil ditambahkan!');
            } else {
                $this->session->set_flashdata('message_type', 'error');
                $this->session->set_flashdata('message', 'Gagal Menambahkan Video!');
            }
            redirect('rj/berita/video/tambah');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Video Berhasil ditambahkan!</div>');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Video';
        $data['user'] = $this->db
            ->select('user.*, user_wilayah.nama as nama_wilayah')
            ->from('user')
            ->join('user_wilayah', 'user_wilayah.id_wilayah = user.id_wilayah')
            ->where('user.email', $this->session->userdata('email'))
            ->get()
            ->row_array();
        $data['video'] = $this->db->get_where('tb_video', ['id_video' => $id])->row_array();
        $this->form_validation->set_rules('judul_video', 'Judul', 'required', [
            "required" => "Judul Video Tidak Boleh Kosong"
        ]);
        $this->form_validation->set_rules('url_video', 'Url Video', 'required', [
            "required" => "Url Video Tidak Boleh Kosong"
        ]);
        $this->form_validation->set_rules('tgl_video', 'Tanggal Video', 'required', [
            "required" => "Tanggal Video Tidak Boleh Kosong"
        ]);
        $role_id = $this->input->post('role_id');

        $status = 3;
        if ($role_id == 1) {
            $status = 1;
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/video_e', $data);
        } else {

            $judul = $this->input->post('judul_video');
            $judul1 = trim($judul);
            $judul2 = preg_replace('/[^!?a-zA-Z0-9\s]/', '', $judul1);
            $judul3 = preg_replace('/[\s!?]+/', '-', $judul2);
            $judul4 = rtrim($judul3, '-');
            $sub_judul = strtolower($judul4);

            $insert_data = [
                'judul_video' => $judul,
                'sub_judul' => $sub_judul,
                'url_video' => $this->input->post('url_video'),
                'tgl_video' => $this->input->post('tgl_video'),
                'status' => $status
            ];


            $this->db->where('id_video', $id);
            if ($this->db->update('tb_video', $insert_data)) {
                $this->session->set_flashdata('message_type', 'success');
                $this->session->set_flashdata('message', 'Video Berhasil Diedit!');
            } else {
                $this->session->set_flashdata('message_type', 'error');
                $this->session->set_flashdata('message', 'Gagal Mengedit Video!');
            }
            $this->load->view('backend/video_e', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Video Berhasil diedit!</div>');
        }
    }

    public function hapus($id)
    {
        $video = $this->db->get_where('tb_video', ['id_video' => $id])->row_array();
        if ($video) {
            $this->db->where('id_video', $id);
            if ($this->db->delete('tb_video')) {
                $this->session->set_flashdata('message_type', 'success');
                $this->session->set_flashdata('message', 'Video berhasil dihapus!');
            } else {
                $this->session->set_flashdata('message_type', 'error');
                $this->session->set_flashdata('message', 'Gagal menghapus video!');
            }
        } else {
            $this->session->set_flashdata('message_type', 'error');
            $this->session->set_flashdata('message', 'video tidak ditemukan!');
        }
        redirect('rj/berita/video');
    }
}
