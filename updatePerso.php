<?php
    //Connexion BDD
    include 'ressources/includes/connexion.php';

    //Recuperation infos profil
	$données = array_map('strip_tags', $_POST);

    //Récupération infos 
    $json = file_get_contents('https://xivapi.com/character/' . $données['id_lodestone'] . '?column=Character&key=3666384e20394c5aa995d1dc');
    //Décode pour utilisation PHP
    $Obj = json_decode($json);

    if($données['job'] == $Obj->Character->ActiveClassJob->JobID){
        $fp = fopen($données['id_lodestone'] . '.json', 'w');
        
        fwrite($fp, $json);
        fclose($fp);
    };

    
?>