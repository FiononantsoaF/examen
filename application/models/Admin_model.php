<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {


    public function __construct() {
        parent::__construct();
        $this->load->database();
    
    }
    public function get_finals4_employe($nom, $mdp) {
        $this->db->where('nom', $nom);
        $this->db->where('mdp', $mdp);
        $query = $this->db->get('finals4_employe');
        return $query->result_array();
    }

    public function get_finals4_services() {
        $query = $this->db->get('finals4_services');
        return $query->result_array();
    }
}
