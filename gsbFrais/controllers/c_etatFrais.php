<?php
/** @var PdoGsb $pdo */
include 'views/v_sommaire.php';
$action = $_REQUEST['action'];
$idVisiteur = $_SESSION['idVisiteur'];
$leMois="";
$id="";
switch($action){
	case 'selectionnerMois':{
		$lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
		// Afin de sélectionner par défaut le dernier mois dans la zone de liste,
		// on demande toutes les clés, et on prend la première,
		// les mois étant triés décroissants
		$lesCles = array_keys( $lesMois );
		$moisASelectionner = $lesCles[0];
		include("views/v_listeMois.php");
		break;
	}
	case 'voirEtatFrais':{
		$leMois = $_REQUEST['lstMois'];
		$lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
		$moisASelectionner = $leMois;
		include("views/v_listeMois.php");
		$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$leMois);
		$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur,$leMois);
		$numAnnee =substr( $leMois,0,4);
		$numMois =substr( $leMois,4,2);
		$libEtat = $lesInfosFicheFrais['libEtat'];
		$montantValide = $lesInfosFicheFrais['montantValide'];
		$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
		$dateModif =  $lesInfosFicheFrais['dateModif'];
		
		//Gestion des dates
		@list($annee,$mois,$jour) = explode('-',$dateModif);
		$dateModif = "$jour"."/".$mois."/".$annee;

		//$dateModif =  dateAnglaisVersFrancais($dateModif);
		include("views/v_etatFrais.php");
		break;
	}
	case 'voirCumulFrais':{
		$lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
		// Afin de sélectionner par défaut le dernier mois dans la zone de liste,
		// on demande toutes les clés, et on prend la première,
		// les mois étant triés décroissants
		$lesCles = array_keys($lesMois);
		$moisASelectionner = $lesCles[0];
		$lesTypes=$pdo->getTypes();
		include("views/v_cumulFrais.php");
		break;
	}
	case 'cumulFrais':{
		$leType=$_REQUEST['lstType'];
		$leMois = $_REQUEST['lstMois'];

		$lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
		// Afin de sélectionner par défaut le dernier mois dans la zone de liste,
		// on demande toutes les clés, et on prend la première,
		// les mois étant triés décroissants
		$lesFrais=$pdo->getCumulFrais($leMois,$leType);

		$lesCles = array_keys( $lesMois );
		$moisASelectionner = $lesCles[0];
		$lesTypes=$pdo->getTypes();
		include("views/v_cumulFrais.php");
		include("views/v_voirCumulFrais.php");
		break;
	}
	case 'cumulFraisUser':{
		$leMois = $_REQUEST['lstMois'];
		//$leNumero=$_REQUEST['num'];
		$leType=$_REQUEST['lstType'];

		//$num=$pdo->getNumVisiteur($leNumero);
		$lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
		$lesFrais=$pdo->getCumulFraisVisiteur($leMois/*,$leNumero*/,$leType);

		$lesCles = array_keys($lesMois);
		$moisASelectionner = $lesCles[0];

		$lesTypes=$pdo->getTypes();
		include("views/v_listeCumulVisiteur.php");
		include("views/v_CumulFraisVisiteur.php");
		break;
	}
	/*case 'cumulFraisUser':{
		$leType=$_REQUEST['lstType'];
		$leMois = $_REQUEST['lstMois'];
		$numero = $_REQUEST['numero'];
		$id = $_REQUEST['id'];
		$leNumero = $pdo->getNumVisiteur($numero);
		$frais = $pdo->getCumulFraisVisiteur($numero,$id);

		include("views/v_voirCumulFraisUser.php");
	}*/
}