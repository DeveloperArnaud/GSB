<?php
$action = $_REQUEST['action'];
$idVisiteur = $_SESSION['idVisiteur'];
$mois = $_SESSION['leMois'];

switch ($action) {
    case 'pdf':



        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $mois);
        $lesInfosFicheFrais = $pdo->getLesInfosFicheFraisPdf($idVisiteur, $mois);
        $lesInfosUser=$pdo->getLesInfosFicheFraisUser($idVisiteur, $mois);
        $Lestotal = $pdo->getTotal($idVisiteur,$mois);
        $refuser = $pdo->getMontantRefuse($idVisiteur,$mois);
        $totalMontantRef = $pdo->getTotalMontantRefuse($idVisiteur, $mois);


        include("vues/v_pdf.php");
}

