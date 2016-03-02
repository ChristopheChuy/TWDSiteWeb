<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Commentaire
 *
 * @author christophe
 */
class Commentaire {

    private $idCommentaire;
    private $commentaire;
    private $dateCommentaire;
    private $auteur;

    function __construct($idCommentaire, $commentaire, $dateCommentaire, $auteur) {
        $this->idCommentaire = $idCommentaire;
        $this->commentaire = $commentaire;
        $this->dateCommentaire = $dateCommentaire;
        $this->auteur = $auteur;
    }
    function getAuteur() {
        return $this->auteur;
    }

    function setAuteur($auteur) {
        $this->auteur = $auteur;
    }

        function getIdCommentaire() {
        return $this->idCommentaire;
    }

    function getCommentaire() {
        return $this->commentaire;
    }

    function getDateCommentaire() {
        return $this->dateCommentaire;
    }

    function setIdCommentaire($idCommentaire) {
        $this->idCommentaire = $idCommentaire;
    }

    function setCommentaire($commentaire) {
        $this->commentaire = $commentaire;
    }

    function setDateCommentaire($dateCommentaire) {
        $this->dateCommentaire = $dateCommentaire;
    }

}
