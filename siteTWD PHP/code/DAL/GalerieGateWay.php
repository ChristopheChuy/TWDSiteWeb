<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GalerieGateWay
 *
 * @author christophe
 */
class GalerieGateWay {

    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function insert($description, $URLImage) {
        $query = 'INSERT INTO tgalerie(description,URLImage) values(:description, :URLImage)';
        $this->con->executeQuery($query, array(
            ':description' => array($description,  PDO::PARAM_STR),
            ':URLImage' => array($URLImage,  PDO::PARAM_STR),
        ));
    }

    public function supprimer($id) {
        $query = "DELETE FROM tgalerie WHERE id=$id";
        $this->con->executeQuery($query);
    }

    public function getAllGalerie() {
        $query = 'Select * from tgalerie';
        $this->con->executeQuery($query);
        return $this->mySqlGalerie($this->con->getResults());
    }

    public function getUneGalerie($id) {
        $query = 'Select * from tgalerie where id=:id';
        $this->con->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT)));
        $listGalerie = $this->mySqlGalerie($this->con->getResults());
        return $listGalerie[0];
    }

    public function mySqlGalerie($resultats) {
        $list_Galerie = array();
        foreach ($resultats as $row) {
            $list_Galerie[] = new Galerie($row['id'],$row['description'],$row['URLImage']);
        }
        return $list_Galerie;
    }

}
