<?php

/**
 * Description of ModeleGalerie
 *
 * @author christophe
 */
class ModeleGalerie {

    public function getAllGalerie() {
        $gg = new GalerieGateWay(new Connexion(DSN, USERNAME, MDP));
        return $gg->getAllGalerie();
    }

    public function getUneGalerie($id) {
        $gg = new GalerieGateWay(new Connexion(DSN, USERNAME, MDP));
        return $gg->getUneGalerie($id);
    }

    public function ajouterGalerie($description, $URLImage) {
        $gg = new GalerieGateWay(new Connexion(DSN, USERNAME, MDP));
        $gg->insert($description, $URLImage);
    }

    public function supprimerGalerie($id) {
        $gg = new GalerieGateWay(new Connexion(DSN, USERNAME, MDP));
        $gg->supprimer($id);
    }

}
