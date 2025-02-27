<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DetailBeritaController extends CI_Controller
{

	public function index()
	{
		$this->load->view('frontend/detailberita');
	}
}