<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of News
 *
 * @author chchuy
 */
class News {

    private $description;
    private $URLImage;
    private $titre;
    private $auteur;
    private $num;
    private $listCommentaire;
    private $misEnLigne;

    function __construct($description, $URLImage, $titre, $auteur, $num, $listCommentaire, $misEnLigne) {
        $this->description = $description;
        $this->URLImage = $URLImage;
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->num = $num;
        $this->listCommentaire = $listCommentaire;
        $this->misEnLigne = $misEnLigne;
    }
    function getMisEnLigne() {
        return $this->misEnLigne;
    }

    function setMisEnLigne($misEnLigne) {
        $this->misEnLigne = $misEnLigne;
    }

        function getURLImage() {
        return $this->URLImage;
    }

    function setURLImage($URLImage) {
        $this->URLImage = $URLImage;
    }

    function getDescription() {
        return $this->description;
    }

    function getNum() {
        return $this->num;
    }

    function getTitre() {
        return $this->titre;
    }

    function getAuteur() {
        return $this->auteur;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setTitre($titre) {
        $this->titre = $titre;
    }

    function setAuteur($auteur) {
        $this->auteur = $auteur;
    }

    function getListCommentaire() {
        return $this->listCommentaire;
    }

    function setListCommentaire($listCommentaire) {
        $this->listCommentaire = $listCommentaire;
    }

}

?>