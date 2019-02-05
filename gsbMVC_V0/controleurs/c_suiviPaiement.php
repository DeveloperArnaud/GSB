<?php
include("vues/v_sommaire.php");
$action = $_REQUEST['action'];
$lesFichesFrais = $pdo->getFichesFraisValidees();
include("vues/v_lstFicheFrais.php");
switch ($action) {
case 'voirFicheFrais':
$idEtMois = explode("/", $_POST['lstFicheFrais']);
$idVisiteur = $idEtMois[0];
$_SESSION['idVisiteur'] = $idVisiteur;
$leMois = $idEtMois[1];
$_SESSION['leMois'] = $leMois;
$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
$lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);
$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $leMois);
$Lestotal = $pdo->getTotal($idVisiteur,$leMois);
$totalMontantRef = $pdo->getTotalMontantRefuse($idVisiteur, $leMois);
$numAnnee = substr($leMois, 0, 4);
$numMois = substr($leMois, 4, 2);
$libEtat = $lesInfosFicheFrais['libEtat'];
$montantValide = $lesInfosFicheFrais['montantValide'];
$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
$dateModif = $lesInfosFicheFrais['dateModif'];
$dateModif = dateAnglaisVersFrancais($dateModif);
$readOnly = "readOnly='readOnly'";
$button = "";
$report = "";
$refuser = "";
$valider = 2;
    $lesJustificatifs= $pdo->getNbJustificatifs($idVisiteur,$leMois);
if ((empty($lesFraisForfait)) && (empty($lesFraisHorsForfait))) {
include("vues/v_pasDeFicheFrais.php");
} else {
include("vues/v_etatFrais.php");
}
break;
case 'remboursement':
$idVisiteur = $_SESSION['idVisiteur'];
$mois = $_SESSION['leMois'];
$pdo->majEtatFicheFrais($idVisiteur, $mois, 'RB');
include("vues/v_rembourse.php");
}
include("vues/v_pied.php");
?>