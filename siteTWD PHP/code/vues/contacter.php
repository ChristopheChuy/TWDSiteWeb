
<?php
include 'header.php';
?>
<div id="formulaire">
    <h3 id="form"> Formulaire de contact : </h3>
    <form method="post" action="index.php?action=formulaireContact">
        <input class="forme" type="text" name="nom" size="8" value="Nom" maxlenght="4" required/>
        <br/>
        <input class="forme" type="email" name="email" size="15" value="Email" maxlenght="4" required/>
        <br/>
        <input class="forme" type="tel" name="tel" size="12" value="Telephone" maxlenght="4"/>
        <br/>
        <select name="type" size="5">
            <option value="bug" selected>Bug</option>
            <option value="amelioration">Amélioration</option>
            <option value="autres">Autres</option>
            <br/>

            <input class="forme" type="radio" name="previsite" size="1" value="oui"/>Première visite
            <br/>
            <input class="forme" type="radio" name="previsite" size="1" value="non"/>Pas première visite
            <br/>
            <textarea class="forme"  name="description" rows="4" cols="20"> Description</textarea> 
            <br/>
            <input class="forme" type="submit" size="5" value="Envoyer"/>
    </form>
    <?php
    if (isset($erreurDonneFormulaire)) {
        echo $erreurDonneFormulaire;
    }
    ?>
</div>
<?php
require 'footer.php';
?>

