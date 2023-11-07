<?php
/** @var PdoGsb $pdo */
include 'views/v_sommaire.php';
$action = $_REQUEST['action'];
$idVisiteur = $_SESSION['idVisiteur'];
$leMois="";
$id="";
switch($action){
	case 'suiviFrais':{
		$leMois=$_REQUEST['lstMois'];
		$leTypes=$pdo->getTypes();

		$lesMois=$pdo->getTousLesMoisDisponibles();
		// Afin de sélectionner par défaut le dernier mois dans la zone de liste,
		// on demande toutes les clés, et on prend la première,
		// les mois étant triés décroissants
		$etp=$pdo->getCumulFraisEtape($leMois);
		$km=$pdo->getCumulFraisKilométrique($leMois);
		$nui=$pdo->getCumulFraisHotel($leMois);
		$rep=$pdo->getCumulFraisRepas($leMois);

		$lesCles = array_keys( $lesMois );
		$moisASelectionner = $lesCles[0];
		$lesTypes=$pdo->getTypes();
		include("views/1D/v_gestionDesFrais.php");
		break;
	}
}