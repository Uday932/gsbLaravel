@extends ('sommaire')
@section('contenu2')


    </h3>
    <div class="encadre">
    <p>
     </p>


        <div class="corpsForm">
            <fieldset>
                <legend>Veuillez écrire les informations du visiteur</legend>
            
                    <div>
                    
                    <input type = "text" name = "nom" value="" required> 
                    <label name = "nom" for="nom">Nom : </label>
                    
                    </div>
                    </br>

                    <div>
                    <input type="text" name = "prenom" value="" required>
                    <label name = "prenom" for="prenom">Prénom : </label>  
                    </div>   
                    </br>

                    <div>
                    <input type="text" name = "adresse" value="" required>
                    <label name = "adresse" for="adresse">Adresse : </label>
                    </div>
                    </br>

                    <div>
                    <input type="text" name = "cp" value="" required>
                    <label name = "cp" for="cp">Code Postal : </label>
                    </div>
                    </br>

                    <div>
                    <input type="text" name = "ville" value="" required>
                    <label name = "ville" for="ville">Ville : </label>
                    </div>
                    </br>
                    
                    <div>
                    <input type="text" name = "DE" value="" required>
                    <label name = "DE" for="DE">Date Embauche : </label>
                    </div>
                    </p>
            </fieldset>
        </div>
  	</div>
@endsection