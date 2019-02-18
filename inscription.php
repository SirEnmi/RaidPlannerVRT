<?php
	include 'ressources/includes/connexion.php';

	//Mr Propre
	$safe = array_map('strip_tags', $_POST);
    $rqInscrip = "INSERT INTO inscriptions (date_inscription, message, job, id_event, id_user) VALUES (:date_inscription, :message, :job, :id_event, :id_user)";
    //preparation
    $stmtInscrip = $dbh->prepare($rqInscrip);
    //params
    $params = array(':date_inscription' => $safe['date_inscription'], ':message' => $safe['message'], ':job' => $safe['job'], ':id_event' => $safe['id_event'], ':id_user' => $safe['id_user']);
    //execution
    $stmtInscrip->execute($params);

    header("Location: raidplanner/raid.php?id=$safe->id_event");
?>
