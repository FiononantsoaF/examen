<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Suggestion_model extends CI_Model
{
	public function is_slot_available($service_id, $date, $time)
	{
		// Load the Admin_model to get the service duration
		$this->load->model('Admin_model');
		$service = $this->Admin_model->get_service_by_id($service_id);

		// Convert the service duration (HH:MM:SS) to seconds
		$time_parts = explode(':', $service['duree']);
		$required_diff = ($time_parts[0] * 3600) + ($time_parts[1] * 60) + $time_parts[2];

		// Convert the provided date and time to a DateTime object
		$start_datetime = new DateTime($date . ' ' . $time);
		$end_datetime = clone $start_datetime;
		$end_datetime->modify("+$required_diff seconds");

		// Format the DateTime objects to strings for the SQL query
		$start_datetime_str = $start_datetime->format('Y-m-d H:i:s');
		$end_datetime_str = $end_datetime->format('Y-m-d H:i:s');

		// Query to check if there are free slots with enough duration
		$sql = "
        SELECT slot
        FROM finals4_view_free_slots
        WHERE 
            (fotoana_v < ? AND fotoana_m > ?)
            AND (diff > ? OR diff IS NULL)
    ";

		$query = $this->db->query($sql, array($start_datetime_str, $end_datetime_str, $required_diff));

		// If the query returns any rows, there is at least one available slot
		if ($query->num_rows() > 0) {
			return true;
		}

		// No slots are available
		return false;
	}


	public function get_free_slots_for_service($service_id)
	{
		$this->load->model("Admin_model");
		$service = $this->Admin_model->get_service_by_id($service_id);
		return $this->get_free_slots($service['duree']);
	}

}
