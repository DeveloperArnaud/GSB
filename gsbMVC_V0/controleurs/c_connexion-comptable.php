<?php
if(!isset($_REQUEST['action'])){
    $_REQUEST['action'] = 'demandeConnexionC';
}
$action = $_REQUEST['action'];
switch($action){
    case 'demandeConnexionC':{
        include("vues/v_connexion-comptable.php");
        break;
    }
    case 'valideConnexionC':{
        $login = $_REQUEST['login'];
        $mdp = $_REQUEST['mdp'];
        $comptable = $pdo->getInfosComptableC($login,$mdp);
        if(!is_array( $comptable)){
            ajouterErreur("Login ou mot de passe incorrect");
            include("vues/v_erreurs.php");
            include("vues/v_connexion-comptable.php");
        }
        else{
            $id = $comptable['id'];
            $nom =  $comptable['nom'];
            $prenom = $comptable['prenom'];
            connecterC($id,$nom,$prenom);
            include("vues/v_sommaire-comptable.php");
        }
        break;
    }
    default :{
        include("vues/v_connexion-comptable.php");
        break;
    }
}
?>