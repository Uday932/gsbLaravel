<?php
/** @var PdoGsb $pdo */
include 'views/v_sommaire.php';
$action = $_REQUEST['action'];
$idVisiteur = $_SESSION['idVisiteur'];
$leMois="";
$id="";
switch($action){
	case 'gestionFrais':{
		$id=$_REQUEST['id'];
		$leTypes=$pdo->getTypes();

		$lesMois=$pdo->getTousLesMoisDisponibles();
		// Afin de sélectionner par défaut le dernier mois dans la zone de liste,
		// on demande toutes les clés, et on prend la première,
		// les mois étant triés décroissants
		$etp=$pdo->getCumulFraisEtape1D($id);
		$km=$pdo->getCumulFraisKilométrique1D($id);
		$nui=$pdo->getCumulFraisHotel1D($id);
		$rep=$pdo->getCumulFraisRepas1D($id);

		$lesCles = array_keys( $lesMois );
		$moisASelectionner = $lesCles[0];
		$lesTypes=$pdo->getTypes();
		include("views/1E/v_gestionDesFrais.php");
		break;
	}
}