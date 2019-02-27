$(document).ready(function () {
    $('.perso').each(function () {
        var idChar = $(this).attr('id');
        var job = $(this).attr('name');

        function getCharData(idChar) {
            var urlChar = '../ressources/personnages/' + idChar + '.json';
            console.log(urlChar);
            $.get(urlChar, function (dataC) {
                $('#avatar' + idChar).html('<img class="img-responsive img-thumbnail avatar" src="' + dataC.Character.Avatar + '" alt="' + dataC.Character.Name + '">');
                $('#name' + idChar).html('<b>' + dataC.Character.Name + '</b>');
                /*$('#title' + idChar).html('<i>' + dataC.Character.Title + '</i>');*/
            });
        }
        getCharData(idChar);

        function getGearData(idChar) {
            var urlGear = '../ressources/personnages/' + idChar + '.json';
            $.get(urlGear, function (dataG) {

                $('#class' + idChar).html('<img class="img-responsive" src="../ressources/img/JobIcons/' + dataG.Character.ActiveClassJob.JobID + '.png">');
/*                $('#ilvl' + idChar).text('ilvl : ' + dataG.Character.GearSet.Gear.item_level_avg);*/

                $('#slot_mainhand' + idChar).html('<a href="http://xivapi.com/item/' + dataG.Character.GearSet.Gear.MainHand.ID + '"></a><br>');
                /*$('#slot_offhand' + idChar).html('<a href="http://xivapi.com/item/' + dataG.Character.GearSet.Gear.OffHand.ID + '"></a><br>');*/
                $('#slot_head' + idChar).html('<a href="http://xivapi.com/item/' + dataG.Character.GearSet.Gear.Head.ID + '"></a><br>');
                $('#slot_body' + idChar).html('<a href="http://xivapi.com/item/' + dataG.Character.GearSet.Gear.Body.ID + '"></a><br>');
                $('#slot_hands' + idChar).html('<a href="http://xivapi.com/item/' + dataG.Character.GearSet.Gear.Hands.ID + '"></a><br>');
                $('#slot_waist' + idChar).html('<a href="http://xivapi.com/item/' + dataG.Character.GearSet.Gear.Waist.ID + '"></a><br>');
                $('#slot_legs' + idChar).html('<a href="http://xivapi.com/item/' + dataG.Character.GearSet.Gear.Legs.ID + '"></a><br>');
                $('#slot_feet' + idChar).html('<a href="http://xivapi.com/item/' + dataG.Character.GearSet.Gear.Feet.ID + '"></a><br>');
                $('#slot_necklace' + idChar).html('<a href="http://xivapi.com/item/' + dataG.Character.GearSet.Gear.Necklace.ID + '"></a><br>');
                $('#slot_earrings' + idChar).html('<a href="http://xivapi.com/item/' + dataG.Character.GearSet.Gear.Earrings.ID + '"></a><br>');
                $('#slot_bracelets' + idChar).html('<a href="http://xivapi.com/item/' + dataG.Character.GearSet.Gear.Bracelets.ID + '"></a><br>');
                $('#slot_ring1' + idChar).html('<a href="http://xivapi.com/item/' + dataG.Character.GearSet.Gear.Ring1.ID + '"></a><br>');
                $('#slot_ring2' + idChar).html('<a href="http://xivapi.com/item/' + dataG.Character.GearSet.Gear.Ring2.ID + '"></a><br>');
                $('#slot_soulcrystal' + idChar).html('<a href="http://xivapi.com/item/' + dataG.Character.GearSet.Gear.SoulCrystal.ID + '"></a><br>');
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
        if ($(this).attr('src') == '/img/GearIcons/slot.png') {
            $(this).attr('src', '/img/GearIcons/slot_checked.png');
        } else if ($(this).attr('src') == '/img/GearIcons/slot_checked.png') {
            $(this).attr('src', '/img/GearIcons/slot.png');
        }
    });
});
