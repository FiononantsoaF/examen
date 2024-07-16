<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Suggestion_model extends CI_Model
{
	public function get_free_slots($required_diff)
	{
		$sql = "
            SELECT *
            FROM finals4_view_free_slots
            WHERE diff > ?";

		$query = $this->db->query($sql, array($required_diff));
		return $query->result();
	}

	public function get_free_slots_for_service($service_id){
		$sql = "";
		$query = $this->db->query($sql, array($service_id));
	}

}
