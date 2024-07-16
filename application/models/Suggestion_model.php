<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Suggestion_model extends CI_Model
{
	public function get_free_slots($required_diff)
	{
		$sql = "
            SELECT *
            FROM finals4_view_free_slots
            WHERE diff > ? or diff is NULL";

		$query = $this->db->query($sql, array($required_diff));
		return $query->result_array();
	}

	public function get_free_slots_for_service($service_id)
	{
		$this->load->model("Admin_model");
		$service = $this->Admin_model->get_service_by_id($service_id);
		return $this->get_free_slots($service['duree']);
	}

}
