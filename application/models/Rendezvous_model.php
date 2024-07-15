<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rendezvous_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
	 
	// public function get_all(){
	// 	return  $this->db->get('view_detail_rendez_vous')->result_array();
	// }
}
