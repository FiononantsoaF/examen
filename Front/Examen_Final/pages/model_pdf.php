<?php
    require('fpdf.php');

    // Ici vous DOGETER

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',25);

    // $pdf->SetDrawColor(0,80,180);
    $pdf->SetFillColor(175, 175, 175);
    //240, 240, 240
    // Epaisseur du cadre (1 mm)
    // $pdf->SetLineWidth(1);
    // Titre
    
    // $pdf->Cell(null,5,'',0,1,'c',true);
    $pdf->Cell(null,15,"Notre garage :)",0,1,'C',true);
    // $pdf->Cell(null,10,'',0,1,'C');
    // $pdf->Cell(null,5,'',0,1,'c',true);
    
    $pdf->SetFont('Arial','B',12);
    
    $pdf->Cell(null,15,'Ticket de votre rendez-vous dans notre Garage',0,1,'C');

    $pdf->Cell(95,10,'Details',0,0,'c',true);
    $pdf->Cell(95,10,'Information',0,1,'c',true);

    $pdf->SetFillColor(240, 240, 240);
    
    $pdf->SetFont('Arial','B',12,true);
    $pdf->Cell(95,10,'Matricule',0,0,'c',true);
    $pdf->SetFont('Arial','',12,true);
    $pdf->Cell(95,10,'4323 TBE',0,1,'c',true);

    $pdf->SetFillColor(175, 175, 175);
    
    $pdf->SetFont('Arial','B',12,true);
    $pdf->Cell(95,10,'Type Voiture',0,0,'c',true);
    $pdf->SetFont('Arial','',12,true);
    $pdf->Cell(95,10,'Legere',0,1,'c',true);

    $pdf->SetFillColor(240, 240, 240);

    $pdf->SetFont('Arial','B',12,true);
    $pdf->Cell(95,10,'Slot',0,0,'c',true);
    $pdf->SetFont('Arial','',12,true);
    $pdf->Cell(95,10,'A',0,1,'c',true);

    $pdf->SetFillColor(175, 175, 175);
    
    $pdf->SetFont('Arial','B',12,true);
    $pdf->Cell(95,10,'Type de reparation',0,0,'c',true);
    $pdf->SetFont('Arial','',12,true);
    $pdf->Cell(95,10,'Vidange',0,1,'c',true);

    $pdf->SetFillColor(240, 240, 240);

    $pdf->SetFont('Arial','B',12,true);
    $pdf->Cell(95,10,'Duree',0,0,'c',true);
    $pdf->SetFont('Arial','',12,true);
    $pdf->Cell(95,10,'1h',0,1,'c',true);
    
    $pdf->SetFillColor(175, 175, 175);
    
    $pdf->SetFont('Arial','B',12,true);
    $pdf->Cell(95,10,'Date Rendez-vous',0,0,'c',true);
    $pdf->SetFont('Arial','',12,true);
    $pdf->Cell(95,10,'12-07-2024',0,1,'c',true);

    $pdf->SetFillColor(240, 240, 240);
    
    $pdf->SetFont('Arial','B',12,true);
    $pdf->Cell(95,10,'Heure Rendez-vous',0,0,'c',true);
    $pdf->SetFont('Arial','',12,true);
    $pdf->Cell(95,10,'13:00',0,1,'c',true);

    $pdf->SetFillColor(175, 175, 175);
    
    $pdf->SetFont('Arial','B',12,true);
    $pdf->Cell(95,10,'Cout',0,0,'c',true);
    $pdf->SetFont('Arial','',12,true);
    $pdf->Cell(95,10,'10 000 Ar',0,1,'c',true);

    $pdf->SetFillColor(240, 240, 240);
    
    $pdf->SetFont('Arial','B',12,true);
    $pdf->Cell(95,10,'Date payement',0,0,'c',true);
    $pdf->SetFont('Arial','',12,true);
    $pdf->Cell(95,10,'12-07-2024',0,1,'c',true);
    $pdf->Output();
?>