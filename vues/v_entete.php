<?php
/**
 * Vue entete
 *
 * PHP Version 7
 *
 * @category  Projet bachelor developpeur web
 * @package   Keren Ohr
 * @author    Tsipora Schvarcz
 */
?>
<!DOCTYPE html>
<html lang="fr-FR">
  <head>
      <meta charset="UTF-8">
      <title>Keren Ohr</title>
      <meta name="description" content="">
      <meta name="author" content="Tsipora Schvarcz">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link href="./styles/style.css" rel="stylesheet">
  </head>

  <body>
      <div class="container">
          <?php
          $uc = filter_input(INPUT_GET, 'uc', FILTER_SANITIZE_STRING);
          $estAdminConnecte= estAdminConnecte();
          $estAdherentConnecte= estAdherentConnecte();
          if ($estAdminConnecte) {
              ?>
          <div class="header">
              <div class="row vertical-align">
                  <div class="col-md-4">
                      <h1>
                          <img src="./images/logo.png" class="img-responsive"
                               alt="Keren Ohr"
                               title="Keren Ohr">
                      </h1>
                  </div>
                  <div class="col-md-8">
                      <ul class="nav nav-pills pull-right" role="tablist">
                          <li <?php if (!$uc || $uc == 'accueil') { ?>class="active" <?php } ?>>
                              <a href="index.php">
                                  Accueil
                              </a>
                          </li>
                          <li <?php if ($uc == 'genererDocuments') { ?>class="active"<?php } ?>>
                              <a href="index.php?uc=genererDocuments&action=choixBeneficiaire">   
                                  Generer documents
                              </a>
                          </li>
                          <li <?php if ($uc == 'gestionAdherents') { } ?>>
                              <a href="index.php?uc=gestionAdherents&action=ajOuConsultAdherent">
                                  Gestion des adherents
                              </a>
                          </li>
                          <li <?php if ($uc == 'activites') { } ?>>
                              <a href="index.php?uc=activites&action=choixAjoutOuConsult"> 
                                  Activités
                              </a>
                          </li>
                          <li
                          <?php if ($uc == 'deconnexion') { ?>class="active"<?php } ?>>
                              <a href="index.php?uc=deconnexion&action=demandeDeconnexion">
                                  Déconnexion
                              </a>
                          </li>
                      </ul>
                  </div>
                    </div>
          </div>
          <?php
  }else if($estAdherentConnecte){
                ?>
          <div class="header">
              <div class="row vertical-align">
                  <div class="col-md-4">
                      <h1>
                          <img src="./images/logo.png" class="img-responsive"
                               alt="Keren Ohr"
                               title="Keren Ohr">
                      </h1>
                  </div>
                  <div class="col-md-8">
                      <ul class="nav nav-pills pull-right" role="tablist">
                          <li <?php if (!$uc || $uc == 'accueil') { ?>class="active" <?php } ?>>
                              <a href="index.php">
                                  Accueil
                              </a>
                          </li>
                          <li <?php if ($uc == '') { ?>class="active"<?php } ?>>
                              <a href="index.php?uc=coteAdherent&action=infos">   
                                  Mes informations
                              </a>
                          </li>
                          <li <?php if ($uc == '') { } ?>>
                              <a href="index.php?uc=coteAdherent&action=activites">
                                  Mes activités
                              </a>
                          </li>
                          <li
                          <?php if ($uc == 'deconnexion') { ?>class="active"<?php } ?>>
                              <a href="index.php?uc=deconnexion&action=demandeDeconnexion">
                                  Déconnexion
                              </a>
                          </li>
                      </ul>
                  </div>
                    </div>
          </div>
 <?php
          } else {
              ?>  
              <h1>
                  <img src="./images/logo.png"
                       class="img-responsive center-block"
                       alt="Keren Ohr"
                       title="Keren Ohr">
              </h1>
<?php
          }
          ?>
          <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      </body>