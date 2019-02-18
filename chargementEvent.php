<?php

	include 'ressources/includes/connexion.php';

	$rqEvent = "SELECT id, nom_raid, start_date, end_date
                FROM events";

    $stmtEvent = $dbh->query($rqEvent);
    //recuperation 
    $events = $stmtEvent->fetchAll(PDO::FETCH_OBJ);
    //print_r($events);
    $eventList = array();

    foreach($events as $event):

       $eventList[] = array(              // Add our event as the next element in the event list
            'id'    => (int) $event->id,
            'title' => $event->nom_raid,
            'start' => $event->start_date,
            'end'   => $event->end_date,
        );  
    endforeach;

    echo json_encode($eventList);
?>
