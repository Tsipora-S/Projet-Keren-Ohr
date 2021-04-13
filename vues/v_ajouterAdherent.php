<?php
/**
 * Vue ajout d'un adhérent
 *
 * PHP Version 7
 *
 * @category  Projet bachelor developpeur web
 * @package   Keren Ohr
 * @author    Tsipora Schvarcz
 */
?>
<div class="row">    
    <h2>Ajouter un adhérent</h2>
    <div class="col-md-4">
        <form method="post" 
              action="index.php?uc=gestionAdherents&action=enregInfosEtMailBienvenue" 
              role="form">
            <fieldset>       
                    <div class="form-group">
                        <label for="nom" required>Nom:</label>
                        <input type="text" id="nom" name="nom" class="form-control">
                        <label for="prenom" required>Prenom:</label>
                        <input type="text" id="prenom" name="prenom" class="form-control">
                        <label for="adresse" required>Adresse:</label>
                        <input type="text" id="adresse" name="adresse" class="form-control">
                        <label for="cp">Code postal:</label>
                        <input type="text" id="cp" name="cp" class="form-control">
                        <label for="ville">Ville:</label>
                        <input type="text" id="ville" name="ville" class="form-control">
                        <label for="email" required>Email:</label>
                        <input type="text" id="email" name="email" class="form-control">
                        <label for="telFixe">Telephone fixe:</label>
                        <input type="text" id="telFixe" name="telFixe" class="form-control">  
                        <label for="telFixe" required>Telephone portable:</label>
                        <input type="text" id="telPort" name="telPort" class="form-control">  
                        <label for="lstCategorie">Catégorie:</label>
                        <select id="lstCategorie" name="lstCategorie" class="form-control">
                            <?php
                            foreach ($lesCategories as $uneCat) {
                                $id = $uneCat['id'];
                                $libelle = $uneCat['libelle'];
                                    ?>
                                    <option selected value="<?php echo $id ?>">
                                        <?php echo $libelle ?> </option>
                                    <?php
                            }
                            ?> 
                        </select>
                    </div>
                <button class="btn btn-success" type="submit">Ajouter</button>
                <button class="btn btn-danger" type="reset">Effacer</button>
            </fieldset>
        </form>
    </div>
</div>
