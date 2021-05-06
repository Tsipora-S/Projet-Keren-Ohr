<?php
/**
 * Gestion des activités
 *
 * PHP Version 7
 *
 * @category  Projet bachelor developpeur web
 * @package   Keren Ohr
 * @author    Tsipora Schvarcz
 */
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
if (!$uc) {
    $uc = 'activites';
}
switch ($action) {
    case 'choixAjoutOuConsult':
        include 'vues/v_ajoutOuConsultActivites.php';
        break;
    case 'ajouterActivite':
        $lesCategories=$pdo->getLesCategories();
        include 'vues/v_gestionActivites.php';
        break;
    case 'confirmationAjout':
        $lesCategories=$pdo->getLesCategories();
        $libelle= filter_input(INPUT_POST, 'libelle',FILTER_SANITIZE_STRING);
        $date= filter_input(INPUT_POST, 'date',FILTER_SANITIZE_STRING);
        $cat= filter_input(INPUT_POST, 'lstCategorie',FILTER_SANITIZE_STRING);
        $pdo->insertActivite($libelle,$date,$cat);
        echo "L'activité a bien été ajoutée.";
        include 'vues/v_gestionActivites.php';
        break;
    case 'afficherPlanning':
        $month= getMois(date('d/m/Y'));
        $m= substr($month,4,2);
        $y= substr($month,0,4);
        /*$datesMois=cal($mois, $annee, 'en', 'list');
        var_dump($datesMois);*/
        include 'vues/v_affichePlanning.php';
        break;
}