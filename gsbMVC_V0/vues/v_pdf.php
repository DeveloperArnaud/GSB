<?php


require ('FPDF/pdf.php');
$pdf = new PDF('p', 'mm', 'A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 8);
$pdf->SetDrawColor(50, 50, 100);
$pdf->SetFont('Arial', '', 12);

foreach ($lesInfosUser as $unUser) {
    $nom=$unUser['nom'];
    $prenom= $unUser['prenom'];

    $pdf->Cell(25, 5,utf8_decode("Visiteur: ").$nom." ".$prenom, 0, 0);
}
$pdf->Ln(5);
$pdf->Ln(5);
$pdf->Cell(35,5,utf8_decode("Autres frais" ), 0, 0);
$pdf->Ln(5);

$pdf->Cell(75, 5,utf8_decode("Libellé ") , 1, 0);
$pdf->Cell(30, 5,utf8_decode("Montant ") , 1, 0);
$pdf->Cell(30, 5,utf8_decode("Date ") , 1, 0);
foreach (  $lesFraisHorsForfait as $unFraisHorsForfait ) {
    $id = $unFraisHorsForfait['id'];
    $date = $unFraisHorsForfait['date'];
    $libelle2 = $unFraisHorsForfait['libelle'];
    $montant = $unFraisHorsForfait['montant'];
    $pdf->Ln(5);

    $pdf->Cell(75, 5,utf8_decode($libelle2) , 1, 0);

    $pdf->Cell(30, 5, $montant , 1, 0);

    $pdf->Cell(30, 5,$date, 1, 0);
}
$pdf->Ln(5);
$pdf->Ln(5);


$pdf->Ln(5);
$pdf->Ln(5);

foreach ($lesInfosUser as $unUser) {
    $mois= $unUser['mois'];

    $pdf->Cell(25, 5,utf8_decode("Mois: ").$mois, 0, 0);
}
$pdf->Ln(5);
$pdf->Cell(35,5,utf8_decode("Frais forfaitaires" ), 1, 0);
foreach ( $lesFraisForfait as $unFraisForfait )
{
    $libelle = $unFraisForfait['libelle'];
    $montant=$unFraisForfait['montant'];
    $pdf->Cell(40,5, utf8_decode($libelle) , 1, 0);
}
$pdf->Ln(5);
$pdf->Cell(35,5,utf8_decode("Montant Unitaire" ), 1, 0);
foreach ( $lesFraisForfait as $unFraisForfait )
{
    $montant=$unFraisForfait['montant'];
    $pdf->Cell(40,5, utf8_decode($montant) , 1, 0);
}

$pdf->Ln(5);

$pdf->Cell(35,5,utf8_decode("Quantité" ), 1, 0);

    foreach (  $lesFraisForfait as $unFraisForfait  ) {
        $quantite = $unFraisForfait['quantite'];

        $pdf->Cell(40, 5,$quantite, 1, 0);
    }
$pdf->Ln(5);
$pdf->Cell(35,5,utf8_decode("Total" ), 1, 0);
foreach (  $lesFraisForfait as $unFraisForfait  ) {
    $quantite = $unFraisForfait['quantite'];
    $montant=$unFraisForfait['montant'];
    $total= $quantite*$montant;
    $pdf->Cell(40, 5,$total, 1, 0);
}
$pdf->Ln(5);


foreach ($Lestotal as $unTotal) {
    $leTotal= $unTotal['total'];
    $pdf->Ln(5);
    $pdf->Cell(40, 5,"Total frais forfaitaire : " .$leTotal. "euro(s)", 0);
}




foreach (  $lesInfosFicheFrais as $unInfo  ) {
   $libEtat = $unInfo ['libEtat'];
   $dateModif=$unInfo['dateModif'];
   $nbJustificatifs=$unInfo['nbJustificatifs'];
   $montantValide = $unInfo['montantValide'];
    $pdf->Ln(5);
    $pdf->Ln(5);

    $pdf->Cell(25, 5,utf8_decode("Total (autres frais) :").$montantValide .utf8_decode("euro(s)"), 0, 0);
    $pdf->Ln(5);


    $pdf->Text(145, 5, "Etat :" .utf8_decode($libEtat));


    $pdf->Text(5, 5,"Date de modification :" .$dateModif);

    $pdf->Ln(5);
}

foreach ($totalMontantRef as $unTotalRef) {
        $unTotalRefus=$unTotalRef['montantTotalRef'];
}
$pdf->Cell(40, 5,utf8_decode("Montant refusé : "). $unTotalRefus, 0, 0);

$pdf->Ln(5);
$tglob = ($leTotal+$montantValide) - $unTotalRefus;
$pdf->Cell(40, 5,"Total global :". $tglob ." euro(s)", 0);

$pdf->Ln(5);
$date = new DateTime('now');
$pdf->Ln(5);
$pdf->Cell(5, 5,"Fait ".utf8_decode("à")." Paris le :" .$date->format("d/m/Y"));

ob_end_clean();
$pdf->Output();





?>

