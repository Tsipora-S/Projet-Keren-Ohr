<?php
/**
 * Vue gestion du planning et des activités
 *
 * PHP Version 7
 *
 * @category  Projet bachelor developpeur web
 * @package   Keren Ohr
 * @author    Tsipora Schvarcz
 */
?>
<div>
    <form action="index.php?uc=activites&action=ajouterActivite" 
          method="post" role="form">
        <button class="btn btn-secondary" type="submit">Nouvelle activité</button>
    </form>
    <form action="index.php?uc=activites&action=afficherPlanning" 
          method="post" role="form">
        <button class="btn btn-secondary" type="submit">Consulter le planning des activités</button>
    </form>
</div>
