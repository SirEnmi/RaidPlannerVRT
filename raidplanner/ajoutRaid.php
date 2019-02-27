<?php
	include '../ressources/includes/connexion.php';

	//Mr Propre
	$safe = array_map('strip_tags', $_POST);
    $rqAjout = "INSERT INTO events (nom_raid, start_date, end_date) VALUES (:nom_raid, :start_date, :end_date)";
    //preparation
    $stmtAjout = $dbh->prepare($rqAjout);
    //params
    $params = array(':nom_raid' => $safe['nom_raid'], ':start_date' => $safe['start_date'], ':end_date' => $safe['end_date']);
    //execution
    $stmtAjout->execute($params);

    header("Location: ../raidplanner");
?>
