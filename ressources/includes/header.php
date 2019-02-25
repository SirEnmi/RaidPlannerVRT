<?php
	//tjrs en haut
	session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <!--    <meta name="csrf-token" content="{{ csrf_token() }}">-->

    <title>
        <?= $titre; ?>
    </title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!-- Styles -->
    <link href="ressources/css/app.css" rel="stylesheet">
    <link href="ressources/css/styles.css" rel="stylesheet">

    <?php
        if($titre == 'VRT - Calendrier') :
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                //options and callbacks
                eventSources: [

                    //event source
                    {
                      url: 'chargementEvent.php',
                      type: 'POST',
                      data: {
                        custom_param1: 'something',
                        custom_param2: 'somethingelse'
                      },
                      error: function() {
                        alert('there was an error while fetching events!');
                      },
                      color: '#d7191b',   // a non-ajax option
                      textColor: 'white' // a non-ajax option
                    }

                ],
                
                eventClick: function(calEvent, jsEvent, view) {

                    alert('Event: ' + calEvent.id);
                    location.href = "raid.php?id=" + calEvent.id;
                    // change the border color just for fun
                    $(this).css('border-color', 'red');

                }

            })
        });

    </script>
    <?php
        endif;
    ?>

</head>

<body>
    <div id="app">
