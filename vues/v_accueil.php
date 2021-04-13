<?php
/**
 * Vue accueil
 *
 * PHP Version 7
 *
 * @category  Projet bachelor developpeur web
 * @package   Keren Ohr
 * @author    Tsipora Schvarcz
 */

$estAdminConnecte = estAdminConnecte();
$estAdherentConnecte = estAdherentConnecte();
?>
<div id="accueil" style="text-align: center">
    <h2>
        Accueil<small> - Bonjour
            <?php 
            echo  $_SESSION['nom'].'!' 
            ?></small>
    </h2>
</div>
<?php
if($estAdminConnecte){
?>
        <div class="row">
            <div class="col-md-12">        
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 col-md-12" style="text-align: center">
                            <a href="index.php?uc=genererDocuments&action=choixBeneficiaire"
                               class="btn btn-success btn-lg" role="button">
                                <span class="glyphicon glyphicon-pencil"></span>
                                <br>Generer documents</a>
                            <a href="index.php?uc=gestionAdherents&action=ajOuConsultAdherent"
                               class="btn btn-primary btn-lg" role="button">
                                <span class="glyphicon glyphicon-list-alt"></span>
                                <br>Gestion des adhérents</a>
                            <a href="index.php?uc=activites&action=choixAjoutOuConsult"
                               class="btn btn-success btn-lg" role="button">
                                <span class="glyphicon glyphicon-pencil"></span>
                                <br>Activités</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php 
}else if($estAdherentConnecte){
    ?>
            <div class="row">
                <div class="col-md-12">        
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-md-12" style="text-align: center">
                                <a href="index.php?uc=coteAdherent&action=infos"
                                   class="btn btn-success btn-lg" role="button">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                    <br>Mes informations</a>
                                <a href="index.php?uc=coteAdherent&action=activites"
                                   class="btn btn-success btn-lg" role="button">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                    <br>Mes Activités</a>
                                <a href="index.php?uc=coteAdherent&action="
                                   class="btn btn-success btn-lg" role="button">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                    <br>Demande de chèque alimentaire (à voir)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php 
    }
?>