<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CommentaireGateWay
 *
 * @author christophe
 */
class CommentaireGateWay {

    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function insert($commentaire, $idNews) {
       //if ($this->testAjoutCommentaire($idNews)) {
            $query = 'INSERT INTO tcommentaire (commentaire,idNews, dateCommentaire) VALUES (:commentaire, :idNews,:date)';
            $this->con->executeQuery($query, array(
                ':commentaire' => array($commentaire, PDO::PARAM_STR),
                ':date' => array(date('Y-n-d H:i:s'), PDO::PARAM_STR),
                'idNews' => array($idNews, PDO::PARAM_INT),
            ));
      //  } else
        //    throw new Exception("taux de commentaire dépassé");
    }

    public function testAjoutCommentaire($idNews) {
        $query = 'select count(idCommentaire) FROM tcommentaire WHERE idNews=:idNews ';
        $this->con->executeQuery($query, array(
            'idNews' => array($idNews, PDO::PARAM_INT),
        ));
        $this->con->getResults();
    }

    public function supprimerCommentairePourUneNewsDonner($idNews) {
        $query = "DELETE FROM tcommentaire WHERE idNews=:id";
        $this->con->executeQuery($query, array(
            ':id' => array($idNews, PDO::PARAM_INT),
        ));
    }

    public function supprimerCommentaire($idCommentaire) {
        $query = "DELETE FROM tcommentaire WHERE idCommentaire=:id";
        $this->con->executeQuery($query, array(
            ':id' => array($idCommentaire, PDO::PARAM_INT),
        ));
    }

    public function getAllCommentaire() {
        $query = 'Select * from tcommentaire2';
        $this->con->executeQuery($query);
        return $this->mySqlCommentaire($this->con->getResults());
    }

    public function getCommentairesPourUneNews($id) {
        $query = 'Select * from tcommentaire where idNews=:id';
        $this->con->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT)));
        $listcommentaire = $this->mySqlCommentaire($this->con->getResults());
        return $listcommentaire;
    }

    public function mySqlCommentaire($resultats) {
        $list_commentaire = array();
        foreach ($resultats as $row) {
            $list_commentaire[] = new Commentaire($row['idCommentaire'], $row['commentaire'], $row['dateCommentaire'], $row['auteur']);
        }
        return $list_commentaire;
    }

}
