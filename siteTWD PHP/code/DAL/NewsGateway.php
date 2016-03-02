<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NewsGateway
 *
 * @author chchuy
 */
class NewsGateway {

    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function insert($description, $titre, $auteur, $URLImage) {
        $query = 'INSERT INTO tnews2 (titre,description,auteur,URLImage,misEnLigne) values(:titre,:description,:auteur,:URLImage,:date)';
        $this->con->executeQuery($query, array(
            ':titre' => array($titre, PDO::PARAM_STR),
            ':description' => array($description, PDO::PARAM_STR),
            ':auteur' => array($auteur, PDO::PARAM_STR),
            ':URLImage' => array($URLImage, PDO::PARAM_STR),
            ':date' => array(date('Y-n-d H:i:s'), PDO::PARAM_STR),
        ));
    }
    public function modificationNews($idNews, $URLImage, $description, $auteur,$titre){
         $query = 'UPDATE tnews2 SET titre=:titre, description = :description,auteur = :auteur,URLImage = :URLImage  WHERE id = :id';
         $this->con->executeQuery($query, array(
            ':titre' => array($titre, PDO::PARAM_STR),
            ':description' => array($description, PDO::PARAM_STR),
            ':auteur' => array($auteur, PDO::PARAM_STR),
            ':URLImage' => array($URLImage, PDO::PARAM_STR),
            ':id' => array($idNews, PDO::PARAM_INT),
        ));
    }
    public function supprimer($id) {
        $commentaireGateway = new CommentaireGateWay($this->con);
        $commentaireGateway->supprimerCommentairePourUneNewsDonner($id);
        $query = "DELETE FROM tnews2 WHERE id=:id";
        $this->con->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT)
        ));
    }

    public function getAllNews() {
        $query = 'Select * from tnews2';
        $this->con->executeQuery($query);
        return $this->mySqlNews($this->con->getResults());
    }

    public function getUneNews($id) {
        $query = 'Select * from tnews2 where id=:id';
        $this->con->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT)));
        $listnews = $this->mySqlNews($this->con->getResults());
        return $listnews['0'];
    }

    public function mySqlNews($resultats) {
        $list_news = array();
        foreach ($resultats as $row) {
            $CommentaireGateway = new CommentaireGateWay($this->con);
            $listCommentaire = $CommentaireGateway->getCommentairesPourUneNews($row['id']);
            $list_news[] = new News($row['description'], $row['URLImage'], $row['titre'], $row['auteur'], $row['id'], $listCommentaire, $row['misEnLigne']);
        }
        return $list_news;
    }

}
