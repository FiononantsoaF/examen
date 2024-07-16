<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rendezvous_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Rendezvous_model');  // Assurez-vous de charger le modèle ici
        $this->load->library('session');
    }

    public function index() {
        $this->load->view('templates/header.php');
        $this->load->view('rendezvous/rendezvous.php');
        $this->load->view('templates/footer.php');
    }

    public function liste_rendezvous() {
        $this->load->view('templates/header.php');
        $client_id = $this->session->userdata('client_id');
        print_r($client_id);
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


}
