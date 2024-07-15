<?php
require_once 'fpdf.php';

class pdf extends FPDF
{
    function header()
    {
        $defaultX = $this->GetX();
        $defaultY = $this->GetY();
        // Logo
        // todo : logo
        // School Year
        $this->SetY( 10 );
        $this->SetX( - 70 );
        $this->SetFont( 'Times', '', 13 );
        $this->SetTextColor( 128 );
        $this->Cell( 0, 8, "Annee universitaire 2015-2016" );
        // Reset normal x and y
        $this->SetX( $defaultX );
        $this->SetY( $defaultY + 8 );
        // Title
        $this->SetFont( 'Times', '', 18 );
        $this->SetTextColor( 'blue' );
        $this->Cell( 0, 15, "RELEVE DE NOTES ET RESULTATS", 0, 1, 'C' );
    }

    function footer()
    {
        $this->SetFont( 'Times', '', 13 );
        $h = 8;
        $y = - 25;
        $x = - 100;

        $this->SetY( $y );
        $this->SetX( $x );
        $this->Cell( 0, $h, "Fait a Antananarivo, le 12/09/2016", 0, 1, 'C' );

        $this->SetY( $y + $h );
        $this->SetX( $x );
        $this->Cell( 0, $h, "Le recteur de l'IT University", 0, 0, 'C' );
    }

    function student_info( $student_info )
    {
        $this->SetFont( 'Arial', '', 13 );
        $this->Cell( 0, 10, "Nom: " . $student_info['name'], 0, 1 );
        $this->Cell( 0, 10, "Prenom(s): " . $student_info['first_name'], 0, 1 );
        $this->Cell( 0, 10, "Ne le: " . $student_info['birthdate'], 0, 1 );
        $this->Cell( 0, 10, "N d'inscription: " . $student_info['etu'], 0, 1 );

        $this->Cell( 22, 10, "Inscrit en: " );
        $this->SetFont( 'Arial', 'B', 13 );
        $this->Cell( 0, 10, "M1-Informatique", 0, 1 );

        $this->SetFont( 'Arial', '', 13 );
        $this->Cell( 0, 10, "a obtenu les notes suivantes:", 0, 1 );
    }

    function notes( $notes )
    {
        // Largeurs des colonnes
        $w = array( 30, 50, 25, 30, 30 );
        // En tete
        $note = $notes[0];
        foreach ( $note as $key => $e ) {
            $this->Cell( $w[$key], 7, $e, 1, 0, 'C' );
        }
        $this->Ln();
        // Donnees
        foreach ( $notes as $row ) {
            $this->Cell( $w[0], 6, $row[0], 'LR' );
            $this->Cell( $w[1], 6, $row[1], 'LR' );
            $this->Cell( $w[2], 6, number_format( $row[2], 0, ',', ' ' ), 'LR', 0, 'R' );
            $this->Cell( $w[3], 6, number_format( $row[3], 0, ',', ' ' ), 'LR', 0, 'R' );
            $this->Ln();
        }
        // Trait de terminaison
        $this->Cell( array_sum( $w ), 0, '', 'T' );
    }

    function ImprovedTable( $header, $data )
    {
        // Largeurs des colonnes
        $w = array( 40, 35, 45, 40 );
        // En tete
        for ( $i = 0; $i < count( $header ); $i ++ ) {
            $this->Cell( $w[$i], 7, $header[$i], 1, 0, 'C' );
        }
        $this->Ln();
        // Donnees
        foreach ( $data as $row ) {
            $this->Cell( $w[0], 6, $row[0], 'LR' );
            $this->Cell( $w[1], 6, $row[1], 'LR' );
            $this->Cell( $w[2], 6, number_format( $row[2], 0, ',', ' ' ), 'LR', 0, 'R' );
            $this->Cell( $w[3], 6, number_format( $row[3], 0, ',', ' ' ), 'LR', 0, 'R' );
            $this->Ln();
        }
        // Trait de terminaison
        $this->Cell( array_sum( $w ), 0, '', 'T' );
    }
}