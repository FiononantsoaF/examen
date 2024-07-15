<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->load->view('admin/admin');
    }

    public function authentification() {
        $matricule = $this->input->post('matricule');
        $type_car = $this->input->post('type_car');

        if (!empty($matricule) && !empty($type_car)) {
			$client = $this->Client_model->get_finals4_client_bymatricule($matricule);
			if(empty($client)) {
				$result = $this->Client_model->enregistrer_client($matricule, $type_car);
			}
			redirect('Rendezvous_Controller');	               
        } else {
            $data['error'] = "Les champs Matricule et Type de véhicule sont obligatoires.";
            $this->load->view('error_page', $data);
        }
    }
}
