<?php
class Visit_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function log_visit($data) {
        return $this->db->insert('visits', $data);
    }
}