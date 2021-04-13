<?php
/**
 * Vue informations de l'adhérent
 *
 * PHP Version 7
 *
 * @category  Projet bachelor developpeur web
 * @package   Keren Ohr
 * @author    Tsipora Schvarcz
 */
?>
<h2>Vos informations</h2>
<div class="col-md-4">
        <fieldset>       
            <div class="form-group">
                <label for="nom" required>Nom:</label>
                <input type="text" id="nom" name="nom" class="form-control" value="<?php echo $nom ?>">
                <label for="prenom" required>Prenom:</label>
                <input type="text" id="prenom" name="prenom" class="form-control" value="<?php echo $prenom ?>">
                <label for="adresse" required>Adresse:</label>
                <input type="text" id="adresse" name="adresse" class="form-control" value="<?php echo $adresse ?>">
                <label for="cp">Code postal:</label>
                <input type="text" id="cp" name="cp" class="form-control" value="<?php echo $cp ?>">
                <label for="ville">Ville:</label>
                <input type="text" id="ville" name="ville" class="form-control" value="<?php echo $ville ?>">
                <label for="email" required>Email:</label>
                <input type="text" id="email" name="email" class="form-control" value="<?php echo $email ?>">
                <label for="telFixe">Telephone fixe:</label>
                <input type="text" id="telFixe" name="telFixe" class="form-control" value="<?php echo $telFixe ?>">  
                <label for="telFixe" required>Telephone portable:</label>
                <input type="text" id="telPort" name="telPort" class="form-control" value="<?php echo $telPort ?>"> 
            </div>
        </fieldset>
</div>