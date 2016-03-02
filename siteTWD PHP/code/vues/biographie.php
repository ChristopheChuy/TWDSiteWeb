<?php
if (isset($listePersonnage)) {
    include 'header.php';
    ?>
    <div id="tab">
        <table>
            <?php
            echo "<tr>";
            echo "<th>Portrait</th>";
            echo "<th>Informations</th>";
            echo "</tr>";
            foreach ($listePersonnage as $personnage) {
                echo "<tr>";
                echo "<td class=\"rightbot\" rowspan=\"3\"><p style=\"text-align:center\"><img class=\"biopic\" src=" . $personnage->getURLImage() . " alt=\"Photo non disponible\"></p></td>";
                echo "<td><p style=\"text-align:center\">" . $personnage->getNom() . "</p></td>";
                echo "</tr>";
                echo " <tr>";
                echo " <td><p style = \"text-align:center\">" . $personnage->getAge() . "</p></td>";
                if (ModeleAdmin::isAdmin() != NULL)
                    echo "<td><a class=\"adminButton\" href=\"index.php?action=interfaceModifierPersonnage&idPersonnage=" . $personnage->getId() . "\">modifier</a></td>";
                echo " </tr>";
                echo "<tr>";
                echo " <td class = \"bot\"><p style = \"text-align:center\">" . $personnage->getDescription() . "</p></td>";
                if (ModeleAdmin::isAdmin() != NULL)
                    echo "<td><a class=\"adminButton\" href=\"index.php?action=supprimerPersonnage&idPersonnage=" . $personnage->getId() . "\">supprimer</a></td>";
                echo " </tr>";
            }
            ?>
        </table>
        <?php
        if (ModeleAdmin::isAdmin() != NULL)
            echo "<p style= \"text-align: center\"><a class=\"adminButton\" href=\"index.php?action=interfaceAjouterPersonne\">ajouter Personne</a></p>";
        ?>

        <br>
    </div>
    <?php
    require 'footer.php';
}else {
    global $vues;
    $dVueErreur[] = "Impossible d'acceder aux personnages";
    require $vues['erreur'];
}
