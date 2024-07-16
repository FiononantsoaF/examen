<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rendezvous_model_test extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rendezvous_model');
    }

    public function index()
    {
        // Test data
        $client_id = 1;
        $service_id = 1;
        $id_slot = 1;
        $entree_date = '2024-07-31';
        $entree_time = '10:00:00';

        // Perform the operation and get result
        $result = $this->Rendezvous_model->save_rendez_vous_to_database($client_id, $service_id, $id_slot, $entree_date, $entree_time);

        // Assert that the result should be TRUE (transaction success)
        echo $result;
    }
}
