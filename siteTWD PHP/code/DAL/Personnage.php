<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Personnage
 *
 * @author christophe
 */
class Personnage {

    private $nom;
    private $URLImage;
    private $description;
    private $age;
    private $id;

    function __construct($nom, $age, $description, $id, $URLImage) {
        $this->nom = $nom;
        $this->description = $description;
        $this->age = $age;
        $this->id = $id;
        $this->URLImage = $URLImage;
    }

    function getURLImage() {
        return $this->URLImage;
    }

    function getId() {
        return $this->id;
    }

    function setURLImage($URLImage) {
        $this->URLImage = $URLImage;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getNom() {
        return $this->nom;
    }

    function getDescription() {
        return $this->description;
    }

    function getAge() {
        return $this->age;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setAge($age) {
        $this->age = $age;
    }

}
