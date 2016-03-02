<?php

/**
 * Description of config
 *
 * @author christophe
 */
$rep = __DIR__ . '/../';
//BD
define("DSN", 'mysql:host=localhost;dbname=chchuy');
define ("MDP",'');
define ("USERNAME",'root');

//vue
$vues['erreur'] = $rep . 'vues/VueErreur.php';
$vues['accueil'] = $rep . 'vues/accueil.php';
$vues['news']=$rep . 'vues/VueNews.php';
$vues['biographie']=$rep . 'vues/biographie.php';
$vues['gallerie']=$rep . 'vues/gallerie.php';
$vues['video']=$rep . 'vues/video.php';
$vues['contact']=$rep . 'vues/contacter.php';
$vues['connexion']=$rep . 'vues/connexion.php';
$vues['photogal']=$rep . 'vues/photogal.php';
$vues['ajouterNews'] = $rep . 'vues/ajouterNews.php';
$vues['ajoutPersonne'] = $rep . 'vues/ajoutPersonne.php';
$vues['modificationPersonne']=$rep . 'vues/modificationPersonne.php';