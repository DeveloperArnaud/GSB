<div id="contenu">
    <h2>Validation des Fiches de Frais</h2>
    <h3>Fiche &agrave; s&eacute;lectionner</h3>
    <form action="index.php?uc=validationFicheFrais&action=voirEtatFrais" method="post">
        <div class="corpsForm">
            <p>
                <label for="lstVisiteur" accesskey="n">Visiteurs : </label>
                <select id="lstVisiteur" name="lstVisiteur">
                    <?php
                    foreach ($tabVisiteurs as $unVisiteur) {
                        ?>
                        <option value="<?php echo $unVisiteur['id']; ?>"><?php echo $unVisiteur['prenom'] . " " . $unVisiteur['nom']; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </p>
            <p>
                <label for="lstMois">Mois : </label>

                <select id="lstMois" name="lstMois">
                    <?php
                    $tableauMois = getSixDernierMois();
                    for ($i = 0; $i < count($tableauMois); $i++) {
                        $leMois = substr($tableauMois[$i], 4, 2);
                        $lAnnee = substr($tableauMois[$i], 0, 4);
                        ?>
                        <option value=<?php echo $tableauMois[$i]; ?>><?php echo $leMois . "/" . $lAnnee; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </p>
        </div>
        <div class="piedForm">
            <p>
                <input id="ok" type="submit" value="Valider" size="20" />
            </p>
        </div>
    </form>