<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rendezvous_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Rendezvous_model');
        $this->load->model('Admin_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function calendar() {
        $this->load->view('calendar/calendar.php');
    } 
    public function get_all() {
        $events = $this->Rendezvous_model->get_all();
        $data = [];
    
        foreach ($events as $event) {
            $data[] = [
                'service_nom' => $event->service_nom,
                'date_debut' =>  $event->operation_entree_date, // Vous pouvez personnaliser la date si nécessaire
                'date_fin' =>  $event->operation_sortie_date, // Vous pouvez personnaliser l'heure si nécessaire
                'client_matricule' =>  $event->client_matricule
            ];
        }
    
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    
 
    public function index() {
        $this->load->view('templates/header.php');
        $this->load->view('rendezvous/rendezvous.php');
        $this->load->view('templates/footer.php');
    }

    public function liste_rendezvous() {
        $this->load->view('templates/header.php');
        $client_id = $this->session->userdata('client_id');
        $data['list_rendezvous'] = $this->Rendezvous_model->get_rendezvousbyclient($client_id);
        $this->load->view('rendezvous/liste_rendezvous.php',$data);
        $this->load->view('templates/footer.php');
    }

    public function detail_rendezvous($idr){
        $this->load->view('templates/header.php');
        $data['detail_rendezvous'] = $this->Rendezvous_model->get_detail_rendezvous($idr);
        $this->load->view('rendezvous/detail_rendezvous.php',$data);
        $this->load->view('templates/footer.php');
    }

    public function get_all_services(){
        $this->load->view('templates/header.php');
        $data['liste_service'] = $this->Admin_model->get_finals4_services();
        $this->load->view('rendezvous/rendezvous.php',$data);
        $this->load->view('templates/footer.php');
    }

    public function check_dispo() {
        $date_debut = $this->input->post('date_debut');
        $time = $this->input->post('time');
        $service = $this->input->post('service');
    
        $this->load->model('Check_model');
        $slot = $this->Check_model->is_slot_available($service, $date_debut, $time);
    
        if ($slot === false) {
            echo '<p>La date n\'est pas disponible</p>';
        } else {
            echo form_open('Rendezvous_Controller/save_rendezvous');
            echo '<input type="hidden" name="date_debut" value="' . $date_debut . '">';
            echo '<input type="hidden" name="time" value="' . $time . '">';
            echo '<input type="hidden" name="service" value="' . $service . '">';
            echo '<input type="hidden" name="slot" value="' . $slot . '">';
            echo '<input type="submit" class="bouton_1" value="Envoyer">';
            echo form_close();
        }
    }
    public function save_rendezvous() {
        $client = $this->session->userdata('client_id'); // Assuming you store client id in session
        $service_id = $this->input->post('service');
        $id_slot = $this->input->post('slot');
        $entree_date = $this->input->post('date_debut');
        $entree_time = $this->input->post('time');
    
        $data['okey'] = $this->Rendezvous_model->save_rendez_vous_to_database($client, $service_id, $id_slot, $entree_date, $entree_time);

    }
    

}
