<?php
/**
 * Coté adherent
 *
 * PHP Version 7
 *
 * @category  Projet bachelor developpeur web
 * @package   Keren Ohr
 * @author    Tsipora Schvarcz
 */
$idAdherent= $_SESSION['idUtilisateur'];
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
if (!$uc) {
    $uc = 'coteAdherent';
}
switch ($action) {
    case 'infos':  
        $infosAdherent = $pdo->getLesInfosAdherent($idAdherent);
        var_dump($infosAdherent);
        $nom= $infosAdherent['nom'];
        $prenom= $infosAdherent['prenom'];
        $adresse= $infosAdherent['adresse'];
        $cp= $infosAdherent['cp'];
        $ville= $infosAdherent['ville'];
        $email= $infosAdherent['email'];
        $telFixe= $infosAdherent['telFixe'];
        $telPort= $infosAdherent['telPort'];
        include 'vues/v_infosAdherent.php';
        break;
    case 'activites':   
        $infosAdherent = $pdo->getLesInfosAdherent($idAdherent);
        $idCategorie = $infosAdherent['idcategorie'];
        $dateActuelle = date('d/m/Y');
        var_dump($dateActuelle);
        $activite=$pdo->getActiviteSuivante($idCategorie,$dateActuelle);
        include 'vues/v_activitesAdherent.php';
        break;
}


