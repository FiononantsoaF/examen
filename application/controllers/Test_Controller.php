<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Test_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Devis_model'); // Charger le modèle
	}

	public function validate_payment_date()
	{
		$rendez_vous_id = $this->input->post('rendez_vous_id');
		$payment_date = $this->input->post('payment_date');

		$is_valid = $this->Devis_model->validate_payement_date($rendez_vous_id, $payment_date);
		if ($is_valid) {
			echo 'Payment date is valid';
		} else {
			echo 'Payment date is invalid';
		}
	}


}