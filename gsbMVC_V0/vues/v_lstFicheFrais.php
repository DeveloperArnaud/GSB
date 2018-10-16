<div id="contenu">
    <h2>Suivi du paiement</h2>
    <h3>Fiche frais &agrave; selectionner : </h3>
    <form action="index.php?uc=suiviPaiement&action=voirFicheFrais" method="post">
        <div class="corpsForm">
            <p>
                <label for="lstFicheFrais" accesskey="n">Fiche :</label>
                <select id="lstFicheFrais" name="lstFicheFrais">
                    <?php
                    foreach ($lesFichesFrais as $uneFicheFrais) {
                        $id = $uneFicheFrais['id'];
                        $nom = $uneFicheFrais['nom'];
                        $prenom = $uneFicheFrais['prenom'];
                        $mois = $uneFicheFrais['mois'];
                        ?>
                        <option value="<?php echo $id . "/" . $mois; ?>"><?php echo $prenom . " " . $nom . " " . $mois ?></option>
                        <?php
                    }
                    ?>
                </select>
            </p>
        </div>
        <div class="piedForm">
            <p>
                <input id="ok" type="submit" value="Valider" size="20" />
                <input id="annuler" type="reset" value="Effacer" size="20" />
            </p>
        </div>
    </form> 