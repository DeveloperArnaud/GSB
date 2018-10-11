    <!-- Division pour le sommaire -->
    <div id="menuGauche">
     <div id="infosUtil">
    
        <h2>
    
</h2>
    
      </div>  
        <ul id="menuList">
			<li >
                <?php
                if ($_SESSION['comptable'] != 1 ) {
                ?>
                Visiteur :<br>
                <?php echo $_SESSION['prenom'] . "  " . $_SESSION['nom'] ?>
            </li>
            <li class="smenu">
                <a href="index.php?uc=gererFrais&action=saisirFrais" title="Saisie fiche de frais ">Saisie fiche de
                    frais</a>
            </li>
            <li class="smenu">
                <a href="index.php?uc=etatFrais&action=selectionnerMois" title="Consultation de mes fiches de frais">Mes
                    fiches de frais</a>
            </li>
            <li class="smenu">
                <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
            </li>
        </ul>
        <?php
        }
        ?>



        <?php
        if ($_SESSION['comptable'] == 1) {
            ?>
        Comptable:<br/>
        <?php echo $_SESSION['prenom'] . " " . $_SESSION['nom']; ?>
        </li>
        <li class="smenu">
            <a href="index.php?uc=validationFicheFrais&action=selectionnerVisiteur" title="Valider fiche de frais">Valider fiche de frais</a>
        </li>
        <li class="smenu">
            <a href="index.php?uc=suiviPaiement&action=selectionnerFrais" title="Suivie du paiement des fiches de frais">Suivi fiche de frais</a>
        </li>
        <?php
        }
        ?>
        <li class="smenu">
            <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
        </li>
        </ul>
    </div>




    </div>

    
