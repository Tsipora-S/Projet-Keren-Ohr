<?php
/**
 * Vue gestion des activités
 *
 * PHP Version 7
 *
 * @category  Projet bachelor developpeur web
 * @package   Keren Ohr
 * @author    Tsipora Schvarcz
 */
?>
<!-- Planning des activités + bouton nouvelle activité -->
<div class="row">    
    <h2>Ajouter une activité</h2>
    <div class="col-md-4">
        <form method="post" 
              action="index.php?uc=activites&action=confirmationAjout" 
              role="form">
            <fieldset>       
                    <div class="form-group">
                        <label for="libelle" required>Libelle:</label>
                        <input type="text" id="libelle" name="libelle" class="form-control">
                        <label for="date" required>Date:</label>
                        <input type="text" id="date" name="date" class="form-control">
                        <label for="lstCategorie">Catégorie concernée:</label>
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