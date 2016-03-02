<?php

/**
 * Description of ControllerUser
 *
 * @author christophe
 */
class ControllerVisitor {

    public function __construct() {
        global $vues;
        $dVueErreur = array();
        try {
            $action = $_REQUEST['action'];
            switch ($action) {
                case NULL:
                    $this->page_accueil();
                    break;
                case "biographie":
                    $this->biographie();
                    break;
                case "consulterNews":
                    $this->consulterNews();
                    break;

                case "gallerie":
                    $this->gallerie();
                    break;
                case "formulaireContact":
                    $this->formulaireContact();
                    break;
                case "video":
                    $this->video();
                    break;
                case "contact":
                    $this->contact();
                    break;
                case "connexion":
                    $this->connexion();
                    break;
                case "connexionAdmin":
                    $this->connexionAdmin();
                    break;
                case "photoGalerrie":
                    $this->photoGalerrie();
                    break;
                case "commenter":
                    $this->commenter();
                    break;
                default:
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

    public static function page_accueil() {
        global $vues;
        $ModeleNews = new ModeleNews();
        $listeNews = $ModeleNews->getAllNews();
        require $vues['accueil'];
    }

    public static function biographie() {
        global $vues;
        $ModelePersonnage = new ModelePersonnage();
        $listePersonnage = $ModelePersonnage->getAllPersonnage();
        require $vues['biographie'];
    }

    public static function gallerie() {
        global $vues;
        $modeleGallerie = new ModeleGalerie();
        $galleries = $modeleGallerie->getAllGalerie();
        require $vues['gallerie'];
    }

    public function video() {
        global $vues;
        require $vues['video'];
    }

    public function contact($erreurDonneFormulaire = null) {
        global $vues;
        require $vues['contact'];
    }

    public function connexion($erreurConnexion = null) {
        global $vues;
        require $vues['connexion'];
    }

    public function formulaireContact() {
        $nom = Nettoyer::NettoyageParType($_POST['nom'], 'string');
        $email = Nettoyer::NettoyageParType($_POST['email'], 'string');
        $tel = Nettoyer::NettoyageParType($_POST['tel'], 'string');
        $type = Nettoyer::NettoyageParType($_POST['type'], 'string');
        $previsite = Nettoyer::NettoyageParType($_POST['previsite'], 'string');
        $description = Nettoyer::NettoyageParType($_POST['description'], 'string');
        $tab = Validate::Arrayvalidation(array('email' => $email, 'tel' => $tel));
        if (!in_array(FALSE, $tab)) {
            $to = 'chuy.christophe@gmail.com';
            $subject = 'le sujet';
            $message = "nom: " . $nom . "\r\n" . "\r\n" . "email: " . $email . "\r\n" . "téléphone : " . $tel . "\r\n" . "type : " . $type . "\r\n" . "previsite : " . $previsite . "\r\n" . "description : " . $description;
            $message = wordwrap($message, 70, "\r\n");
            $headers = 'From: webmaster <webmaster@example.com>' . "\r\n" .
                    'Reply-To: webmaster <webmaster@example.com>' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();


            mail($to, $subject, $message, $headers);
        } else {
            $erreurDonneFormulaire = "donnée non valide";
            $this->contact($erreurDonneFormulaire);
        }
    }

    public function connexionAdmin() {
        $ModeleAdmin = new ModeleAdmin();
        $login = Nettoyer::NettoyageParType($_POST['login'], 'string');
        $mdp = Nettoyer::NettoyageParType($_POST['mdp'], 'string');
        if ($ModeleAdmin->connection($login, $mdp))
            ControllerVisitor::page_accueil();
        else {
            $connexionAdminErreur="Vous n'êtes pas inscrit en tant qu'administrateur";
            $this->connexion($connexionAdminErreur);
        }
    }

    public static function consulterNews() {
        global $vues;
        $id = Nettoyer::NettoyageParType($_REQUEST['idNews'], 'int');
        $modelenews = new ModeleNews();
        $news = $modelenews->getUneNews($id);
        require $vues['news'];
    }

    public function photoGalerrie() {
        global $vues;
        $id = Nettoyer::NettoyageParType($_REQUEST['id'], 'int');
        $modeleGalerie = new ModeleGalerie();
        $photoGal = $modeleGalerie->getUneGalerie($id);
        require $vues['photogal'];
    }

    public function commenter() {
        global $vues;
        $idNews = Nettoyer::NettoyageParType($_REQUEST['idNews'], 'int');
        $commentaire = Nettoyer::NettoyageParType($_POST['commentaire'], 'string');
        $modeleCommentaire = new ModeleCommentaire();
        $modeleCommentaire->ajouterCommentaire($commentaire, $idNews);
        $this->consulterNews();
    }

}
