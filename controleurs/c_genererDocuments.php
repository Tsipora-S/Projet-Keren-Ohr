<?php
/**
 * Generation des documents
 *
 * PHP Version 7
 *
 * @category  Projet bachelor developpeur web
 * @package   Keren Ohr
 * @author    Tsipora Schvarcz
 */
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
if (!$uc) {
    $uc = 'genererDocuments';
}
switch ($action) {
    case 'choixBeneficiaire':
        $lesBeneficiaires=$pdo->getLesAdherents();
        $lesCles=array_keys($lesBeneficiaires);
        $beneficiaireASelectionner=$lesCles[0];
        include 'vues/v_choixBeneficiaire.php';
        break;
    case 'choixDocument':
        $idBeneficiaire = filter_input(INPUT_POST, 'lstBeneficiaires', FILTER_SANITIZE_STRING);
        $lesBeneficiaires=$pdo->getLesAdherents();
        $beneficiaireASelectionner = $idBeneficiaire;
        include 'vues/v_choixDocument.php';
        if(isset($_POST['btnCheque'])){ // trouver autre solution pour afficher cheque te bon sur mm page que choix, pr pouvoir garder l'idBeneficiaire!
            include 'vues/v_genererChequeAlimentaire.php';
        }
        if(isset($_POST['btnBon'])){
            $lesLieuxDeVac = $pdo->getLieuxVacs();
            include 'vues/v_genererBonVacances.php';
        }
        break;
    case 'genererChequeAlimentaire':
        //Recuperer l'adresse, le nom et le prenom en fonction du beneficaire qui a été selectionné à v_choixBeneficiaire.
        $idBeneficiaire = filter_input(INPUT_POST, 'lstBeneficiaires', FILTER_SANITIZE_STRING);
        $lesBeneficiaires=$pdo->getLesAdherents();
        $beneficiaireASelectionner = $idBeneficiaire;
        var_dump($beneficiaireASelectionner);
        /*$lesBeneficiaires=$pdo->getLesAdherents();
        var_dump($lesBeneficiaires['adresse']);*/
        include 'vues/v_genererChequeAlimentaire.php';
        break;
    case 'enregCheque':
        $lesBeneficiaires=$pdo->getLesAdherents();
     //   $idBeneficiaire = filter_input(INPUT_POST, 'lstBeneficiaires', FILTER_SANITIZE_STRING);
        include 'includes/class.pdf.php';
        break;
    case 'genererBonDeVacances':
        $lesLieuxDeVac = $pdo->getLieuxVacs();
        include 'vues/v_genererBonVacances.php';
        break;
    case 'enregBonVac':
        include 'includes/class.pdfBon.php'; 
        break;
}
