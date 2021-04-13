<?php
/**
 * Index de l'application Keren Ohr
 *
 * PHP Version 7
 *
 * @category  Projet bachelor developpeur web
 * @package   Keren Ohr
 * @author    Tsipora Schvarcz
 */

require_once 'includes/fct.inc.php';
require_once 'includes/class.pdokeren.inc.php';
session_start(); 
$pdo = PdoKeren::getPdoKeren();
$estConnecte = estConnecte();
require 'vues/v_entete.php';

$uc = filter_input(INPUT_GET, 'uc', FILTER_SANITIZE_STRING);
if (empty($uc) && !$estConnecte) {
   $uc = 'connexion';
} else if (empty($uc)) {
   $uc = 'accueil';
}

switch ($uc) {
case 'connexion':
    include 'controleurs/c_connexion.php';
    break;
case 'accueil':
    include 'controleurs/c_accueil.php';
    break;
case 'genererDocuments':
    include 'controleurs/c_genererDocuments.php';
    break;
case 'gestionAdherents':
    include 'controleurs/c_gestionAdherents.php';
    break;
case 'activites':
    include 'controleurs/c_activites.php';
    break;
case 'coteAdherent':
    include 'controleurs/c_coteAdherent.php';
    break;
case 'deconnexion':
    include 'controleurs/c_deconnexion.php';
    break;
}
require 'vues/v_pied.php';
