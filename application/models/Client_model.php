<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function enregistrer_client($matricule, $typesvoitures) {
        $data = array(
            'matricule' => $matricules,
            'voiture' => $caisse_id,
        );
        $this->db->insert('finals4_clients', $data);
    }
}
