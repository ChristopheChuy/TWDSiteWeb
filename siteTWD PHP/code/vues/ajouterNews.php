<?php
include 'header.php';
?>
<div id="formulaire">
    <form method="post" action="index.php?action=ajoutNews">
        <input class="forme" type="text" name="titre" size="8" value="titre" maxlenght="4" required/>
        <br/>
        <textarea class="forme"  name="description" rows="10" cols="50"> Description</textarea> 
        <br/>
        <input class="forme" type="text" name="URLImage" size="8" value="URLImage" maxlenght="10" required/>
        <br/>
        <input class="forme" type="text" name="auteur" size="8" value="auteur" maxlenght="4" required/>
        <br/>
        <input class="forme" type="submit" size="5" value="Envoyer"/>
    </form>
</div>

<?php
require 'footer.php';
?>
