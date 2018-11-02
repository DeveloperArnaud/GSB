<?php


require ('FPDF/pdf.php');
$pdf = new PDF('p', 'mm', 'A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 8);
$pdf->SetDrawColor(50, 50, 100);
$pdf->SetFont('Arial', '', 12);
foreach ( $lesFraisForfait as $unFraisForfait )
{
    $libelle = $unFraisForfait['libelle'];
    $pdf->Cell(25, 5,utf8_decode("Libellé : "). utf8_decode($libelle) , 0, 0);
    $pdf->Ln(5);

}


    foreach (  $lesFraisForfait as $unFraisForfait  ) {
        $quantite = $unFraisForfait['quantite'];

        $pdf->Cell(25, 5,utf8_decode("Quantité :").$quantite, 0, 0);
        $pdf->Ln(5);
    }

foreach (  $lesInfosFicheFrais as $unInfo  ) {
   $libEtat = $unInfo ['libEtat'];
   $dateModif=$unInfo['dateModif'];

    $pdf->Cell(25, 5, "Etat :" .utf8_decode($libEtat), 0, 0);
    $pdf->Ln(5);
    $pdf->Cell(25, 5,"Date de modification :" .$dateModif, 0, 0);
    $pdf->Ln(5);
}





foreach (  $lesFraisHorsForfait as $unFraisHorsForfait ) {
    $id = $unFraisHorsForfait['id'];
    $date = $unFraisHorsForfait['date'];
    $libelle2 = $unFraisHorsForfait['libelle'];
    $montant = $unFraisHorsForfait['montant'];


    $pdf->Ln(5);
    $pdf->Cell(25, 5,"Date de saisie :" . $date, 0, 0);
    $pdf->Ln(5);
    $pdf->Cell(25, 5, utf8_decode("Libellé hors forfait :") .utf8_decode($libelle2) , 0, 0);
    $pdf->Ln(5);
    $pdf->Cell(25, 5,utf8_decode("Montant :") .$montant , 0, 0);
    $pdf->Ln(5);
    $pdf->Cell(25);
    $pdf->Ln(5);
    ob_end_clean();
    $pdf->Output();

}




?>

