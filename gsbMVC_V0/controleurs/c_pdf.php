<?php
$action = $_REQUEST['action'];
$idVisiteur = $_SESSION['idVisiteur'];
$mois = $_SESSION['leMois'];

switch ($action) {
    case 'pdf':



        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $mois);
        $lesInfosFicheFrais = $pdo->getLesInfosFicheFraisPdf($idVisiteur, $mois);

        include("vues/v_pdf.php");
}

