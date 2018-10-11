<h2>Validation des fiches frais</h2>

    <form>
        <select>
        <div class="corpsForm">
            <p>
<?php
foreach($tabVisiteurs as $unVisiteur){

?>

    <option value=<?php $unVisiteur['id']?> ><?php echo $unVisiteur['nom'] ." ".$unVisiteur['prenom']?></option>


<?php
}
?>
            <p>
</select>
</div>
</form>
