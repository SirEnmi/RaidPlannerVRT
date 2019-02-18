<?php
	/* logincheck.php */
	session_start();

	//mr propre
	$safe = array_map('strip_tags', $_POST);
    include 'ressources/includes/connexion.php';
    //requete
    $rqVerif ="SELECT id, name, email, password, role FROM users WHERE email = :email";
    //preparation
    $stmtVerif = $dbh->prepare($rqVerif);
    //parametres
    $params = array(':email' => $safe['email']);
    //exectuion
    $stmtVerif->execute($params);
    //recup données
    $user = $stmtVerif->fetch();
    //verif user/mail existe
    if($user != NULL){
        //verification mot de passe
        if(password_verify($safe['password'], $user['password'])){
            //changement n° session (sécurité)
            session_regenerate_id();
            //enregistrement
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['auth'] = 'ok'; //pour le menu
            $_SESSION['role'] = $user['role'];
            //redirection accueil
            header("Location: accueil.php"); 
            exit();
        }
        else $error = "1";
    }
    else $error = "2";

    header("Location: login.php?err=$error");
    exit();
?>
