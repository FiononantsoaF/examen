<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rendezvous_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_all()
	{
		$query = $this->db->get('finals4_view_detail_rendez_vous');
		return $query->result();
	}

	public function get_rendezvousbyclient($client_id)
	{
		$this->db->where('client_id', $client_id);
		$query = $this->db->get('finals4_view_detail_rendez_vous');
		return $query->result_array();
	}

	public function get_detail_rendezvous($idr)
	{
		$this->db->where('rendez_vous_id', $idr);
		$query = $this->db->get('finals4_view_detail_rendez_vous');
		return $query->result_array();
	}

	public function create_simple_rdv($client_id, $service_id)
	{
		$data = array(
			"client" => $client_id,
			"services" => $service_id
		);
		return $data;
	}

	public function create_operation_rdv($service_id, $id_slot, $entree_date, $entree_time)
	{
		$this->load->model("Admin_model");
		$duree = $this->Admin_model->get_service_by_id($service_id)['duree'];

		$entree_time_obj = new DateTime($entree_time);
		$duree_seconds = intval($duree); // Ensure $duree is in seconds
		$duree_interval = new DateInterval('PT' . $duree_seconds . 'S');
		$sortie_time_obj = clone $entree_time_obj;
		$sortie_time_obj->add($duree_interval);

		$sortie_date = $entree_date;
		if ($sortie_time_obj->format('H:i:s') > '18:00:00') {
			$sortie_time_obj->setTime(8, 0, 0); // Reset time to 08:00:00
			$sortie_time_obj->add(new DateInterval('P1D')); // Add one day
			$sortie_date = $sortie_time_obj->format('Y-m-d');
		}
		$data = array(
			"rendez_vous" => $this->get_last_rendezvous_id(),
			"slot" => $id_slot,
			"entree_date" => $entree_date,
			"entree_time" => $entree_time,
			"sortie_date" => $sortie_date,
			"sortie_time" => $sortie_time_obj->format('H:i:s')
		);

		return $data;
	}

	public function create_devis($service_id)
	{
		$this->load->model("Admin_model");
		$prix = $this->Admin_model->get_service_by_id($service_id)['prix'];

		$data = array(
			"rendez_vous" => $this->get_last_rendezvous_id(),
			"prix" => $prix,
			"payement" => null
		);

		return $data;
	}

	public function save_rendez_vous_to_database($client_id, $service_id, $id_slot, $entree_date, $entree_time)
	{
		$simple_rdv_data = $this->create_simple_rdv($client_id, $service_id);
		$this->db->insert('finals4_demande_rendez_vous', $simple_rdv_data);

		$rendez_vous_data = $this->create_operation_rdv($service_id, $id_slot, $entree_date, $entree_time);
		$this->db->insert('finals4_operation_rendez_vous', $rendez_vous_data);

		$devis_data = $this->create_devis($service_id);
		$this->db->insert('finals4_devis', $devis_data);

		$this->db->trans_complete(); // Complete transaction

		return $this->db->trans_status(); // Return transaction status
	}
	public function get_last_rendezvous_id()
	{
		$this->db->select_max('id');
		$query = $this->db->get('finals4_demande_rendez_vous');
		return $query->row()->id;
	}

	public function get_last_rendezvous($matricule)
	{
		$this->db->select_max('id');
        $this->db->where('client',$matricule);
		$query = $this->db->get('finals4_demande_rendez_vous');
		return $query->row()->id;
		;
	}
}