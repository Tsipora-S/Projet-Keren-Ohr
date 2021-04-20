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
        $lesLieuxDeVac = $pdo->getLieuxVacs();
        include 'vues/v_choixDocument.php';
        break;
    case 'genereDocument':
        $idBeneficiaire= filter_input(INPUT_POST, 'lstBeneficiaires', FILTER_SANITIZE_STRING);
        $infosBeneficiaire= $pdo->getInformationsAdherent($idBeneficiaire); //nom et prenom ayant été selectionné
        $nom= $infosBeneficiaire['nom'];
        $prenom= $infosBeneficiaire['prenom'];
        $adresse= $infosBeneficiaire['adresse'];
        $cp= $infosBeneficiaire['cp'];
        $ville= $infosBeneficiaire['ville'];
        if(isset($_POST['btnCheque'])){
            $montantCheque= filter_input(INPUT_POST, 'montantCheque',FILTER_SANITIZE_STRING);
            $dateValiditeCheque=filter_input(INPUT_POST, 'dateValiditeCheque',FILTER_SANITIZE_STRING);
            include 'includes/class.pdf.php';
        }
        if(isset($_POST['btnBon'])){
            $idLieu=filter_input(INPUT_POST, 'lstLieuxVacs',FILTER_SANITIZE_STRING);
            $lieu=$pdo->getNomLieu($idLieu);
            $montant= filter_input(INPUT_POST, 'montant',FILTER_SANITIZE_STRING);
            $dateValidite=filter_input(INPUT_POST, 'dateValidite',FILTER_SANITIZE_STRING);
            include 'includes/class.pdfBon.php';
        }
        break;
}
