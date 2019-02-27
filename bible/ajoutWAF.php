<?php
	include 'ressources/includes/connexion.php';

	//Mr Propre
	$safe = array_map('strip_tags', $_POST);
    $rqAjout = "INSERT INTO web_agency_fails (titre, texte, id_user) VALUES (:titre, :texte, :id_user)";
    //preparation
    $stmtAjout = $dbh->prepare($rqAjout);
    //params
    $params = array(':titre' => $safe['titre'], ':texte' => $safe['texte'], ':id_user' => $safe['id_user']);
    //execution
    $stmtAjout->execute($params);

    header("Location: index.php");
?>