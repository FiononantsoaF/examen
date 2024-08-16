<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Csv_controller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$this->load->view('templates/header.php');
		$this->load->view('importation/import_donnee.php');
		$this->load->view('templates/footer.php');
	}

	public function get_content()
	{
		$service_name = $_FILES['service']['tmp_name'];
		$work_name = $_FILES['travaux']['tmp_name'];
		$data_serv = $this->from_csv_file($service_name);
		$data_trav = $this->from_csv_file($work_name);
		//row should have same structure as database
		$data['services'] = $this->format_to_db_parseable($data_serv);
		$data['works'] = $this->format_to_db_parseable($data_trav);

		$this->load->view('templates/header.php');
		$this->load->view('importation/data_csv.php' , $data);
		$this->load->view('templates/footer.php');
	}

	public function confirm_save(){
		// Get the JSON string from the hidden input
		$services_json = $this->input->post('services');
		$works_json = $this->input->post('works');

		// Decode the JSON string back into an array
		$services = json_decode($services_json, true);
		$works = json_decode($works_json, true);

		$this->load->model('Csv_model');

		$this->Csv_model->save($services,$works);

		redirect(site_url('Admin_Controller/dashboard'));

		
	}

	function from_csv_file($filename)
	{
		$file = fopen($filename, "r");
		$data = array();
		while (!feof($file)) {
			$data[] = fgetcsv($file, 255);
		}
		fclose($file);
		return $data;
	}


	function format_to_db_parseable($data)
	{
		$keys = $data[0];
		array_splice($data, 0, 1);
		$output = array();
		foreach ($data as $key => $value) {
			$arr = array();
			if (is_bool($value))
				continue;
			for ($i = 0; $i < count($value); $i++) {
				$arr[$keys[$i]] = $value[$i];
			}
			$output[] = $arr;
		}
		return $output;
	}


}