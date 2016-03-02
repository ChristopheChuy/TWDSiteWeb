<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>Actu TWD - Accueil</title>

        <link rel="stylesheet" type="text/css" href="vues/css/const.css" media="all" />
        <link rel="stylesheet" type="text/css" href="vues/css/index800.css" media="screen and (max-width: 800px)" />
        <link rel="stylesheet" type="text/css" href="vues/css/index.css" media="screen and (min-width: 800px)" />
        <link rel="stylesheet" type="text/css" href="vues/css/video.css" media="all" />
        <link rel="stylesheet" type="text/css" href="vues/css/famille.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="vues/css/familleprint.css" media="print" />
        <link rel="stylesheet" type="text/css" href="vues/css/contact.css" media="screen" />
    </head>
    <body>
        <a href="https://www.facebook.com/"><img class="face" src="vues/image/facebook.png"/></a>
        <a href="https://twitter.com/"><img class="twit" src="vues/image/twitter.png"/></a>
        <div class="fond">
            <header>
                <a href="index.php"><img  src="vues/image/twd.jpeg" width="100%" alt="Photo non disponible"/></a>

                <h1 class="titre">The Walking Dead</h1>
                <div id="menu" >
                    <ul>
                        <li><a href="index.php">Accueil</a></li>

                        <li><a href="#">Medias</a>
                            <ul>
                                <li><a href="index.php?action=gallerie">Photos</a></li>
                                <li><a href="index.php?action=video">Video</a></li>
                            </ul>
                        </li>
                        <li><a href="index.php?action=biographie">Biographie</a></li>
                        <li id="cache"><a href="#">Résumer</a></li>
                        <li><a style="border-right:none" href="index.php?action=contact">Contact</a></li>
                            <?php
                            if (ModeleAdmin::isAdmin() == NULL)
                                echo " <li><a href=\"index.php?action=connexion\">Connexion</a></li>";
                            else
                                echo " <li><a href=\"index.php?action=deconnexion\">deconnexion</a></li>";
                            ?>
                    </ul>
                </div>
            </header>
