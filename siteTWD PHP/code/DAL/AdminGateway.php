<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminGateway
 *
 * @author chchuy
 */
class AdminGateway {

    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function getAllAdmin() {
        $query = 'Select * from tadmin';
        $this->con->executeQuery($query);
        return $this->mySqlAdmin($this->con->getResults());
    }
    
    public function mySqlAdmin($resultats) {
        $list_admin = array();
        foreach ($resultats as $row) {
            $list_admin[] = new Admin($row['login'], 'role');
        }
        return $list_admin;
    }
     public function verificationAdminPresence($login,$mdp) {
        $query = 'Select * from tadmin where login=:login AND mdp=:mdp ';
        $this->con->executeQuery($query,array(
            ':login' => array($login, PDO::PARAM_STR),
            ':mdp' => array($mdp, PDO::PARAM_STR)
           ));
        return empty($this->mySqlAdmin($this->con->getResults()));
    }
}
