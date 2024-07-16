<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('session');
    }
    public function index() {

        $this->load->view('admin/admin');
    }
    public function authentification() {
        $nom = $this->input->post('nom');
        $mdp = $this->input->post('mdp');

        if (!empty($nom) && !empty($mdp)) {
			$admin = $this->Admin_model->get_finals4_employe($nom, $mdp);
            print_r($admin);
            if(!empty($admin)) {
                redirect('Admin_Controller/body_back');
            } else {
                $data['error'] = "verifier votre mot de passe";
                $this->load->view('error_page', $data);
            }
			               
        } else {
            $data['error'] = "verifier votre mot de passe";
            $this->load->view('error_page', $data);
        }
    }

    // services
    public function enregistre_services() {
        $nom = $this->input->post('nom');
        $duree = $this->input->post('duree');
        $prix = $this->input->post('prix');
        $result = $this->Admin_model->enregistre_services($nom, $duree, $prix);
        redirect("Admin_Controller/body_back");

    }

    public function body_back() {
        $this->load->view('admin/body_back');
        $this->load->view('templates/footer.php');
    }

    public function liste_services() {
        $data['liste_services'] = $this->Admin_model->get_finals4_services();
        $this->load->view('services/liste_service', $data);
    }

    public function modifier_service($id) {
        $data['service'] = $this->Admin_model->get_service_by_id($id);
        $this->load->view('services/modifier_service', $data);
    }

    public function update_service($id) {
        $data = array(
            'nom' => $this->input->post('nom'),
            'duree' => $this->input->post('duree'),
            'prix' => $this->input->post('prix')
        );
        $this->Admin_model->update_service($id, $data);
        $this->liste_services();
    }

    public function supprimer_service($id) {
        $this->Admin_model->delete_service($id);
        $this->liste_services();
    }
    public function dashboard() {
        $data['chiffres'] = $this->Admin_model->chiffres_affaires();
        $data['total'] = $this->Admin_model->total_affaires();
        $this->load->view('admin/acceuil', $data);
    }

    //devis
    
}
