$(document).ready(function () {
    $('.perso').each(function () {
        var idChar = $(this).attr('id');
        var job = $(this).attr('name');

        function getCharData(idChar) {
            var urlChar = 'https://xivapi.com/character/' + idChar;
            console.log(urlChar);
            $.get(urlChar, function (dataC) {
                $('#avatar' + idChar).html('<img class="img-responsive img-thumbnail avatar" src="' + dataC.Character.Avatar + '" alt="' + dataC.Character.Name + '">');
                $('#name' + idChar).html('<b>' + dataC.Character.Name + '</b>');
                $('#title' + idChar).html('<i>' + dataC.Character.Title + '</i>');
            });
        }
        getCharData(idChar);

        function getGearData(idChar) {
            var urlGear = 'https://xivapi.com/character/' + idChar + '?columns=Character.ClassJobs';
            $.get(urlGear, function (dataG) {

                for (i = 0; i < 100; i++) {
                    var chiante = i + '_' + i;
                    console.log(chiante);
                    console.log(dataG[chiante]);
                    if (dataG[chiante].JobId == job) {
                        
                        break;
                    }
                }

                $('#class' + idChar).html('<img class="img-responsive" src="' + dataG[i].role.icon + '" alt="' + dataG[0].role.abbr + '">');
                $('#ilvl' + idChar).text('ilvl : ' + dataG[i].item_level_avg);

                $('#slot_mainhand' + idChar).html('<a href="http://xivapi.com/item/' + dataG[i].slot_mainhand + '"></a><br>');
                $('#slot_offhand' + idChar).html('<a href="http://xivapi.com/item/' + dataG[i].slot_offhand + '"></a><br>');
                $('#slot_head' + idChar).html('<a href="http://xivapi.com/item/' + dataG[i].slot_head + '"></a><br>');
                $('#slot_body' + idChar).html('<a href="http://xivapi.com/item/' + dataG[i].slot_body + '"></a><br>');
                $('#slot_hands' + idChar).html('<a href="http://xivapi.com/item/' + dataG[i].slot_hands + '"></a><br>');
                $('#slot_waist' + idChar).html('<a href="http://xivapi.com/item/' + dataG[i].slot_waist + '"></a><br>');
                $('#slot_legs' + idChar).html('<a href="http://xivapi.com/item/' + dataG[i].slot_legs + '"></a><br>');
                $('#slot_feet' + idChar).html('<a href="http://xivapi.com/item/' + dataG[i].slot_feet + '"></a><br>');
                $('#slot_necklace' + idChar).html('<a href="http://xivapi.com/item/' + dataG[i].slot_necklace + '"></a><br>');
                $('#slot_earrings' + idChar).html('<a href="http://xivapi.com/item/' + dataG[i].slot_earrings + '"></a><br>');
                $('#slot_bracelets' + idChar).html('<a href="http://xivapi.com/item/' + dataG[i].slot_bracelets + '"></a><br>');
                $('#slot_ring1' + idChar).html('<a href="http://xivapi.com/item/' + dataG[i].slot_ring1 + '"></a><br>');
                $('#slot_ring2' + idChar).html('<a href="http://xivapi.com/item/' + dataG[i].slot_ring2 + '"></a><br>');
                $('#slot_soulcrystal' + idChar).html('<a href="http://xivapi.com/item/' + dataG[i].slot_soulcrystal + '"></a><br>');
            });
        }
        getGearData(idChar);

        //Animations
        $("#header" + idChar).click(function () {
            $("#body" + idChar).toggle(500);
        });
    });

    //Btn collapse tout les onglets
    $("#btn2").click(function () {
        $('.perso').each(function () {
            var idChar = $(this).attr('id');
            $("#body" + idChar).hide();
        });
    });

    //Btn revenir en haut
    $('a[href^="#"]').click(function (e) {
        e.preventDefault();

        var target = this.hash,
            $target = $(target);

        $('html, body').stop().animate({
            'scrollTop': $target.offset().top
        }, 900, 'swing', function () {
            window.location.hash = target;
        });
    });

    //Btn slot - slot_checked
    $('.slot-active').click(function () {
        if ($(this).attr('src') == '/img/slot.png') {
            $(this).attr('src', '/img/slot_checked.png');
        } else if ($(this).attr('src') == '/img/slot_checked.png') {
            $(this).attr('src', '/img/slot.png');
        }
    });
    
    //AJAX
    $('.ajaxClass').blur( function(e) {
       e.preventDefault(); 
       var arme = $('#arme').val();
       var auxiliaire = $('#auxiliaire').val();
       var tete = $('#tete').val();
       var torse = $('#torse').val();
       var main = $('#main').val();
       var ceinture = $('#ceinture').val();
       var jambe = $('#jambe').val();
       var pied = $('#pied').val();
       var collier = $('#collier').val();
       var boucle_oreille = $('#boucle_oreille').val();
       var bracelet = $('#bracelet').val();
       var bague_1 = $('#bague_1').val();
       var bague_2 = $('#bague_2').val();
        
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        
       $.ajax({
           type: "POST",
           url: '/gearpannel/update',
           data: {arme:arme, auxiliaire:auxiliaire, tete:tete, torse:torse, main:main, ceinture:ceinture, jambe:jambe, pied:pied, collier:collier, boucle_oreille:boucle_oreille, bracelet:bracelet, bague_1:bague_1, bague_2:bague_2},
//           success: function() {
//               alert('success');
//           }
       });
   });
});
