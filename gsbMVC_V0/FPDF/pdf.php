<?php
require('fpdf.php');

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'gsb');
class PDF extends FPDF
{
// En-tête
    function Header()
    {
        // Logo
        $this->Image("images/logogsb.jpg");
        $this->Ln(5);

        // Police Arial gras 15
        $this->SetFont('Arial','',12);
        // Décalage à droite
        $this->Cell(50);
        // Titre
        $this->Ln(20);
        $this->Cell(200,10,'Laboratoire Gwiss Bourdin Galaxy',0,0,'C');
        $this->Ln(10);

        //En tete


        // Saut de ligne
        $this->Ln(20);
        $this->SetFillColor(180,180,255);
        $this->Ln(5);
    }

// Pied de page
    function Footer()
    {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        // Police Arial italique 8
        $this->SetFont('Arial','I',8);
        // Numéro de page
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

// Instanciation de la classe dérivée



