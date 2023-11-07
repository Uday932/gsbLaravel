<div id="contenu">
      <h2>Gestion des Frais</h2>
      <form action="index.php?uc=gestionFrais&action=gestionFrais" method="post">
      <div class="corpsForm">
         
      <p>
      <p>VISITEUR</p>
          <label for="id">Numéro :</label>
          <input id="id" type="text" name="id" size="30" >
      </p>

      <p>
      <p>PERIODE D'ENGAGEMENT :</p>
          <label for="mois">Mois (2 chiffres)</label>
          <input id="mois" type="text" name="id" size="30" >
          <label for="annee">Année (4 chiffres)</label>
          <input id="annee" type="text" name="annee" size="30" >
      </p>

      <p>Frais au forfait</p>
          <label for="rep">Repas midi :</label>
          <input id="rep" type="text" name="rep" size="30" >
          <label for="nui">Nuitées :</label>
          <input id="nui" type="text" name="nui" size="30" >
          <label for="etp">Etape :</label>
          <input id="etp" type="text" name="etp" size="30" >
          <label for="km">Km :</label>
          <input id="km" type="text" name="km" size="30" >
      </p>

        <div class="piedForm">
      <p>
        <input id="ok" type="submit" value="Valider" size="20" />
        <input id="annuler" type="reset" value="Effacer" size="20" />
      </p>   


      </form>