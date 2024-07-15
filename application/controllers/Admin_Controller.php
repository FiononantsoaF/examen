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
        $nom = $this->input->post('nom');
        $mdp = $this->input->post('mdp');

        if (!empty($nom) && !empty($mdp)) {
			$admin = $this->Admin_model->get_finals4_employee($nom, $mdp);
            if(!empty($admin)) {
                redirect('Admin_Controller/liste_services');

            } else {
                $data['error'] = "verifier votre mot de passe";
                $this->load->view('error_page', $data);
            }
			               
        } else {
            $data['error'] = "verifier votre mot de passe";
            $this->load->view('error_page', $data);
        }
    }
}
