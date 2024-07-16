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
		$this->load->view('');
	}

	public function get_content()
	{
		$csv = $_FILES['csv_file']['tmp_name'];
		$data = $this->from_csv_file($csv);
		//row should have same structure as database
		var_dump($data);
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