<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControllerAdmin
 *
 * @author chchuy
 */
class ControllerAdmin {

    public function __construct() {

        global $vues;
        $dVueErreur = array();
        if (ModeleAdmin::isAdmin() == null) {
            throw new Exception("vous n'êtes pas admin");
        }
        try {
            $action = $_REQUEST['action'];
            switch ($action) {
                case NULL:
                    $this->page_accueil();
                    break;
                case "deconnexion":
                    $this->deconnexion();
                    break;
                case "supprimerNews":
                    $this->supprimerNews();
                    break;
                case "ajoutNews":
                    $this->ajoutNews();
                    break;
                case "ajouterNews":
                    $this->ajouterNews();
                    break;
                case "interfaceAjouterPersonne":
                    $this->interfaceAjouterPersonne();
                    break;
                case "ajoutPersonne":
                    $this->ajoutPersonne();
                    break;
                case "supprimerCommentaire":
                    $this->supprimerCommentaire();
                    break;
                case "supprimerPersonnage":
                    $this->supprimerPersonnage();
                    break;
                case "interfaceModifierPersonnage":
                    $this->interfaceModifierPersonnage();
                    break;
                case "modifierPersonnage":
                    $this->modifierPersonnage();
                    break;
                case "modifierNews":
                    $this->modifierNews();
                    break;
                case "ajoutGallerie":
                    $this->ajoutGallerie();
                    break;
                default :
                    $dVueErreur[] = "Erreur d'appel php";
                    require $vues['erreur'];
                    break;
            }
        } catch (PDOException $ex) {
            $dVueErreur[] = "Erreur connection BDD";
            require $vues['erreur'];
        } catch (Exception $ex) {
            $dVueErreur[] = $ex->getMessage();
            require $vues['erreur'];
        }
    }

    public function deconnexion() {
        $ModeleAdmin = new ModeleAdmin();
        $ModeleAdmin->deconnection();
        ControllerVisitor::page_accueil();
    }

    public function supprimerNews() {
        $id = Nettoyer::NettoyageParType($_REQUEST['id'], 'int');
        $modeleNews = new ModeleNews();
        $modeleNews->supprimerNews($id);
        ControllerVisitor::page_accueil();
    }

    public function ajouterNews() {
        global $vues;
        require $vues['ajouterNews'];
    }

    public function ajoutNews() {
        $titre = Nettoyer::NettoyageParType($_POST['titre'], 'string');
        $description = Nettoyer::NettoyageParType($_POST['description'], 'string');
        $auteur = Nettoyer::NettoyageParType($_POST['auteur'], 'string');
        $URL = Nettoyer::NettoyageParType($_POST['URLImage'], 'string');
        $modeleNews = new ModeleNews();
        $modeleNews->ajouterNews($description, $titre, $auteur, $URL);
        ControllerVisitor::page_accueil();
    }

    public function supprimerCommentaire() {
        $idCommentaire = Nettoyer::NettoyageParType($_REQUEST['idCommentaire'], 'int');
        $modeleCommentaire = new ModeleCommentaire();
        $modeleCommentaire->supprimerCommentaire($idCommentaire);
        ControllerVisitor::consulterNews();
    }

    public function ajoutPersonne() {
        $nom = Nettoyer::NettoyageParType($_POST['nom'], 'string');
        $age = Nettoyer::NettoyageParType($_POST['age'], 'int');
        $URLImage = Nettoyer::NettoyageParType($_POST['URLImage'], 'string');
        $description = Nettoyer::NettoyageParType($_POST['description'], 'string');
        $modelePersonne = new ModelePersonnage();
        $modelePersonne->ajouterPersonnage($nom, $age, $description, $URLImage);
        ControllerVisitor::biographie();
    }

    public function interfaceAjouterPersonne() {
        global $vues;
        require $vues['ajoutPersonne'];
    }

    public function supprimerPersonnage() {
        $id = Nettoyer::NettoyageParType($_REQUEST['idPersonnage'], 'int');
        $modelePersonnage = new ModelePersonnage();
        $modelePersonnage->supprimerPersonne($id);
        ControllerVisitor::biographie();
    }

    public function interfaceModifierPersonnage() {
        global $vues;
        $idPersonnage = Nettoyer::NettoyageParType($_REQUEST['idPersonnage'], 'int');
        $modelePersonnage = new ModelePersonnage();
        $personnage = $modelePersonnage->getUnPersonnage($idPersonnage);
        require $vues['modificationPersonne'];
    }

    public function modifierPersonnage() {

        $idPersonnage = Nettoyer::NettoyageParType($_REQUEST['idPersonnage'], 'int');
        $nom = Nettoyer::NettoyageParType($_POST['nom'], 'string');
        $age = Nettoyer::NettoyageParType($_POST['age'], 'int');
        $image = Nettoyer::NettoyageParType($_POST['image'], 'string');
        if ($image != oui) {
            $URLImage = Nettoyer::NettoyageParType($_POST['URLImage'], 'string');
        } else {
            $URLImage = NULL;
        }
        $description = Nettoyer::NettoyageParType($_POST['description'], 'string');
        $modelePersonnage = new ModelePersonnage();
        $personnage = $modelePersonnage->modificationPersonnage($idPersonnage, $nom, $age, $URLImage, $description);
        ControllerVisitor::biographie();
    }

    public function modifierNews() {
        $idNews = Nettoyer::NettoyageParType($_REQUEST['idNews'], 'int');
        $titre = Nettoyer::NettoyageParType($_POST['titre'], 'string');
        $image = Nettoyer::NettoyageParType($_POST['image'], 'string');
        if ($image != oui) {
            $URLImage = Nettoyer::NettoyageParType($_POST['URLImage'], 'string');
        } else {
            $URLImage = NULL;
        }
        $description = Nettoyer::NettoyageParType($_POST['description'], 'string');
        $auteur = Nettoyer::NettoyageParType($_POST['auteur'], 'string');

        $modeleNews = new ModeleNews();
        $modeleNews->modificationNews($idNews, $URLImage, $description, $auteur, $titre);
        ControllerVisitor::consulterNews();
    }

    public function ajoutGallerie() {
        global  $vues;
        $URLImage = Nettoyer::NettoyageParType($_REQUEST['URLImage'], 'String');
        $description = Nettoyer::NettoyageParType($_REQUEST['description'], 'String');
        if (file_exists($URLImage)) {
            $modeleGateway = new ModeleGalerie();
            $modeleGateway->ajouterGalerie($description, $URLImage);
        } else {
            $dVueErreur[] = "le fichier ".$URLImage." n'existe pas";
            require $vues['erreur'];
            
        }
        ControllerVisitor::gallerie();
    }

}
