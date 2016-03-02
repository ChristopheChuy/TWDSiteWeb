
<?php
if (isset($personnage)) {
    include 'header.php';
    ?>
    <div id="formulaire">
        <?php
        echo "<form method=\"post\" action=\"index.php?action=modifierPersonnage&idPersonnage=" . $personnage->getId() . "\">";

        echo "<input class = \"forme\" type = \"text\" name = \"nom\" size = \"8\" value = " . $personnage->getNom() . " maxlenght = \"4\" required/>";
        echo "<br/>";
        echo "<input class = \"forme\" type = \"number\" name = \"age\" size = \"8\" value = " . $personnage->getAge() . " maxlenght = \"4\" required/>";
        echo "<br/>";
        if ($personnage->getURLImage() != NULL) {
            echo "<input class = \"forme\" type = \"text\" name = \"URLImage\" size = \"20\" value = " . $personnage->getURLImage() . " maxlenght = \"10\" />";
            echo "<INPUT type=\"checkbox\" name=\"image\"  value=\"oui\">sans image";
        } else {
            echo "<input class=\"forme\" type=\"text\" name=\"URLImage\" size=\"20\" value=\"URL de l'image\" maxlenght=\"10\" />";
            echo "<INPUT type=\"checkbox\" name=\"image\" checked value=\"oui\">sans image";
        }


        echo "<br/>";
        echo "<textarea class = \"forme\" name = \"description\" rows = \"10\" cols = \"30\">" . $personnage->getDescription() . "</textarea>";
        echo "<br/>";
        ?>
        <input class = "forme" type = "submit" size = "5" value = "Envoyer">
        </form>
    </div>

    <?php
    require 'footer.php';
} else {
    global $vues;
    $dVueErreur[] = "Impossible d'acceder au personnage";
    require $vues['erreur'];
}