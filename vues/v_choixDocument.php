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
    <input name="lstBeneficiaires" type="text" id="lstBeneficiaires" class="form-control" value="<?php echo $beneficiaireASelectionner ?>">
    <form action="index.php?uc=genererDocuments&action=genererChequeAlimentaire" 
          method="post" role="form">
        <button class="btn btn-secondary" type="submit" name="btnCheque">Chèque alimentaire</button>
    </form>
    <form action="index.php?uc=genererDocuments&action=genererBonDeVacances" 
          method="post" role="form">
        <button class="btn btn-secondary"  type="submit" name="btnBon">Bon de vacances</button>
    </form>
</div>