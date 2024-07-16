<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Client_model'); 
        $this->load->library('session');
    }

    public function index() {
		$data['vehicule_types'] = $this->Client_model->get_finals4_voiture();
        $this->load->view('index',$data);
    }

    public function enregistrer() {
        $matricule = $this->input->post('matricule');
        $type_car = $this->input->post('type_car');

        if (!empty($matricule) && !empty($type_car)) {
			$client = $this->Client_model->get_finals4_client_bymatricule($matricule);
			if(empty($client)) {
				$result = $this->Client_model->enregistrer_client($matricule, $type_car);
                $client = $this->Client_model->get_finals4_client_bymatricule($matricule);
			}
            $this->session->set_userdata('client_id', $client[0]['id']);
            $client_id = $this->session->userdata('client_id');
			redirect('Rendezvous_Controller');	               
        } else {
            $data['error'] = "Les champs Matricule et Type de véhicule sont obligatoires.";
            $this->load->view('error_page', $data);
        }
    }
}
