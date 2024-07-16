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
		return array("client" => $client_id, "services" => $service_id);
	}

	public function create_operation_rdv($service_id, $id_slot, $entree_date, $entree_time)
	{
		$this->db->select('MAX(id) as last_id');
		$query = $this->db->get('finals4_demande_rendez_vous');
		$last_id = $query->row()->last_id;

		$this->load->model("Admin_model");
		$duree = $this->Admin_model->get_service_by_id($service_id)['duree'];


		$entree_time = new DateTime($entree_time);
		$duree = new DateInterval('PT' . $duree . 'S');
		$sortie_time = $entree_time->add($duree);
		if ($sortie_time > new DateTime('18:00:00')) {
			$sortie_time = new DateTime('08:00:00');
			$rest_of_duree = $duree->sub(new DateInterval('PT10H')); // the rest of duree
			$sortie_time->add($rest_of_duree);
			$sortie_date = date('Y-m-d', strtotime($entree_date . ' +1 day'));
			$sortie_time = new DateTime('08:00:00');
		} else {
			$sortie_date = $entree_date;
		}

		$data = array(
			"rendez_vous" => $last_id,
			"slot" => $id_slot,
			"entree_date" => $entree_date,
			"entree_time" => $entree_time,
			"sortie_date" => $sortie_date,
			"sortie_time" => $sortie_time
		);
		return $data;
	}

	public function create_devis($service_id)
	{
		$this->db->select('MAX(id) as last_id');
		$query = $this->db->get('finals4_demande_rendez_vous');
		$last_id = $query->row()->last_id;

		$this->load->model("Admin_model");
		$prix = $this->Admin_model->get_service_by_id($service_id)['prix'];
		$data = array(
			"rendez_vous" => $last_id,
			"effectue" => 0,
			"prix" => $prix,
			"payment" => '',
			"paye" => 0
		);
		return $data;
	}

	public function save_rendez_vous_to_database($client, $service_id, $id_slot, $entree_date, $entree_time)
	{
		$simple_rdv_data = $this->create_simple_rdv($client, $service_id);
		$this->db->insert('finals4_simple_rendez_vous', $simple_rdv_data);

		$rendez_vous_data = $this->create_operation_rdv($service_id, $id_slot, $entree_date, $entree_time);
		$devis_data = $this->create_devis($service_id);

		$this->db->insert('finals4_operation_rendez_vous', $rendez_vous_data);
		$this->db->insert('finals4_devis', $devis_data);
	}
}