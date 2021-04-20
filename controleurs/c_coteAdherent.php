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
        $infosAdherent = $pdo->getInformationsAdherent($idAdherent);
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
        $infosAdherent = $pdo->getInformationsAdherent($idAdherent);
        $idCategorie = $infosAdherent['idcategorie'];
        $dateActuelle = date('d/m/Y');
        $activiteSuivante=$pdo->getActiviteSuivante($idCategorie,$dateActuelle);
        var_dump($activiteSuivante);
        $mois=getMois($dateActuelle);
        var_dump($mois);
        $lesMois = getLesSixMoisSuivants($mois);
        $lesCles=array_keys($lesMois);
        $moisASelectionner=$lesCles[0];
        include 'vues/v_listeMois.php';
        include 'vues/v_activitesAdherent.php';
        break;
    case 'afficherActivitesDeMoisChoisi':
        $moisChoisi= filter_input(INPUT_POST, 'lstMois',FILTER_SANITIZE_STRING);
        var_dump($moisChoisi);
        $mois=getMois(date('d/m/Y'));
        $lesMois = getLesSixMoisSuivants($mois);
        $lesCles=array_keys($lesMois);
        $moisASelectionner=$lesCles[0];
        $activitesPrCeMois=$pdo->getActivites($moisChoisi);
        var_dump($activitesPrCeMois);
        if(!$activitesPrCeMois){
            ajouterErreur("Pas d'activités pour le mois séléctionné");
            include 'vues/v_erreurs.php';
            include 'vues/v_listeMois.php';
        }
        else{
            ?>
            <h5><?php echo $activitesPrCeMois['libelle'].": ".$activitesPrCeMois['etat'];?></h5>
            <?php
        }
        break;
}


