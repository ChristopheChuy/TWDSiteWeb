
<?php
if (isset($news)) {
    include 'header.php';
    ?>
    <article id="artVueNews">

        <?php
        if (ModeleAdmin::isAdmin() != null) {
            echo "<form method=\"post\" action=\"index.php?action=modifierNews&idNews=" . $news->getNum() . "\">";
            echo "<LABEL for=\"titre\">titre : </LABEL>";
            echo "<br/>";
            echo "<textarea class = \"forme\" name = \"titre\" row = \"50\" cols=\"50\">" . $news->getTitre() . " </textarea>";
            echo "<br/>";
            echo "<LABEL for=\"image\">image : </LABEL>";
            if ($news->getURLImage() != NULL) {
                echo "<input class = \"forme\" type = \"text\" name = \"URLImage\" size = \"20\" value = " . $news->getURLImage() . " maxlenght = \"10\" />";
                echo "<INPUT type=\"checkbox\" name=\"image\"  value=\"oui\">sans image";
            } else {
                echo "<input class=\"forme\" type=\"text\" name=\"URLImage\" size=\"20\" value=\"URL de l'image\" maxlenght=\"10\" />";
                echo "<INPUT type=\"checkbox\" name=\"image\" checked value=\"oui\">sans image";
            }
            echo "<br/>";
            echo "<LABEL for=\"description\">description: </LABEL>";
            echo "<br/>";
            echo "<textarea class = \"forme\" name = \"description\" rows = \"10\" cols = \"50\">" . $news->getDescription() . "</textarea>";
            echo "<br/>";
            echo "<LABEL for=\"auteur\">auteur: </LABEL>";
            echo "<br/>";
            echo "<input class = \"forme\" type = \"text\" name = \"auteur\" size = \"8\" value = " . $news->getAuteur() . " maxlenght = \"4\" required/>";
            echo "<br/>";
            echo "<input class = \"forme\" type = \"submit\" size = \"5\" value = \"modifier\">";
            echo "</form>";
        }
        echo "<section id =\"secactu\">";
        echo "<h3 id = \"article\">" . $news->getTitre() . "</h3>";
        if ($news->getURLImage() != NULL)
            echo "<p ><img style=\"border: solid 3px #DDDDDD\" src=" . $news->getURLImage() . " width=\"100%\" alt=\"Photo non disponible\"/></p>";
        echo "<p id = \"article\">" . $news->getDescription() . "</em></p>";
        echo "<p id = \"article\">auteur : " . $news->getAuteur() . "</p>";
        echo "</section>";


        foreach ($news->getListCommentaire() as $commentaire) {
            echo "<section id=\"secactu\">";
            echo "<p id = \"article\">" . $commentaire->getCommentaire() . "</p>";
            echo "<p id = \"article\">auteur :" . $commentaire->getAuteur() . "</em></p>";
            echo "<p id = \"article\">Date :" . $commentaire->getDateCommentaire() . "</em></p>";
            if (ModeleAdmin::isAdmin() != null)
                echo "<a class=\"adminButton\" href=\"index.php?action=supprimerCommentaire&idCommentaire=" . $commentaire->getIdCommentaire() . "&idNews=" . $news->getNum() . "\">supprimer</a>";
            echo "</section>";
        }
        echo "</br>"
        ?>

        <section id="secactu">
            <?php
            echo "<form name=contact\" method=\"post\" action=\"index.php?action=commenter&idNews=" . $news->getNum() . "\">";
            ?>
            <textarea class="forme"  name="commentaire" rows="5" cols="50"> commentaire...</textarea> 
            <br/>
            <input class="forme" type="submit" size="5" value="Envoyer"/>
            </form>
        </section>


    </article>
    <?php
    require 'footer.php';
}else {
    global $vues;
    $dVueErreur[] = "Impossible d'acceder a la news";
    require $vues['erreur'];
}

