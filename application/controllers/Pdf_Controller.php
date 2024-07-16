<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/fpdf/fpdf.php';

class Pdf_Controller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

	}
	public function generate_pdf()
	{

		$client_matricule = $this->input->post('client_matricule');
		$voiture_nom = $this->input->post('voiture_nom');
		$slot_nom = $this->input->post('slot_nom');
		$service_nom = $this->input->post('service_nom');
		$service_duree = $this->input->post('service_duree');
		$operation_entree_date = $this->input->post('operation_entree_date');
		$operation_entree_time = $this->input->post('operation_entree_time');
		$service_prix = $this->input->post('service_prix');
		$devis_payment_date = $this->input->post('devis_payment_date');
		$paye = $this->input->post('paye') == 1 ? 'Payé' : 'Impayé';

		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 25);

		$pdf->SetFillColor(175, 175, 175);
		$pdf->Cell(0, 15, "Notre garage :)", 0, 1, 'C', true);

		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(0, 15, 'Ticket de votre rendez-vous dans notre Garage', 0, 1, 'C');

		$pdf->Cell(95, 10, 'Details', 0, 0, 'C', true);
		$pdf->Cell(95, 10, 'Information', 0, 1, 'C', true);

		$pdf->SetFillColor(240, 240, 240);

		$pdf->SetFont('Arial', 'B', 12, true);
		$pdf->Cell(95, 10, 'Matricule', 0, 0, 'C', true);
		$pdf->SetFont('Arial', '', 12, true);
		$pdf->Cell(95, 10, $client_matricule, 0, 1, 'C', true);

		$pdf->SetFillColor(175, 175, 175);

		$pdf->SetFont('Arial', 'B', 12, true);
		$pdf->Cell(95, 10, 'Type Voiture', 0, 0, 'C', true);
		$pdf->SetFont('Arial', '', 12, true);
		$pdf->Cell(95, 10, $voiture_nom, 0, 1, 'C', true);

		$pdf->SetFillColor(240, 240, 240);

		$pdf->SetFont('Arial', 'B', 12, true);
		$pdf->Cell(95, 10, 'Slot', 0, 0, 'C', true);
		$pdf->SetFont('Arial', '', 12, true);
		$pdf->Cell(95, 10, $slot_nom, 0, 1, 'C', true);

		$pdf->SetFillColor(175, 175, 175);

		$pdf->SetFont('Arial', 'B', 12, true);
		$pdf->Cell(95, 10, 'Type de reparation', 0, 0, 'C', true);
		$pdf->SetFont('Arial', '', 12, true);
		$pdf->Cell(95, 10, $service_nom, 0, 1, 'C', true);

		$pdf->SetFillColor(240, 240, 240);

		$pdf->SetFont('Arial', 'B', 12, true);
		$pdf->Cell(95, 10, 'Duree', 0, 0, 'C', true);
		$pdf->SetFont('Arial', '', 12, true);
		$pdf->Cell(95, 10, $service_duree, 0, 1, 'C', true);

		$pdf->SetFillColor(175, 175, 175);

		$pdf->SetFont('Arial', 'B', 12, true);
		$pdf->Cell(95, 10, 'Date Rendez-vous', 0, 0, 'C', true);
		$pdf->SetFont('Arial', '', 12, true);
		$pdf->Cell(95, 10, $operation_entree_date, 0, 1, 'C', true);

		$pdf->SetFillColor(240, 240, 240);

		$pdf->SetFont('Arial', 'B', 12, true);
		$pdf->Cell(95, 10, 'Heure Rendez-vous', 0, 0, 'C', true);
		$pdf->SetFont('Arial', '', 12, true);
		$pdf->Cell(95, 10, $operation_entree_time, 0, 1, 'C', true);

		$pdf->SetFillColor(175, 175, 175);

		$pdf->SetFont('Arial', 'B', 12, true);
		$pdf->Cell(95, 10, 'Cout', 0, 0, 'C', true);
		$pdf->SetFont('Arial', '', 12, true);
		$pdf->Cell(95, 10, $service_prix, 0, 1, 'C', true);

		$pdf->SetFillColor(240, 240, 240);

		$pdf->SetFont('Arial', 'B', 12, true);
		$pdf->Cell(95, 10, 'Date paiement', 0, 0, 'C', true);
		$pdf->SetFont('Arial', '', 12, true);
		$pdf->Cell(95, 10, $devis_payment_date, 0, 1, 'C', true);

		// Generate a unique file name for the PDF
		$file_name = uniqid('ticket_', true) . '.pdf';

		// Determine the download directory based on OS
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
			// Windows
			$file_path = 'C:\\Users\\' . getenv('USERNAME') . '\\Downloads\\' . $file_name;
		} else {
			// Assume Unix-like
			$file_path = getenv('HOME') . '/Downloads/' . $file_name;
		}

		// Output PDF to the determined file path
		$pdf->Output($file_path, 'F');

		// Display the PDF in the browser
		header('Content-Type: application/pdf');
		header('Content-Disposition: inline; filename="' . $file_name . '"');
		header('Content-Length: ' . filesize($file_path));
		readfile($file_path);
		exit;

		// Optionally, return the file path for further handling
		return $file_path;
	}
}