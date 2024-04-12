@extends ('sommaire')
@section('contenu1')

<div id="contenu">
    <form method="post"  action="{{ route('chemin_supprimerVisiteur', ['id' => $user['id']]) }}">
                    {{ csrf_field() }} <!-- laravel va ajouter un champ caché avec un token -->
        <div class="corpsForm">
            <fieldset>
                <legend>Confirmation</legend>
                    <p>Etes-vous sûr de vouloir supprimer le visiteur " {{ $user['nom'] }} {{ $user['prenom'] }} " ?</p> <!-- il faudra faire un mécanisme permettant de bloquer le delete 
                                                                                                                  sur l'utilisateur courrant -->
            </fieldset>
        </div>
        <div class="piedForm">
            <p>
            <input id="ok" type="submit" value="Valider" size="20"/>
            <a href="{{ route('chemin_voirVisiteur') }}" size="20"> <input type="button" value="Annuler"/></a>
            </p> 
        </div>
    </form>
@endsection