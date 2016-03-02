<?php

/**
 * Description of ModelePersonnage
 *
 * @author christophe
 */
class ModelePersonnage {

    public function getAllPersonnage() {
        $pg = new PersonnageGateway(new Connexion(DSN, USERNAME, MDP));
        return $pg->getAllPersonnage();
    }

    public function ajouterPersonnage($nom, $age, $description, $URLImage) {
        $pg = new PersonnageGateway(new Connexion(DSN, USERNAME, MDP));
        $pg->insert($nom, $age, $description, $URLImage);
    }

    public function supprimerPersonne($id) {
        $pg = new PersonnageGateway(new Connexion(DSN, USERNAME, MDP));
        $pg->supprimer($id);
    }

    public function getUnPersonnage($id) {
        $pg = new PersonnageGateway(new Connexion(DSN, USERNAME, MDP));
        return $pg->getUnPersonnage($id);
    }

    public function modificationPersonnage($idPersonnage, $nom, $age, $URLImage, $description) {
        $pg = new PersonnageGateway(new Connexion(DSN, USERNAME, MDP));
        $pg->modificationPersonnage($idPersonnage, $nom, $age, $URLImage, $description);
    }

}
