<h3>Fiche de frais du mois <?php //echo $lesCles."-".$leMois?> : 
    </h3>
    <div class="encadre">
	
  	<table class="listeLegere">
             <tr>
                <th class="date">Forfait Étape</th>
                <th class="libelle">Frais Kilométrique</th>
                <th class='montant'>Nuité Hôtel</th>         
                <th class='montant'>Montant</th>         
             </tr>
        <?php      
          foreach ( $etp as $etp1 ) 
		  {
      $montantETP = $etp1['montant'];
		?>
        <?php 
          }
		?>

        <?php      
          foreach ( $km as $km1 ) 
		  {
      $montantKM = $km1['montant'];
		?>
        <?php 
          }
		?>

        <?php      
          foreach ( $nui as $nui1 ) 
		  {
      $montantNUI = $nui1['montant'];
		?>
        <?php 
          }
		?>

      <?php      
          foreach ( $rep as $rep1 ) 
		  {
      $montantREP = $rep1['montant'];
		?>
             <tr>
                <td><?php echo $montantETP ?></td>
                <td><?php echo $montantKM ?></td>
                <td><?php echo $montantNUI ?></td>
                <td><?php echo $montantREP ?></td>
             </tr>
        <?php 
          }
		?>
    </table>
  </div>