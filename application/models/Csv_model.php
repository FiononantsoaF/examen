<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Csv_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('file'); // Load file helper
	}

	public function save_to_temp($services, $works)
	{
		$this->db->empty_table('service_temp');
		$this->db->empty_table('trav_temp');
		for ($i=0; $i < count($services); $i++) { 
			$serv_data = array(
				'serv' => $services[$i]['service'],  // Adjust the indexes according to the structure of your csv file
				'duree' => $services[$i]['duree']
		  );
		  $this->db->insert('service_temp', $serv_data);
		}

		foreach ($works as $key => $value) {
			$work_data = array(
				"voiture"=> $value['voiture'],
				"type_voiture"=> $value['type voiture'],
				"date_rdv"=> date('Y-m-d', strtotime($value['date rdv'])),
				"heure_rdv"=> strtotime($value['heure rdv']),
				"type_service"=>$value['type service'],
				"montant"=> $value['montant'],
				"date_paiement"=>date('Y-m-d', strtotime($value['date paiement']))
			);

			$this->db->insert('trav_temp', $work_data);
		}
	}

	public function save_to_database(){
		$this->db->query("INSERT INTO finals4_services (nom, prix, duree) SELECT s.serv AS nom,t.montant AS prix, s.duree FROM service_temp s JOIN trav_temp t ON s.serv = t.type_service WHERE t.montant = (SELECT MAX(t2.montant) FROM trav_temp t2 WHERE t2.type_service = s.serv);");

		$this->db->query("insert into finals4_voiture (nom) select distinct type_voiture from trav_temp");

		$this->db->query("insert into finals4_clients (matricule,voiture ) select distinct trav_temp.voiture , finals4_voiture.id from trav_temp join finals4_voiture on finals4_voiture.nom=trav_temp.type_voiture");
	}

	public function save($services, $works){
		$this->save_to_temp($services, $works);
		$this->save_to_database();
		
	}
}