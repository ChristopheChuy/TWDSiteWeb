<?php
include 'header.php';
?>
<div id="formulaire">
    <form method="post" action="index.php?action=ajoutPersonne">
        <input class="forme" type="text" name="nom" size="8" value="nom" maxlenght="4" required/>
        <br/>
        <input class="forme" type="number" name="age" size="8" value="age" maxlenght="4" required/>
        <input class="forme" type="text" name="URLImage" size="8" value="URLImage" maxlenght="10" required/>
        <br/>
        <textarea class="forme"  name="description" rows="10" cols="50"> Description</textarea> 
        <br/>
        <input class="forme" type="submit" size="5" value="Envoyer"/>
    </form>
</div>

<?php
require 'footer.php';
?>

