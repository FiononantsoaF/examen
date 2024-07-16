<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Csv_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->helper('file'); // Load file helper
    }

    public function read_csv($file_path) {
        // Check if the file exists
        if (!file_exists($file_path)) {
            return false; // File not found
        }

        // Read the CSV file
        $csv_data = file_get_contents($file_path); // Use file_get_contents instead of read_file

        // Parse CSV data using custom function or PHP functions
        $parsed_data = $this->parse_csv_data($csv_data); // Call local method for parsing

        return $parsed_data;
    }

    private function parse_csv_data($csv_data) {
        $lines = explode("\n", $csv_data);
        $result = [];

        foreach ($lines as $line) {
            $result[] = str_getcsv($line);
        }

        return $result;
    }
}