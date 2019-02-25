<?php
	include 'ressources/includes/connexion.php';

	//Mr Propre
	$safe = array_map('strip_tags', $_POST);
    $rqAjout = "INSERT INTO blogs (lien_video, lien_FFlogs, commentaire, id_event, id_user) VALUES (:lien_video, :lien_FFlogs, :commentaire, :id_event, :id_user)";
    //preparation
    $stmtAjout = $dbh->prepare($rqAjout);
    //params
    $params = array(':lien_video' => $safe['lien_video'], ':lien_FFlogs' => $safe['lien_FFlogs'], ':commentaire' => $safe['commentaire'], ':id_event' => $safe['id_event'], ':id_user' => $safe['id_user']);
    //execution
    $stmtAjout->execute($params);

    header("Location: blogs.php");
?>