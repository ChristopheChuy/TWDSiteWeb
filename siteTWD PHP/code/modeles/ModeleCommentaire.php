<?php

/**
 * Description of ModeleCommentaire
 *
 * @author christophe
 */
class ModeleCommentaire {
    public function getAllCommentaire() {
        $cg = new CommentaireGateway(new Connexion(DSN, USERNAME, MDP));
        return $cg->getAllCommentaire();
    }
    public function getUneCommentaire($id) {
        $cg = new CommentaireGateway(new Connexion(DSN, USERNAME, MDP));
        return $cg->getUneCommentaire($id);
    }
    public function ajouterCommentaire($commentaire, $idNews) {
        $cg = new CommentaireGateway(new Connexion(DSN, USERNAME, MDP));
        return $cg->insert($commentaire, $idNews);
    }
    public function supprimerCommentaire($id) {
        $cg = new CommentaireGateway(new Connexion(DSN, USERNAME, MDP));
        return $cg->supprimerCommentaire($id);
    }
}
