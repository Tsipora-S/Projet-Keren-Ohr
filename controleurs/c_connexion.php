<?php
/**
 * Gestion de la connexion
 *
 * PHP Version 7
 *
 * @category  Projet bachelor developpeur web
 * @package   Keren Ohr
 * @author    Tsipora Schvarcz
 */
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
if (!$action) {
    $action = 'demandeconnexion';
}

switch ($action) {
case 'demandeConnexion':
    include 'vues/v_connexion.php';
    break;
case 'valideConnexion':
    $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
    $mdp = filter_input(INPUT_POST, 'mdp', FILTER_SANITIZE_STRING);
    $admin = $pdo->getInfosAdmin($login, $mdp);
    $adherent=$pdo->getInfosAdherent($login, $mdp);
    
    if (!is_array($admin)&& !is_array($adherent)){ 
        ajouterErreur('Login ou mot de passe incorrect');
        include 'vues/v_erreurs.php';
        include 'vues/v_connexion.php';
     } else {
        if (is_array($admin))
            {
                $id = $admin['id'];
                $nom = $admin['nom'];
                $prenom = $admin['prenom'];
                $statut='admin';
            }
            elseif (is_array($adherent))
            {
                $id = $adherent['id'];
                $nom = $adherent['nom'];
                $prenom = $adherent['prenom'];
                $statut='adherent';
            }
           connecter($id,$nom,$prenom,$statut);
           header('Location: index.php');
       }
   break;
default:
    include 'vues/v_connexion.php';
    break;
}

