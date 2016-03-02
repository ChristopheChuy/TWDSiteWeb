<?php

/**
 * Description of modeleNews
 *
 * @author christophe
 */
class ModeleNews {

    public function getAllNews() {
        $ng = new NewsGateway(new Connexion(DSN, USERNAME, MDP));
        return $ng->getAllNews();
    }

    public function getUneNews($id) {
        $ng = new NewsGateway(new Connexion(DSN, USERNAME, MDP));
        return $ng->getUneNews($id);
    }

    public function ajouterNews($description, $titre, $auteur, $URLImage) {
        $ng = new NewsGateway(new Connexion(DSN, USERNAME, MDP));
        $ng->insert($description, $titre, $auteur, $URLImage);
    }

    public function supprimerNews($id) {
        $ng = new NewsGateway(new Connexion(DSN, USERNAME, MDP));
        $ng->supprimer($id);
    }

    public function modificationNews($idNews, $URLImage, $description, $auteur, $titre) {
        $ng = new NewsGateway(new Connexion(DSN, USERNAME, MDP));
        $ng->modificationNews($idNews, $URLImage, $description, $auteur, $titre);
    }

}
