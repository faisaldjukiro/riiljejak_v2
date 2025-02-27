<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {

    public function page_missing() {
        $this->output->set_status_header('404'); 
        $this->load->view('errors/custom_404');
    }
}