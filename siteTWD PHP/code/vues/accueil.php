<?php
if (isset($listeNews)) {
    include 'header.php';
    ?>
    <article id="art">
        <section id="secactu">
            <h2 id="titreact">Actualit&eacute;es :</h2>
            <?php
            if (!empty($listeNews)) {
                foreach ($listeNews as $news) {
                    echo "<a class=\"article\" href=\"index.php?action=consulterNews&idNews=" . $news->getNum() . "\">" . $news->getTitre() . "</a>";
                    echo "</br>";
                    echo substr("<a>" . $news->getDescription() . "</a>", 3, 80) . "...";
                    echo "</br>";
                    echo $news->getMisEnLigne();
                    echo "</br>";
                    if (ModeleAdmin::isAdmin() != NULL)
                        echo "<a class=\"adminButton\" href=\"index.php?action=supprimerNews&id=" . $news->getNum() . "\">supprimer La News</a>";
                    echo "</br></br>";
                }
            } else {
                echo 'Pas d\'actualit&eacute; pour le moment';
                echo "</br>";
            }
            if (ModeleAdmin::isAdmin() != NULL)
                echo "<p style= \"text-align: center\"><a class=\"adminButton\" href=\"index.php?action=ajouterNews\">ajouter News</a></p>";
            ?>
        </section>
        <section>
            <h2 id="titrenouv">Nouveaut&eacute;es :</h2>
            <div style="text-align:center">
                <h3 style=text-decoration:underline>DVD</h3>
                <p>Vente de DVD chez notre partenaire officel AMC a prix r&eacute;duit avec le code promo TWD2015</p>
            </div>
        </section>
    </article>

    <aside id="asi">
        <ul>
            <li><a class="pse" href=http://the-walking-dead.hypnoweb.net/episodes/saison-1.186.3/>R&eacute;sum&eacute; Saison 1</a></li>
            <li><a class="pse" href=http://the-walking-dead.hypnoweb.net/episodes/saison-2.186.4/>R&eacute;sum&eacute; Saison 2</a></li>
            <li><a class="pse" href=http://the-walking-dead.hypnoweb.net/episodes/saison-3.186.255/>R&eacute;sum&eacute; Saison 3</a></li>
            <li><a class="pse" href=http://the-walking-dead.hypnoweb.net/episodes/saison-4.186.438/>R&eacute;sum&eacute; Saison 4</a></li>
        </ul>
    </aside>
    <?php
    require 'footer.php';
}else {
    global $vues;
    $dVueErreur[] = "Impossible d'acceder aux news";
    require $vues['erreur'];
}
