<?php
/**
 * Vue liste des eleves
 *
 * PHP Version 7
 *
 * @category  Projet bachelor developpeur web
 * @package   Keren Ohr
 * @author    Tsipora Schvarcz
 */
?>
<div class="row">
    <div class="col-md-4">
        <form action="index.php?uc=genererDocuments&action=choixDocument" 
              method="post" role="form">
            <div class="form-group" style="display: inline-block"> 
                <label for="lstBeneficiaires" accesskey="n">Sélectionner un bénéficiaire : </label>
                <select id="lstBeneficiaires" name="lstBeneficiaires" class="form-control">
                    <?php
                    foreach ($lesBeneficiaires as $unBeneficiaire) {
                        $id = $unBeneficiaire['id'];
                        $nom = $unBeneficiaire['nom'];
                        $prenom = $unBeneficiaire['prenom'];
                            
                    if ($unBeneficiaire == $beneficiaireASelectionner) {
                            ?>
                            <option selected value="<?php echo $id ?>">
                                <?php echo $nom . ' ' . $prenom ?> </option>
                            <?php
                    } else {
                            ?>
                            <option selected value="<?php echo $id ?>">
                                <?php echo $nom . ' ' . $prenom ?> </option>
                            <?php
                            }
                    }
                    ?> 
                </select>
            </div>
            <input id="ok" type="submit" value="Valider" class="btn btn-success" 
                   role="button">
        </form>
    </div>
</div>
                    
