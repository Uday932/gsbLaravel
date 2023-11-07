<div id="contenu">
      <h2>État de tous les frais par mois</h2>
      <h3>Mois à sélectionner : </h3>
      <form action="index.php?uc=etatFrais&action=cumulFrais" method="post">
      <div class="corpsForm">
         
      <p>
        <label for="lstMois" accesskey="n">Mois : </label>
        <select id="lstMois" name="lstMois">
            <?php
			foreach ($lesMois as $unMois)
			{
			    $mois = $unMois['mois'];
				$numAnnee =  $unMois['numAnnee'];
				$numMois =  $unMois['numMois'];
				if($mois == $moisASelectionner){
				?>
				<option selected value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
				<?php 
				}
				else{ ?>
				<option value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
				<?php 
				}
			
			}
           
		   ?>    
            
        </select>
      </p>
      
      <p>
      <label for="lstType" accesskey="n">Type de forfait : </label>
        <select id="lstType" name="lstType">
      <?php foreach ($lesTypes as $unType): ?>

        <option selected value="<?= $unType['id']  ?>"><?= $unType['id']  ?></option>

				<?php endforeach ?>                
        </select>
        <div class="piedForm">
      <p>
        <input id="ok" type="submit" value="Valider" size="20" />
        <input id="annuler" type="reset" value="Effacer" size="20" />
      </p>   


      </form>