<?php
/**
 * Vue choix document
 *
 * PHP Version 7
 *
 * @category  Projet bachelor developpeur web
 * @package   Keren Ohr
 * @author    Tsipora Schvarcz
 */
?>
<div>
    <input name="lstBeneficiaires" type="hidden" id="lstBeneficiaires" class="form-control" value="<?php echo $beneficiaireASelectionner ?>">
    <a href="#cheque">Chèque alimentaire</a>
    <a href="#bon">Bon de vacances</a>
    <div class="row">    
        <form method="post" 
              action="index.php?uc=genererDocuments&action=genereDocument" 
              role="form">
            <h2 id="cheque">Générer un chèque alimentaire</h2>
            <div class="col-md-10">
                <input name="lstBeneficiaires" type="hidden" id="lstBeneficiaires" class="form-control" value="<?php echo $beneficiaireASelectionner ?>">
                <fieldset>       
                    <div class="form-group">
                        <label for="montant">Montant du chèque ( en € ):</label>
                        <input type="text" id="montantCheque" name="montantCheque" class="form-control"> 
                        <label for="dateValidite">Valide jusqu'au (jj/mm/aaaa):</label>
                        <input type="text" id="dateValiditeCheque" name="dateValiditeCheque" class="form-control">
                    </div>
                    <button class="btn btn-success" type="submit" name="btnCheque">Générer le chèque alimentaire</button>
                    <button class="btn btn-danger" type="reset">Effacer</button>
                </fieldset>

                <h2 id="bon">Générer un bon de vacances</h2>
                <input name="lstBeneficiaires" type="hidden" id="lstBeneficiaires" class="form-control" value="<?php echo $beneficiaireASelectionner ?>">
                <select id="lstLieuxVacs" name="lstLieuxVacs" class="form-control">
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
                    </div>
                    <button class="btn btn-success" type="submit" name="btnBon">Générer le bon</button>
                    <button class="btn btn-danger" type="reset">Effacer</button>
                </fieldset>   
            </div>
        </form>
    </div>
</div>