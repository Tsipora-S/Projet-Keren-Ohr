<?php
/**
 * Vue Generer bon de vacances
 *
 * PHP Version 7
 *
 * @category  Projet bachelor developpeur web
 * @package   Keren Ohr
 * @author    Tsipora Schvarcz
 */
?>
<div class="row">    
    <h2>Générer un bon de vacances</h2>
    <div class="col-md-4">
        <form method="post" 
              action="index.php?uc=genererDocuments&action=enregBonVac" 
              role="form">
            <select id="lieuxVacs" name="lieuxVacs" class="form-control">
                <?php
                foreach ($lesLieuxDeVac as $unLieu) {
                    $id = $unLieu['id'];
                    $nom = $unLieu['nom'];
                        ?>
                        <option selected value="<?php echo $id ?>">
                            <?php echo $nom ?> </option>
                        <?php
                }
                ?> 
            </select>
            <fieldset>       
                    <div class="form-group">
                        <label for="montant">Montant:</label>
                        <input type="montant" id="montant" name="montant" class="form-control"> 
                        <label for="dateValidite">Valide jusqu'au (jj/mm/aaaa):</label>
                        <input type="text" id="dateValidite" name="dateValidite" class="form-control">
                        <input type="hidden" id="adresse" name="adresse" class="form-control" value="<?php echo $adresse ?>">
                        <input type="hidden" id="cp" name="cp" class="form-control" value="<?php echo $cp ?>">
                        <input type="hidden" id="ville" name="ville" class="form-control" value="<?php echo $ville ?>">
                    </div>
                <button class="btn btn-success" type="submit">Générer le bon</button>
                <button class="btn btn-danger" type="reset">Effacer</button>
            </fieldset>
        </form>
    </div>
</div>