<?php
require('fpdf.php');

$client_matricule = $_POST['client_matricule'];
$voiture_nom = $_POST['voiture_nom'];
$slot_nom = $_POST['slot_nom'];
$service_nom = $_POST['service_nom'];
$service_duree = $_POST['service_duree'];
$operation_entree_date = $_POST['operation_entree_date'];
$operation_entree_time = $_POST['operation_entree_time'];
$service_prix = $_POST['service_prix'];
$devis_payment_date = $_POST['devis_payment_date'];
$paye = $_POST['paye'] == 1 ? 'Payé' : 'Impayé';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',25);

$pdf->SetFillColor(175, 175, 175);
$pdf->Cell(0,15,"Notre garage :)",0,1,'C',true);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,15,'Ticket de votre rendez-vous dans notre Garage',0,1,'C');

$pdf->Cell(95,10,'Details',0,0,'C',true);
$pdf->Cell(95,10,'Information',0,1,'C',true);

$pdf->SetFillColor(240, 240, 240);

$pdf->SetFont('Arial','B',12,true);
$pdf->Cell(95,10,'Matricule',0,0,'C',true);
$pdf->SetFont('Arial','',12,true);
$pdf->Cell(95,10,$client_matricule,0,1,'C',true);

$pdf->SetFillColor(175, 175, 175);

$pdf->SetFont('Arial','B',12,true);
$pdf->Cell(95,10,'Type Voiture',0,0,'C',true);
$pdf->SetFont('Arial','',12,true);
$pdf->Cell(95,10,$voiture_nom,0,1,'C',true);

$pdf->SetFillColor(240, 240, 240);

$pdf->SetFont('Arial','B',12,true);
$pdf->Cell(95,10,'Slot',0,0,'C',true);
$pdf->SetFont('Arial','',12,true);
$pdf->Cell(95,10,$slot_nom,0,1,'C',true);

$pdf->SetFillColor(175, 175, 175);

$pdf->SetFont('Arial','B',12,true);
$pdf->Cell(95,10,'Type de reparation',0,0,'C',true);
$pdf->SetFont('Arial','',12,true);
$pdf->Cell(95,10,$service_nom,0,1,'C',true);

$pdf->SetFillColor(240, 240, 240);

$pdf->SetFont('Arial','B',12,true);
$pdf->Cell(95,10,'Duree',0,0,'C',true);
$pdf->SetFont('Arial','',12,true);
$pdf->Cell(95,10,$service_duree.' h',0,1,'C',true);

$pdf->SetFillColor(175, 175, 175);

$pdf->SetFont('Arial','B',12,true);
$pdf->Cell(95,10,'Date Rendez-vous',0,0,'C',true);
$pdf->SetFont('Arial','',12,true);
$pdf->Cell(95,10,$operation_entree_date.' à '.$operation_entree_time,0,1,'C',true);

$pdf->SetFillColor(240, 240, 240);

$pdf->SetFont('Arial','B',12,true);
$pdf->Cell(95,10,'Cout',0,0,'C',true);
$pdf->SetFont('Arial','',12,true);
$pdf->Cell(95,10,$service_prix.' Ar',0,1,'C',true);

$pdf->SetFillColor(175, 175, 175);

$pdf->SetFont('Arial','B',12,true);
$pdf->Cell(95,10,'Date payement',0,0,'C',true);
$pdf->SetFont('Arial','',12,true);
$pdf->Cell(95,10,$devis_payment_date,0,1,'C',true);

$pdf->SetFillColor(240, 240, 240);

$pdf->SetFont('Arial','B',12,true);
$pdf->Cell(95,10,'Status',0,0,'C',true);
$pdf->SetFont('Arial','',12,true);
$pdf->Cell(95,10,$paye,0,1,'C',true);

$pdf->Output();
?>
