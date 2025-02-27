<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FotoController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Foto';
        $data['user'] = $this->db
            ->select('user.*, user_wilayah.nama as nama_wilayah')
            ->from('user')
            ->join('user_wilayah', 'user_wilayah.id_wilayah = user.id_wilayah')
            ->where('user.email', $this->session->userdata('email'))
            ->get()
            ->row_array();
        $data['foto'] = $this->db->query("SELECT a.id_foto, a.gambar, c.nama, a.judul_foto, a.status, a.tgl_foto
                                            FROM tb_foto AS a
                                            INNER JOIN user AS c ON a.id_user = c.id_user 
                                            ORDER BY id_foto DESC")->result_array();
        $this->load->view('backend/foto', $data);
    }

    public function t_foto()
    {
        $data['title'] = 'Tambah Foto';
        $id_kategori = $this->input->post('id_kategori');
        $data['user'] = $this->db
            ->select('user.*, user_wilayah.nama as nama_wilayah')
            ->from('user')
            ->join('user_wilayah', 'user_wilayah.id_wilayah = user.id_wilayah')
            ->where('user.email', $this->session->userdata('email'))
            ->get()
            ->row_array();
        $this->form_validation->set_rules('judul_foto', 'Judul', 'required', [
            "required" => "Judul Foto Tidak Boleh Kosong"
        ]);
        $this->form_validation->set_rules('redaksi_foto', 'Keterangan Gambar', 'required', [
            "required" => "Redaksi Foto Tidak Boleh Kosong"
        ]);
        $this->form_validation->set_rules('tgl_foto', 'Tanggal Berita', 'required', [
            "required" => "Tanggal Berita Tidak Boleh Kosong"
        ]);
        $this->form_validation->set_rules('gambar', 'Gambar', 'callback_check_upload');

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/foto_t', $data);
        } else {

            $judul = $this->input->post('judul_foto');
            $judul1 = trim($judul);
            $judul2 = preg_replace('/[^!?a-zA-Z0-9\s]/', '', $judul1);
            $judul3 = preg_replace('/[\s!?]+/', '-', $judul2);
            $judul4 = rtrim($judul3, '-');
            $sub_judul = strtolower($judul4);

            $config['upload_path'] = './img/berita/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
            $config['max_size'] = 2048;
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);


            $role_id = $this->input->post('role_id');

            $status = 3;

            if ($role_id == 1) {
                $status = 1;
            }
            if (!$this->upload->do_upload('gambar')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
                redirect('rj/berita/foto/tambah');
            } else {
                $upload_data = $this->upload->data();
                $gambar = $upload_data['file_name'];
                $insert_data = [
                    'judul_foto' => $judul,
                    'sub_judul' => $sub_judul,
                    'id_user' => $this->input->post('id_user'),
                    'gambar' => $gambar,
                    'redaksi_foto' => $this->input->post('redaksi_foto'),
                    'tgl_foto' => $this->input->post('tgl_foto'),
                    'jam_foto' => $this->input->post('jam_foto'),
                    'dibaca' => 0,
                    'status' => $status
                ];

                if ($this->db->insert('tb_foto', $insert_data)) {
                    $this->session->set_flashdata('message_type', 'success');
                    $this->session->set_flashdata('message', 'Foto Berhasil ditambahkan!');
                } else {
                    $this->session->set_flashdata('message_type', 'error');
                    $this->session->set_flashdata('message', 'Gagal Menambahkan Foto!');
                }
            }
            redirect('rj/berita/foto/tambah');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Foto Berhasil ditambahkan!</div>');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Foto';
        $data['user'] = $this->db
            ->select('user.*, user_wilayah.nama as nama_wilayah')
            ->from('user')
            ->join('user_wilayah', 'user_wilayah.id_wilayah = user.id_wilayah')
            ->where('user.email', $this->session->userdata('email'))
            ->get()
            ->row_array();
        $data['foto'] = $this->db->get_where('tb_foto', ['id_foto' => $id])->row_array();
        $this->form_validation->set_rules('judul_foto', 'Judul Foto', 'required', [
            "required" => "Judul Foto Tidak Boleh Kosong"
        ]);
        $this->form_validation->set_rules('redaksi_foto', 'Redaksi Gambar', 'required', [
            "required" => "Redaksi Foto Tidak Boleh Kosong"
        ]);
        $this->form_validation->set_rules('tgl_foto', 'Tanggal Foto', 'required', [
            "required" => "Tanggal Foto Tidak Boleh Kosong"
        ]);
        $this->form_validation->set_rules('gambar', 'Gambar', 'callback_check_upload');
        $role_id = $this->input->post('role_id');

        $status = 3;
        if ($role_id == 1) {
            $status = 1;
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/foto_e', $data);
        } else {

            $judul = $this->input->post('judul_foto');
            $judul1 = trim($judul);
            $judul2 = preg_replace('/[^!?a-zA-Z0-9\s]/', '', $judul1);
            $judul3 = preg_replace('/[\s!?]+/', '-', $judul2);
            $judul4 = rtrim($judul3, '-');
            $sub_judul = strtolower($judul4);

            $config['upload_path'] = './img/berita/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
            $config['max_size'] = 2048;
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
                $gambar = $upload_data['file_name'];
                if ($data['foto']['gambar'] && file_exists('./img/berita/' . $data['foto']['gambar'])) {
                    unlink('./img/berita/' . $data['foto']['gambar']);
                }
            } else {
                $gambar = $data['foto']['gambar'];
            }

            $update_data = [
                'judul_foto' => $judul,
                'sub_judul' => $sub_judul,
                'gambar' => $gambar,
                'redaksi_foto' => $this->input->post('redaksi_foto'),
                'tgl_foto' => $this->input->post('tgl_foto'),
                'status' => $status
            ];

            $this->db->where('id_foto', $id);
            if ($this->db->update('tb_foto', $update_data)) {
                $this->session->set_flashdata('message_type', 'success');
                $this->session->set_flashdata('message', 'Foto Berhasil Diedit!');
            } else {
                $this->session->set_flashdata('message_type', 'error');
                $this->session->set_flashdata('message', 'Gagal Mengedit BFoto!');
            }
            $this->load->view('backend/foto_e', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Foto Berhasil diedit!</div>');
        }
    }

    public function hapus($id)
    {
        $berita = $this->db->get_where('tb_foto', ['id_foto' => $id])->row_array();
        if ($berita) {
            if ($berita['gambar'] && file_exists('./img/berita/' . $berita['gambar'])) {
                unlink('./img/berita/' . $berita['gambar']);
            }
            $this->db->where('id_foto', $id);
            if ($this->db->delete('tb_foto')) {
                $this->session->set_flashdata('message_type', 'success');
                $this->session->set_flashdata('message', 'Foto berhasil dihapus!');
            } else {
                $this->session->set_flashdata('message_type', 'error');
                $this->session->set_flashdata('message', 'Gagal menghapus foto!');
            }
        } else {
            $this->session->set_flashdata('message_type', 'error');
            $this->session->set_flashdata('message', 'Foto tidak ditemukan!');
        }
        redirect('rj/berita/foto');
    }

    public function check_upload($str)
    {
        if (empty($_FILES['gambar']['name']) && empty($_FILES['gambar']['tmp_name'])) {
            $this->form_validation->set_message('check_upload', 'Gambar Tidak Boleh Kosong');
            return false;
        } else {
            return true;
        }
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Foto';
        $data['user'] = $this->db
            ->select('user.*, user_wilayah.nama as nama_wilayah')
            ->from('user')
            ->join('user_wilayah', 'user_wilayah.id_wilayah = user.id_wilayah')
            ->where('user.email', $this->session->userdata('email'))
            ->get()
            ->row_array();
        $this->db->select('*');
        $this->db->from('tb_foto');
        $this->db->where('tb_foto.id_foto', $id);
        $data['foto'] = $this->db->get()->row_array();
        $this->load->view('backend/foto_detail', $data);
    }
}
