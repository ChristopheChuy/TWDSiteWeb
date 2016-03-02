<?php
include 'header.php';
?>
<div id="formulaire">
    <h3 id="form"> page de connexion </h3>
    <form name="contact" method="post" action="index.php?action=connexionAdmin">
        <input class="forme" type="text" name="login" size="8" value="login" maxlenght="4" required/>
        <br/>

        <input class="forme" type="password" name="mdp" size="5" required/>
        <input class="forme" type="submit" size="5" value="Envoyer"/>
    </form>
    <?php
    if (isset($erreurConnexion))
        echo $erreurConnexion;
    ?>
</div>
<?php
require 'footer.php';
?>

