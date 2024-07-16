<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rendezvous_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}

	public function get_all()
	{
		return $this->db->get('finals4_view_detail_rendez_vous')->result_array();
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
		return array("client" => $client_id, "services" => $service_id);
	}

	public function create_operation_rdv($id_slot, $entree_date, $entree_time, $service_id)
	{
		$this->load->model("Admin_model");
		$duree = $this->Admin_model->get_service_by_id($service_id)['duree'];

		$data = array(
			"rendez_vous" => '',
			"slot" => $id_slot,
			"entree_date" => $entree_date,
			"entree_time" => $entree_time,
			"sortie_date" => '',
			"sortie_time" => ''
		);
		return $data;
	}

	public function create_devis($service_id)
	{
		$this->load->model("Admin_model");
		$prix = $this->Admin_model->get_service_by_id($service_id)['prix'];
		$data = array(
			"rendez_vous" => '',
			"effectue" => 0,
			"prix" => $prix,
			"payment" => '',
			"paye" => 0
		);
		return $data;
	}
}