<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModeleAdmin
 *
 * @author chchuy
 */
class ModeleAdmin {

    public static function isAdmin() {
        
        if (isset($_SESSION['login']) && isset($_SESSION['role'])) {
            $login = Nettoyer::NettoyageParType($_SESSION['login'], 'email');
            $role = Nettoyer::NettoyageParType($_SESSION['role'], 'string');
            return new Admin($login, $role);
        }
        return NULL;
    }

    public function connection($login, $mdp) {
        global $vues;
        $login = Nettoyer::NettoyageParType($login, 'email');
        $mdp = Nettoyer::NettoyageParType($mdp, 'string');
        $AdminGateway = new AdminGateway(new Connexion(DSN, USERNAME, MDP));
        if ($AdminGateway->verificationAdminPresence($login, $mdp)) {
            return FALSE;
        } else {
            $_SESSION['role'] = 'admin';
            $_SESSION['login'] = $login;
            return TRUE;
        }
    }

    public function deconnection() {
        session_unset();
        session_destroy();
        $_SESSION = array();
    }

}
