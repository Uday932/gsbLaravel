<div id="contenu">
      <h2><?php echo $_SESSION['prenom'] . "  " . $_SESSION['nom'] ?> - Cumul Frais</h2>
      <h3>Veuillez sélectionner le mois et le type de forfait : </h3>
      <form action="index.php?uc=etatFrais&action=cumulFraisUser" method="post">
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
        <!--<label for="num" accesskey="n">Numéro : </label>
        <input type="text" id="num" name="num">-->

        <label for="lstType" accesskey="n">Type de forfait : </label>
          <select id="lstType" name="lstType">
        <?php foreach ($lesTypes as $unType): ?>

          <option selected value="<?= $unType['id']  ?>"><?= $unType['id']  ?></option>

          <?php endforeach ?>                
        </select>
      </p>
      </div>
      <div class="piedForm">
      <p>
        <input id="ok" type="submit" value="Valider" size="20" />
        <input id="annuler" type="reset" value="Effacer" size="20" />
      </p> 
      </div>
        
      </form>