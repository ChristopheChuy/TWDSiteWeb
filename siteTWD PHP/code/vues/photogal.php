<?php
if (isset($photoGal)) {
    include 'header.php';
    ?>
    <figure style=text-align:center>
        <?php
        echo "<img src=" . $photoGal->getURLImage() . " width=\"70%\"></a>";
        echo "<figcaption style=\" color: #CCCCCC;
      line-height:25px; font-weight:bold; \">" . $photoGal->getDescription() . "</figcaption>";
        ?>
    </figure>
    <br>
    <a class="pse" href="index.php?action=gallerie">Retour</a>
    <?php
    require 'footer.php';
} else {
    global $vues;
    $dVueErreur[] = "Impossible d'acceder a la donnée de la gallerie";
    require $vues['erreur'];
}