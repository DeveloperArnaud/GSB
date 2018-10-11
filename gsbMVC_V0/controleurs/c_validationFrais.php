<?php

include('vues/v_sommaire.php');
$action = $_REQUEST['action'];
$tabVisiteurs = $pdo->getLesVisiteurs();
include ('vues/v_listeVisiteurs.php');

?>