<?php
/**
 * Gestion de la liste des adherents
 *
 * PHP Version 7
 *
 * @category  Projet bachelor developpeur web
 * @package   Keren Ohr
 * @author    Tsipora Schvarcz
 */
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
if (!$uc) {
    $uc = 'gestionAdherents';
}
switch ($action) {
    case 'ajOuConsultAdherent':
        include 'vues/v_gestionListeAdherents.php';
        break;
    case 'ajouterAdherent':
        $lesCategories=$pdo->getLesCategories(); 
        include 'vues/v_ajouterAdherent.php';
        break;
    case 'enregInfosEtMailBienvenue':
        $nom= filter_input(INPUT_POST, 'nom',FILTER_SANITIZE_STRING);
        $prenom= filter_input(INPUT_POST, 'prenom',FILTER_SANITIZE_STRING);
        $adresse= filter_input(INPUT_POST, 'adresse',FILTER_SANITIZE_STRING);
        $cp=filter_input(INPUT_POST, 'cp',FILTER_SANITIZE_STRING);
        $ville=filter_input(INPUT_POST, 'ville',FILTER_SANITIZE_STRING);
        $email=filter_input(INPUT_POST, 'email',FILTER_SANITIZE_EMAIL);
        $telFixe= filter_input(INPUT_POST, 'telFixe',FILTER_SANITIZE_STRING);
        $telPort= filter_input(INPUT_POST, 'telPort',FILTER_SANITIZE_STRING);
        $dateAdher= date('d/m/Y');
        $cat= filter_input(INPUT_POST, 'lstCategorie',FILTER_SANITIZE_STRING);
        $login=$nom;
        $mdp=$nom.rand(111,999);       
        var_dump($nom,$prenom,$login,$mdp,$adresse,$cp,$ville,$email,$telFixe,$telPort,$dateAdher,$cat);
        if($pdo->insertInfosNouvelAdherent($nom,$prenom,$adresse,$cp,$ville,$email,$telFixe,$telPort,$dateAdher,$cat)){
            $message='Le nouvel adhérent a bien été ajouté!';
            include 'vues/v_msgSucces.php';
        }
        include 'includes/class.mail.php';
        break;
    case 'consulterListe':
        $lesBeneficiaires=$pdo->getLesAdherents();
        $lesCles1=array_keys($lesBeneficiaires);
        $lesCategories=$pdo->getLesCategories(); 
        include 'vues/v_consulterListe.php';
        break;
    case 'modifierItem':
        $idBeneficiaire = filter_input(INPUT_POST, 'idBeneficiaire',FILTER_SANITIZE_STRING);
        $nom = filter_input(INPUT_POST, 'nom',FILTER_SANITIZE_STRING);
        $prenom = filter_input(INPUT_POST, 'prenom',FILTER_SANITIZE_STRING);
        $adresse = filter_input(INPUT_POST, 'adresse',FILTER_SANITIZE_STRING);
        $cp = filter_input(INPUT_POST, 'cp',FILTER_SANITIZE_STRING);
        $ville = filter_input(INPUT_POST, 'ville',FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email',FILTER_SANITIZE_STRING);
        $telPort = filter_input(INPUT_POST, 'telPort',FILTER_SANITIZE_STRING);
        $telFixe = filter_input(INPUT_POST, 'telFixe',FILTER_SANITIZE_STRING);
        $dateAdher = filter_input(INPUT_POST, 'dateAdher',FILTER_SANITIZE_STRING);
        $cat = filter_input(INPUT_POST, 'cat',FILTER_SANITIZE_STRING);
        var_dump($idBeneficiaire,$nom,$prenom,$adresse,$cp,$ville,$email,$telPort,$telFixe,$dateAdher,$cat);
        if($pdo->majCoordonneesBeneficiaire($idBeneficiaire,$nom,$prenom,$adresse,$cp,$ville,$email,$telPort,$telFixe,$dateAdher,$cat)){
            $message="La modification a bien été prise en compte";
            include 'vues/v_msgSucces.php';
        }
        $lesBeneficiaires=$pdo->getLesAdherents();
        include 'vues/v_consulterListe.php';
        break;
}
