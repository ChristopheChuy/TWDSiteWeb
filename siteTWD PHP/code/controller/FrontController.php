<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FrontController
 *
 * @author christophe
 */
class FrontController {

    public function __construct() {
        session_start();
        $listeAction_Admin = array('deconnexion', 'supprimerNews', 'supprimerPersonnage', 'ajouterNews', 'ajoutNews', 'supprimerCommentaire', 'ajoutPersonne', 'interfaceAjouterPersonne', 'interfaceModifierPersonnage', 'modifierPersonnage', 'modifierNews','ajoutGallerie');
        try {
            $a = ModeleAdmin::isAdmin();
            if (in_array($_REQUEST['action'], $listeAction_Admin)) {
                if ($a == null) {
                    global $vues;
                    require $vues['connexion'];
                } else
                    new ControllerAdmin();
            } else
                new ControllerVisitor();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

}
