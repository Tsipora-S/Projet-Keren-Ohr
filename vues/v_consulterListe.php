<?php
/**
 * Vue gestion de la liste des adhérents 
 *
 * PHP Version 7
 *
 * @category  Projet bachelor developpeur web
 * @package   Keren Ohr
 * @author    Tsipora Schvarcz
 */
?>
<form method="post" 
      accept-charset=""action="index.php?uc=gestionAdherents&action=modifierItem" 
      accesskey=""role="form">
    <div class="panel panel-info">
        <h3>Liste des adhérents</h3>
        <table class="table table-bordered table-responsive">
            <tr>
                <th class='nom'>Nom</th>
                <th class='prenom'>Prenom</th>
                <th class='adresse'>Adresse</th>
                <th class='cp'>Code postal</th>
                <th class='ville'>Ville</th>
                <th class='email'>Email</th>
                <th class='telPort'>Telephone Portable</th>
                <th class='telFixe'>Telephone Fixe</th>
                <th class='dateAdher'>Date d'adhésion</th>
                <th class='cat'>Catégorie</th>
                <th></th>
            </tr>
            <?php
            foreach ($lesBeneficiaires as $unBeneficiaire) {
                $id = $unBeneficiaire['id'];
                $nom = $unBeneficiaire['nom'];
                $prenom = $unBeneficiaire['prenom'];
                $adresse = $unBeneficiaire['adresse'];
                $cp = $unBeneficiaire['cp'];
                $ville = $unBeneficiaire['ville'];
                $email = $unBeneficiaire['email'];
                $telPort = $unBeneficiaire['telPort'];
                $telFixe = $unBeneficiaire['telFixe'];
                $dateAdher = $unBeneficiaire['dateAdher'];
                $cat = $unBeneficiaire['idCategorie'];
                ?>
            
                <tr>
                    <td><input name="nom" type="text" id="nom" class="form-control" value="<?php echo $nom ?>"></td>
                    <td><input name="prenom" type="text" id="prenom" class="form-control" value="<?php echo $prenom ?>"></td>
                    <td><input name="adresse" type="text" id="adresse" class="form-control" value="<?php echo $adresse ?>"></td>
                    <td><input name="cp" type="text" id="cp" class="form-control" value="<?php echo $cp ?>"></td>
                    <td><input name="ville" type="text" id="ville" class="form-control" value="<?php echo $ville ?>"></td>
                    <td><input name="email" type="text" id="email" class="form-control" value="<?php echo $email ?>"></td>
                    <td><input name="telPort" type="text" id="telPort" class="form-control" value="<?php echo $telPort ?>"></td>
                    <td><input name="telFixe" type="text" id="telFixe" class="form-control" value="<?php echo $telFixe ?>"></td>
                    <td><input name="dateAdher" type="text" id="dateAdher" class="form-control" value="<?php echo $dateAdher ?>"></td>
                    <td><select id="lstCategorie" name="lstCategorie" class="form-control">
                            <?php
                            foreach ($lesCategories as $uneCat) {
                                $id = $uneCat['id'];
                                $libelle = $uneCat['libelle'];
                                if ($id == $cat) {
                                    ?>
                                    <option selected value="<?php echo $id ?>">
                                        <?php echo $libelle ?> </option>
                                    <?php
                                } else {
                                    ?>
                                    <option value="<?php echo $id ?>">
                                        <?php echo $libelle ?> </option>
                                    <?php
                                }
                            }
                            ?> 
                        </select></td>
                    <td><input name="idBeneficiaire" type="hidden" id="idBeneficiaire" class="form-control" value="<?php echo $id ?>"></td>
                    <td><button class="btn btn-success" type="edit" name="corriger" value="corriger">Corriger</button>
                        <button class="btn btn-danger" type="reset">Reinitialiser</button>
                    </td>              
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</form>
