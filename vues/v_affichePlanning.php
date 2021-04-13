<table class="table table-bordered table-responsive">
    <tr>
        <td>Dimanche</td>
        <td>Lundi</td>
        <td>Mardi</td>
        <td>Mercredi</td>
        <td>Jeudi</td>
        <td>Vendredi</td>
        <td>Samedi</td>
    </tr>
    <?php /*foreach($datesMois as $uneDate){
        $jour=substr($uneDate,0,2);
        $mois= substr($uneDate,3,2);
        $annee= substr($uneDate,6,4);*/
    ?>
    <td><?php //echo $jour ?></td>
    <?php
   //}
?>
  <?php
    $sem = array(6,0,1,2,3,4,5); // Correspondance des jours de la semaine : lundi = 0, dimanche = 6
    $mois = array('','Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre');
    $week = array('lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche');

    $t = mktime(12, 0, 0, $m, 1, $y); // Timestamp du premier jour du mois

    echo '<table class="table table-bordered table-responsive"><tbody>';

    // Le mois
    //--------
    echo '<tr><td colspan="7">'.$mois[$m].'</td></tr>';

    // Les jours de la semaine
    //------------------------
    echo '<tr>';
    for ($i = 0 ; $i < 7 ; $i++)
    {
    echo '<td>'.$week[$i].'</td>';
    }
    echo '</tr>';

    // Le calendrier
    //--------------
    for ($l = 0 ; $l < 6 ; $l++) // calendrier sur 6 lignes
    {
    echo '<tr>';
    for ($i = 0 ; $i < 7 ; $i++) // 7 jours de la semaine
    {
    $w = $sem[(int)date('w',$t)]; // Jour de la semaine à traiter
    $m2 = (int)date('n',$t); // Tant que le mois reste celui du départ
    if (($w == $i) && ($m2 == $m)) // Si le jours de semaine et le mois correspondent
    {
    echo '<td>'.date('j',$t).'</td>'; // Affiche le jour du mois
    $t += 86400; // Passe au jour suivant
    }
    else
    {
    echo '<td>&nbsp;</td>'; // Case vide
    }
    }
    echo '</tr>';
    }
    echo '</tbody></table>';
    ?>
</table>
