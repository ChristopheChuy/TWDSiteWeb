<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PersonnageGetway
 *
 * @author christophe
 */
class PersonnageGateway {

    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function insert($nom, $age, $description, $URLImage) {
        $query = 'INSERT INTO tpersonnage (nom,age,description,URLImage) values(:nom,:age,:description,:URLImage)';
        $this->con->executeQuery($query, array(
            ':nom' => array($nom, PDO::PARAM_STR),
            ':age' => array($age, PDO::PARAM_STR),
            ':description' => array($description, PDO::PARAM_STR),
            ':URLImage' => array($URLImage, PDO::PARAM_STR),
        ));
    }

    public function modificationPersonnage($idPersonnage, $nom, $age, $URLImage, $description) {
        $query = 'UPDATE tpersonnage SET nom = :nom , age = :age, description = :description, URLImage = :URLImage WHERE id = :id';
        $this->con->executeQuery($query, array(
            ':nom' => array($nom, PDO::PARAM_STR),
            ':age' => array($age, PDO::PARAM_STR),
            ':description' => array($description, PDO::PARAM_STR),
            ':URLImage' => array($URLImage, PDO::PARAM_STR),
            ':id' => array($idPersonnage, PDO::PARAM_INT),
        ));
    }

    public function supprimer($id) {
        $query = "DELETE FROM tpersonnage WHERE id=:id";
        $this->con->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT),
        ));
    }

    public function getAllPersonnage() {
        $query = 'Select * from tpersonnage';
        $this->con->executeQuery($query);
        return $this->mySqlPersonnage($this->con->getResults());
    }

    public function getUnPersonnage($idPersonnage) {
        $query = 'Select * from tpersonnage where id=:id';
        $this->con->executeQuery($query, array(
            ':id' => array($idPersonnage, PDO::PARAM_INT)));
        $listPersonnage = $this->mySqlPersonnage($this->con->getResults());
        
        return $listPersonnage['0'];
    }

    public function mySqlPersonnage($resultats) {
        $list_personnage = array();
        foreach ($resultats as $row) {
            $list_personnage[] = new Personnage($row['nom'], $row['age'], $row['description'], $row['id'], $row['URLImage']);
        }
        return $list_personnage;
    }

}
