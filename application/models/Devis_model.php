<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Devis_model extends CI_Model
{

	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

	// Function to insert data into finals4_devis
	public function insert_devis($data)
	{
		// Validate the payement date
		if (!$this->validate_payement_date($data['rendez_vous'], $data['payement'])) {
			return false;
		}
		return $this->db->insert('finals4_devis', $data);
	}

	// Function to update data in finals4_devis
	public function update_devis($id, $data)
	{
		// Validate the payement date
		if (isset($data['payement']) && !$this->validate_payement_date($data['rendez_vous'], $data['payement'])) {
			return false;
		}

		$this->db->where('id', $id);
		return $this->db->update('finals4_devis', $data);
	}

	// Function to validate the payement date
	private function validate_payement_date($rendez_vous_id, $payement_date)
	{
		$this->db->select('entree_date');
		$this->db->where('rendez_vous', $rendez_vous_id);
		$this->db->order_by('entree_date', 'ASC');
		$query = $this->db->get('finals4_operation_rendez_vous', 1); // Limit to 1 result

		if ($query->num_rows() > 0) {
			$row = $query->row();
			if ($payement_date >= $row->entree_date) {
				return true;
			} else {
				return false;
			}
		}
		return true; // If there's no corresponding entry in finals4_operation_rendez_vous, allow the insert/update
	}
}
