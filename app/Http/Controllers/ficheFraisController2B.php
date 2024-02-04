<?php

namespace App\Http\Controllers;

use App\Facades\PdoGsb as FacadesPdoGsb;
use Illuminate\Http\Request;
use PdoGsb;
use MyDate;
use App\Models\Visiteur;  //c'est moi qui l'ai rajouté
use App\MyApp\PdoGsb as MyAppPdoGsb;
use PDF;

class ficheFraisController2B extends Controller {

    //liste déroulante 
    public function selectionnerVisiteur(){
        if (session()->has('visiteur')) {
            $visiteur = session('visiteur');
            $lesVisiteurs = PdoGsb::afficherVisiteurs2B();
            $lesMois = PdoGsb::getLesMois();
		    // Afin de sélectionner par défaut le dernier mois dans la zone de liste
		    // on demande toutes les clés, et on prend la première,
		    // les mois étant triés décroissants
		    $lesCles = array_keys( $lesMois );
            $moisASelectionner = $lesCles[0];

            $lesCles2 = array_keys( $lesVisiteurs );
            $visiteurASelectionner = $lesCles2[0];
            return view('selectionFicheFrais2B')
                ->with('visiteur',$visiteur)
                ->with('lesVisiteurs', $lesVisiteurs)
                ->with('lesMois', $lesMois)
                ->with('leVisiteur', $visiteurASelectionner)
                ->with('leMois', $moisASelectionner);
        } else {
            return redirect()->route('connexion')->with('erreurs', null);
        }
    }

    //affichage fiche frais après sélection du visiteur
    public function voirFicheFrais(Request $request) {
        if( session('visiteur')!= null){
            $visiteur = session('visiteur');
            $idVisiteur = $request->input('lstVisiteur'); //eh non. ici il faut récupérer l'id du visiteur sélectionné 
            $leMois = $request['lstMois']; 
            $lesVisiteurs = PdoGsb::afficherVisiteurs2B();
		    $lesMois = PdoGsb::getLesMois();
            $lesFraisForfait = PdoGsb::getLesFraisForfait($idVisiteur,$leMois);         //trouver un moyen pour rechercher une fiche frais correspondant à la valeur choisit
		    $lesInfosFicheFrais = PdoGsb::getLesInfosFicheFrais($idVisiteur,$leMois);   // dans la liste déroulante
		    $numAnnee = MyDate::extraireAnnee( $leMois);
		    $numMois = MyDate::extraireMois( $leMois);
            if($lesInfosFicheFrais) {
		    $libEtat = $lesInfosFicheFrais['libEtat'];
		    $montantValide = $lesInfosFicheFrais['montantValide'];
            $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
            $dateModif =  $lesInfosFicheFrais['dateModif'];
            $dateModifFr = MyDate::getFormatFrançais($dateModif);
            $vue = view('listeFicheFraisDuVisiteur')->with('lesMois', $lesMois)
                    ->with('lesVisiteurs', $lesVisiteurs)
                    ->with('leMois', $leMois)->with('numAnnee',$numAnnee)
                    ->with('numMois',$numMois)->with('libEtat',$libEtat)
                    ->with('montantValide',$montantValide)
                    ->with('nbJustificatifs',$nbJustificatifs)
                    ->with('dateModif',$dateModifFr)
                    ->with('lesFraisForfait',$lesFraisForfait)
                    ->with('visiteur',$visiteur);
            return $vue;
            }
            else {
                
            }
        }
        else{
            return view('connexion')->with('erreurs',null);
        }
    }
}