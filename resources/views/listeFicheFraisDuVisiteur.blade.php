@extends ('selectionFicheFrais2B')
@section('contenu2')

<h3>Fiche de frais du mois {{ $numMois }}-{{ $numAnnee }} : 
    </h3>
    <div class="encadre">
    <p>
    Etat : <strong>{{ $libEtat }} depuis le {{ $dateModif }} </strong>
         <br> Montant validé : <strong>{{ $montantValide }} </strong>
     </p>
  	<table class="listeLegere">
  	   <caption>Eléments forfaitisés </caption>
        <tr>
            @foreach($lesFraisForfait as $unFraisForfait)
			    <th> {{$unFraisForfait['libelle']}} </th>
            @endforeach
		</tr>
        <tr>
            @foreach($lesFraisForfait as $unFraisForfait)
                <td class="qteForfait">{{ $unFraisForfait['quantite'] }} 
                <input type = "text" name = "nom" value="" required> 
                </td>
            @endforeach
		</tr>
    </table>

        <div class="corpsForm">
            <fieldset>
                <legend>Veuillez écrire les informations du visiteur</legend>
                {{-- @includeWhen($erreurs != null, 'msgerreurs', ['erreurs' => $erreurs]) --}}
                {{-- @includeWhen($message != "", 'message', ['message' => $message]) --}}
                    <p>
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