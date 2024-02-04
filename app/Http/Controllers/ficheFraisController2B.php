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
            $lesVisiteurs = null;
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
    public function voirLesFicheFrais(Request $request) {
        if (session('visiteur') != null) {
            
                return view('testView');
            } 
    }
    
}