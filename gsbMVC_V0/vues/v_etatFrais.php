
<h3>Fiche de frais du mois <?php echo $numMois."-".$numAnnee?> : 
    </h3>
    <div class="encadre">
    <p>
        Etat : <?php echo $libEtat?> depuis le <?php echo $dateModif?> <br> Montant validé : <?php echo $montantValide?>
              
                     
    </p>
        <form method="post" action="index.php?ud=validationFicheFrais&action=validFrais"></form>
  	<table class="listeLegere">
  	   <caption>Eléments forfaitisés </caption>
        <tr>
         <?php
         foreach ( $lesFraisForfait as $unFraisForfait ) 
		 {
			$libelle = $unFraisForfait['libelle'];
		?>	
			<th> <?php echo $libelle?></th>
		 <?php
        }
		?>
		</tr>
        <tr>
        <?php
          foreach (  $lesFraisForfait as $unFraisForfait  ) 
		  {
				$quantite = $unFraisForfait['quantite'];
		?>
                <td class="qteForfait"><?php echo $quantite?> </td>
		 <?php
          }
		?>
		</tr>
    </table>
  	<table class="listeLegere">
  	   <caption>Descriptif des éléments hors forfait -<?php echo $nbJustificatifs ?> justificatifs reçus -
       </caption>
             <tr>
                <th class="date">Date</th>
                <th class="libelle">Libellé</th>
                <th class='montant'>Montant</th>                
             </tr>
        <?php      
          foreach ( $lesFraisHorsForfait as $unFraisHorsForfait ) 
		  {
			$date = $unFraisHorsForfait['date'];
			$libelle = $unFraisHorsForfait['libelle'];
			$montant = $unFraisHorsForfait['montant'];

		?>
             <tr>
                 <form method="post" action="index.php?uc=validationFicheFrais&action=reportRefus">
                     <input type="text" name ="id" hidden="hidden" value="<?php echo $id ?> " >
                <td><input type ="text" name="date" readonly="readonly" value="<?php echo $date ?>"/> </td>
                <td>><input type ="text" name="date" readonly="readonly" value="<?php echo $libelle ?>"/></td>
                <td>><input type ="text" name="date" readonly="readonly" value="<?php echo $montant ?>"/></td>
                 </form>
             </tr>
        <?php 
          }
		?>
    </table>
  </div>
  </div>
 













