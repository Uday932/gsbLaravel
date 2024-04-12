<?php

namespace App\Http\Controllers;

use App\Facades\PdoGsb as FacadesPdoGsb;
use Illuminate\Http\Request;
use PdoGsb;
use App\Models\Visiteur;  //c'est moi qui l'ai rajouté
use App\MyApp\PdoGsb as MyAppPdoGsb;
use PDF;

class gererVisiteurController extends Controller {
    function voirVisiteur() {
        if (session()->has('visiteur')) {
            $visiteur = session('visiteur');
            $lesVisiteurs = PdoGsb::afficherVisiteurs();
            //$visiteur = session('visiteur');
            return view('listevisiteur')->with('lesVisiteurs', $lesVisiteurs)->with('visiteur',$visiteur);;
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }

    function saisirVisiteur(Request $request){
        if( session('visiteur') != null){
            $visiteur = session('visiteur');
            $idVisiteur = $visiteur['id'];
            $view = view('ajouterVisiteur')
                    ->with('visiteur',$visiteur)
                    ->with('message',"")
                    ->with('erreurs', null)
                    ->with ('method',$request->method());
            return $view;
        }
        else{
            return view('connexion')->with('erreurs',null);
        }
    }

    public function sauvegarderVisiteur(Request $request){
        if( session('visiteur') != null){
            $visiteur = session('visiteur');
            $idVisiteur = $visiteur['id'];              
            $nom = $request['nom'];                            
            $prenom = $request['prenom'];
            $login = PdoGsb::genererLogin($prenom,$nom);
            $adresse = $request['adresse'];
            $cp = $request['cp'];
            $ville = $request['ville'];
            $time = strtotime($request['DE']);
            $newformat = date('Y-m-d',$time);

            $view = view('ajouterVisiteur')
                    ->with('visiteur',$visiteur)
                    ->with ('method',$request->method());

            if(date($time))
            {
                $message = "Les informations du visiteur ont correctement été ajoutées.";
                $erreurs = null;
                PdoGsb::addVisiteur($nom,$prenom,$login,$adresse,$cp,$ville,$newformat);
            }
            else {
                $erreurs[] = "La date doit être au format JJ/MM/YYYY. Veuillez réessayer.";
                $message = '';
            }                  
                
            return $view->with('erreurs',$erreurs)
                        ->with('message',$message);
        }
        else{
            return view('connexion')->with('erreurs',null);
        }
    }

    public function edit($id)
    {
        if( session('visiteur') != null){
        $visiteur = session('visiteur');
        $user = PdoGsb::afficherLeVisiteur($id); 
        return view('edit')
            ->with('visiteur', $visiteur)
            ->with('user', $user)
            ->with('erreurs',null)
            ->with('message',"");
        }
        else {
            return view('connexion')->with('erreurs',null);
        }
    }

    public function saveEdit(Request $request, $id)
    {
        if( session('visiteur') != null){
            // Utilisez $request pour accéder aux données du formulaire
            $visiteur = session('visiteur');
            $nom = $request->input('nom');
            $prenom = $request->input('prenom');
            $adresse = $request->input('adresse');
            $cp = $request->input('cp');
            $ville = $request->input('ville');
            $dateEmbauche = $request->input('DE');

            // Utilisez $id pour l'ID de l'utilisateur

            // Appel à la fonction de mise à jour avec les bonnes données
            $valeurFonction = PdoGsb::updateVisiteur($id, $nom, $prenom, $adresse, $cp, $ville, $dateEmbauche);
            
            // Redirection vers la page d'édition avec un message de succès

            $user = PdoGsb::afficherLeVisiteur($id); 
            $view = view('edit')
                    ->with('visiteur', $visiteur)
                    ->with('user', $user);

            if($valeurFonction == true)
            {
                $message = "Les données du visiteur ont été mis à jour.";
                $erreurs = null;
            }
            else {
                $erreurs[] = "Une erreur s'est produite. Veuillez réessayer";
                $message = '';
            }
            return $view->with('erreurs',$erreurs)
                        ->with('message',$message);
        }
        else {
            return view('connexion')->with('erreurs',null);
        }
    }

    public function ConfirmationSupprimer($id)
    {
        if(session('visiteur') != null) {
            $visiteur = session('visiteur');
            $user = PdoGsb::afficherLeVisiteur($id);
            return view('confirmationSupprimer')->with('user', $user)->with('visiteur',$visiteur);;
        }
        else {
            return view('connexion')->with('erreurs',null);
        }
    }

    public function supprimerVisiteur($id) 
    {
        if(session('visiteur') != null) {
            $visiteur = session('visiteur');
            $valeurFonction = PdoGsb::supprimerVisiteur($id);
            $lesVisiteurs = PdoGsb::afficherVisiteurs();
            return view('listevisiteur')->with('lesVisiteurs', $lesVisiteurs)->with('visiteur',$visiteur);;
        }
        else {
            return view('connexion')->with('erreurs',null);
        }
    }

    public function genererPDFVisiteurs()
    {
        if( session('visiteur') != null) {
        $visiteur = session('visiteur');
        $visiteurs = PdoGsb::afficherVisiteursParDE();
        $pdf = PDF::loadView('listeVisiteurPDF', compact('visiteurs'));
        return $pdf->download('liste_visiteur.pdf');
        }
        else {
            return view('connexion')->with('erreurs',null);
        }
    }
}