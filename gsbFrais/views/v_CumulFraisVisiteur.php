<h3>Fiche de frais du mois <?php //echo $lesCles."-".$leMois?> : 
    </h3>
    <div class="encadre">
	
  	<table class="listeLegere">
             <tr>
                <th class="date">ID</th>
                <th class="libelle">Mois</th>
                <th class='montant'>ID Frais Forfait</th>         
                <th class='montant'>Quantité</th>         
             </tr>
        <?php      
          foreach ( $lesFrais as $unFrais ) 
		  {

			$id = $unFrais['idVisiteur'];
			$mois = $unFrais['mois'];
			$idunFrais = $unFrais['idFraisForfait'];
      $quantite = $unFrais['montant'];
		?>
             <tr>
                <td><?php echo $id ?></td>
                <td><?php echo $mois ?></td>
                <td><?php echo $idunFrais ?></td>
                <td><?php echo $quantite ?></td>
             </tr>
        <?php 
          }
		?>
    </table>
  </div>