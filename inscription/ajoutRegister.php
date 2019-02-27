<?php
	include '../ressources/includes/connexion.php';
	include '../ressources/includes/toolbox.php';

	//Mr Propre
	$safe = array_map('strip_tags', $_POST);
	//verif mdp
	if(verifPassword($safe['password'])){
		//requête
		$rqAjout1 = "INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)";
		//preparation
		$stmtAjout1 = $dbh->prepare($rqAjout1);
		//encodage MDP
		$password = password_hash($safe['password'], PASSWORD_DEFAULT);
		$params1 = array(':name' => $safe['name'], ':email' => $safe['email'], ':password' => $password, ':role' => 0);
        //execution
		$stmtAjout1->execute($params1);
        
        $id_user = $dbh->lastInsertId();
        //requête
		$rqAjout2 = "INSERT INTO personnages (id_lodestone, job, id_user) VALUES (:id_lodestone, :job, :id_user)";
		//preparation
		$stmtAjout2 = $dbh->prepare($rqAjout2);
		$params2 = array(':id_lodestone' => $safe['id_lodestone'], ':job' => $safe['job'], ':id_user' => $id_user);
		//execution
		$stmtAjout2->execute($params2);
        }
	else print_r('erreur');
    
?>