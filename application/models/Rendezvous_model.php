<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rendezvous_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

	public function get_all(){
		return  $this->db->get('finals4_view_detail_rendez_vous')->result_array();
	}
    
    public function get_rendezvousbyclient($client_id){
        $this->db->where('client_id', $client_id);
        $query = $this->db->get('finals4_view_detail_rendez_vous');
        return $query->result_array();
	}

    public function get_detail_rendezvous($idr){
        $this->db->where('rendez_vous_id', $idr);
        $query = $this->db->get('finals4_view_detail_rendez_vous');
        return $query->result_array();
	}
}
