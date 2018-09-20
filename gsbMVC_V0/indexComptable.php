<?php
require_once("include/fct.inc.php");
require_once ("include/class.pdogsb.inc.php");
include("vues/v_entete.php") ;
session_start();
$pdo = PdoGsb::getPdoGsb();
$estConnecte = estConnecteC();
if(!isset($_REQUEST['uc']) || !$estConnecte){
    $_REQUEST['uc'] = 'connexionComptable';
}

$uc = $_REQUEST['uc'];
switch($uc){

    case 'connexionComptable' : {
        include ("controleurs/c_connexion-comptable.php");
        break;
    }
    case 'gererFrais' :{
        include("controleurs/c_gererFrais.php");
        break;
    }
    case 'etatFrais' :{
        include("controleurs/c_etatFrais.php");
        break;
    }
}
include("vues/v_pied.php") ;
?>

