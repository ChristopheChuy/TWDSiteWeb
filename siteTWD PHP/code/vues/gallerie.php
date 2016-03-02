<?php
if (isset($galleries)) {
    include 'header.php';
    ?>

    <p id="photo" style=text-align:center>
        <?php
        foreach ($galleries as $gallerie) {
            echo "<a href=\"index.php?action=photoGalerrie&id=" . $gallerie->getID() . "\"><img src=" . $gallerie->getURLImage() . " width=\"18%\" alt=\"Photo non disponible\"/></a>";
        }
        ?>
        <?php
        if (ModeleAdmin::isAdmin() != null) {
            echo "<div id = \"formulaire\">";
            echo "<form method = \"post\" action = \"index.php?action=ajoutGallerie\">";
            echo "<input class=\"forme\" type=\"text\" name=\"URLImage\" size=\"20\" value=\"URL de l'image\" maxlenght=\"10\" />";
            echo "<textarea class =  \"forme\" name = \"description\" rows = \"10\" cols = \"30\"> Description</textarea>";
            echo "<br/>";
            echo "<input class = \"forme\" type = \"submit\" size = \"5\" value = \"Ajouter\"/>";
            echo "</form>";
            echo "</div>";
        }
        ?>
    </p>
    <?php
    require 'footer.php';
} else {
    global $vues;
    $dVueErreur[] = "Impossible d'acceder aux news";
    require $vues['erreur'];
}


