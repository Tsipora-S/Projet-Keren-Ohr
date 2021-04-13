<?php
/**
 * Fonctions pour l'application Euroforma
 *
 * PHP Version 7
 *
 * @category  Stages 2eme année
 * @package   Euroforma
 * @author    Tsipora Schvarcz
 * @author    Beth Sefer
 */

/**
 * Teste si un quelconque utilisateur est connecté
 *
 * @return vrai ou faux
 */
function estConnecte()
{
    return isset($_SESSION['idUtilisateur']);//isset: question: Est qu il y a un IdUtilisateur dans la SuperGlobable ?(vrai ou faux?)
}
function estAdminConnecte()
{
   if (estConnecte()){
       return ($_SESSION['statut']== 'admin');
   }  
}

function estAdherentConnecte()
{
   if (estConnecte()){
       return ($_SESSION['statut']== 'adherent');
   }  
}
/**
* Ajoute le libellé d'une erreur au tableau des erreurs
*
* @param String $msg Libellé de l'erreur
*
* @return null
*/
function ajouterErreur($msg)
{
   if (!isset($_REQUEST['erreurs'])) {
       $_REQUEST['erreurs'] = array();
   }
   $_REQUEST['erreurs'][] = $msg;
}
/**
* Enregistre dans une variable session les infos d'un utilisateur
*
* @param String $nom        Nom du utilisateur
*
* @return null
*/
function connecter($idUtilisateur,$nom,$prenom,$statut)
{
  $_SESSION['idUtilisateur'] = $idUtilisateur;
   $_SESSION['nom'] = $nom;
   $_SESSION['prenom'] = $prenom;
   $_SESSION['statut'] = $statut;
}
/**
 * Détruit la session active
 *
 * @return null
 */
function deconnecter()
{
    session_destroy();
}
/**
 * Retourne le mois au format aaaamm selon le jour dans le mois
 *
 * @param String $date au format  jj/mm/aaaa
 *
 * @return String Mois au format aaaamm
 */
function getMois($date)
{
    @list($jour, $mois, $annee) = explode('/', $date);
    unset($jour);//retire la variable jour pour obtenir le mois et l'année.
    if (strlen($mois) == 1) {//strlen=verifie le nombre de caractères. Ex:si mois=6, on va mettre 06.
        $mois = '0' . $mois;
    }
    return $mois."/".$annee;
}
function getDateAc($date)
{
    @list($jour, $mois, $annee) = explode('/', $date);
    if (strlen($mois) == 1) {//strlen=verifie le nombre de caractères. Ex:si mois=6, on va mettre 06.
        $mois = '0' . $mois;
    }
    return $jour."/".$mois."/".$annee;
}
function cal($month , $year , $lang , $type){
     // recuperation des arguments 
      $numargs = func_num_args(); 
      if ($numargs == 2) 
      { 
      $type = "list"; 
      $lang = "en"; 
      } 
      if ($numargs == 3) 
      { 
      $type = "list"; 
      $lang = func_get_arg(2); 
      } 
      if ($numargs >= 4) 
      { 
      $type = func_get_arg(3); 
      $lang = func_get_arg(2); 
      } 
      setlocale(LC_TIME, $lang); 
      if (checkdate($month, 1, $year) != TRUE) 
      return; 
      $nbdays = date("t", mktime(0, 0, 0, $month, 1, $year)); 
      if (strcmp($type, "array") == 0) 
      { 
      // recuperation du jour de la semaine ( 0 = dimanche, ... ) 
      $one = date("w", mktime(0, 0, 0, $month, 1, $year)); 
      // on remplit la 1e ligne avec le nom des jours 
      for ($i = 1; $i <= 7; $i++) 
      $c[0][$i-1] = strftime("%a", mktime(0, 0, 0, 10, $i, 2000)); 
      // puis on remplit le calendrier 
      for ($i = 1; $i <= $nbdays; $i++) 
      $c[(($one+$i-1)/7)+1][($one+$i-1)%7] = $i; 
      return $c; 
      } 
      if (strcmp($type, "list") == 0) 
      { 
      // on remplit la liste avec les jours de la semaine 
      for ($i = 1; $i <= $nbdays; $i++) 
       $l[$i] = strftime("%A", mktime(0, 0, 0, $month, $i, $year)); 
      return $l; 
      
     } 
    }