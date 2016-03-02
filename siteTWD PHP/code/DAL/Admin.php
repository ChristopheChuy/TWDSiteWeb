<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin
 *
 * @author chchuy
 */
class Admin {
    private $login;
    function __construct($login, $role) {
        $this->login = $login;
        $this->role = $role;
    }
    function getLogin() {
        return $this->login;
    }

    function getRole() {
        return $this->role;
    }
    function setLogin($login) {
        $this->login = $login;
    }

    function setRole($mdp) {
        $this->role = $role;
    }


}
