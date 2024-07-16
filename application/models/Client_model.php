<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_all_finals4_client() {
        $query = $this->db->get('finals4_clients');
        return $query->result_array();
    }

    public function get_finals4_client_bymatricule($matricules) {
        $this->db->where('matricule', $matricules);
        $query = $this->db->get('finals4_clients');
        return $query->result_array();
    }

    public function get_finals4_voiture() {
        $query = $this->db->get('finals4_voiture');
        return $query->result_array();
    }

    public function enregistrer_client($matricule, $typesvoitures) {
        $query = $this->db->get('finals4_voiture');
        $data = array(
            'matricule' => $matricule,
            'voiture' => $typesvoitures,
        );
        $this->db->insert('finals4_clients', $data);
    }
}
