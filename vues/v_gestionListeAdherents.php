<?php
/**
 * Vue gestion des adherents
 *
 * PHP Version 7
 *
 * @category  Projet bachelor developpeur web
 * @package   Keren Ohr
 * @author    Tsipora Schvarcz
 */
?>
<div>
    <form action="index.php?uc=gestionAdherents&action=ajouterAdherent" 
          method="post" role="form">
        <button class="btn btn-secondary" type="submit">Nouvel adhérent</button>
    </form>
    <form action="index.php?uc=gestionAdherents&action=consulterListe" 
          method="post" role="form">
        <button class="btn btn-secondary" type="submit">Consulter la liste des adhérents</button>
    </form>
</div>