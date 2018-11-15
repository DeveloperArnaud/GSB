
<?php
include('vues/v_sommaire.php');
$action = $_REQUEST['action'];
$tabVisiteurs = $pdo->getLesVisiteurs();
include ('vues/v_listeVisiteurs.php');
switch ($action) {
    case "voirEtatFrais":
        $idVisiteur = $_POST['lstVisiteur'];
        $_SESSION['idVisiteur'] = $idVisiteur;
        $leMois = $_POST['lstMois'];
        $_SESSION['leMois'] = $leMois;
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);
        $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $leMois);
        $numAnnee = substr($leMois, 0, 4);
        $numMois = substr($leMois, 4, 2);
        $libEtat = $lesInfosFicheFrais['libEtat'];
        $montantValide = $lesInfosFicheFrais['montantValide'];
        $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
        $dateModif = $lesInfosFicheFrais['dateModif'];
        $dateModif = dateAnglaisVersFrancais($dateModif);
        $Lestotal = $pdo->getTotal($idVisiteur,$leMois);
        $totalMontantRef = $pdo->getTotalMontantRefuse($idVisiteur, $leMois);
        $readOnly = "";
        $button = "<tr></tr></tr><td class='qteForfait'><input type='submit' value='Modifier'></td>";
        $report = "<td><input type='submit' name='btnReportRefus' value='Reporter'><br/>";
        $refuser = "<input type='submit' name='btnReportRefus' value='Refuser'></td>";
        $valider = 1;
        $lesJustificatifs= $pdo->getNbJustificatifs($idVisiteur,$leMois);
        if ((empty($lesFraisForfait)) && (empty($lesFraisHorsForfait))) {
            include("vues/v_pasDeFicheFrais.php");
        } else {
            include("vues/v_etatFrais.php");
        }
        break;
    case "validFrais":
        $idVisiteur = $_SESSION['idVisiteur'];
        $lesFrais = $_REQUEST['lesFrais'];
        $leMois = $_SESSION['leMois'];
        $pdo->majFraisForfait($idVisiteur, $leMois, $lesFrais);
        include("vues/v_affichModif.php");
        break;
    case "reportRefus":
        $reportRefus = $_POST['btnReportRefus'];
        $id = $_POST['id'];
        $libelle = $_POST['libelle'];
        $leMois = $_SESSION['leMois'];
        $idVisiteur = $_SESSION['idVisiteur'];
        if ($reportRefus == 'Refuser' && !preg_match("/REFUSE :/", $libelle)) {
            $pdo->majFraisHorsForfait($libelle, $id);
            include("vues/v_refus.php");
        } else {
            if ($reportRefus == 'Reporter') {
                $pdo->reportFraisHorsForfait($id, $leMois, $idVisiteur);
                include('vues/v_update.php');
            }
        }
        break;

    case "validFiche":
        $idVisiteur = $_SESSION['idVisiteur'];
        $mois = $_SESSION['leMois'];
        $pdo->majEtatFicheFrais($idVisiteur, $mois, 'VA');
//$tabMontant = $pdo->getLesMontants();
        $tabQuantites = $pdo->getLesQuantites($idVisiteur, $mois);

        $montant = 0;
        foreach ($tabQuantites as $row) {
            $montant += ($row['montant'] * $row['quantite']);

        }
        $montantHorsForfait = $pdo->getMontantHorsForfait($idVisiteur, $mois);
        $montant += $montantHorsForfait[0];
        $pdo->majMontantValide($idVisiteur, $mois, $montant);
        include("vues/v_valide.php");
        break;

    case "reportRefus":
        $reportRefus = $_POST['btnReportRefus'];
        $id = $_POST['id'];
        $libelle = $_POST['libelle'];
        $leMois = $_SESSION['leMois'];
        $idVisiteur = $_SESSION['idVisiteur'];
        if ($reportRefus == 'Refuser' && !preg_match("/REFUSE :/", $libelle)) {
            $pdo->majFraisHorsForfait($libelle, $id);
            include("vues/v_refus.php");
        } else {
            if ($reportRefus == 'Reporter') {
                $pdo->reportFraisHorsForfait($id, $leMois, $idVisiteur);
                include('vues/v_update.php');
            }
        }
        break;




}


include("vues/v_pied.php");
?>
