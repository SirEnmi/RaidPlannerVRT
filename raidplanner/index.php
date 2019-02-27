<?php
    $titre = "VRT - Calendrier";
	//connexion BDD
	include "../ressources/includes/connexion.php";
    include '../ressources/includes/header.php';
    include '../ressources/includes/navbar.php';
?>

<div class="container">
    <form method="POST" action="ajoutRaid.php" accept-charset="UTF-8" enctype="multipart/form-data"><input name="_token" type="hidden" value="lggnVyqO7OsRLH6qVMeBQV2iXzbn9TL6yq85E8pY">
        <div class="row">
            <div class="col-md-12">
                <!--        CALENDRIER-->
                <div class="col-md-12" style="background-color:white; padding:0px; margin-bottom: 3em;" id="calendar">
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-12">
                <!--            NOM DU RAID-->
                <div class="card text-white bg-dark">
                    <div class="card-header text-center">
                        Créer un événement
                    </div>
                    <div class="card-body bg-secondary">
                        <label for="nom_raid">Nom du Raid : *</label>
                        <input class="form-control" name="nom_raid" type="text" id="nom_raid">

                        <br />
                        <label for="start_date">Date de d&eacute;but : *</label>
                        <input class="form-control" name="start_date" type="date" id="start_date">

                        <br />
                        <label for="end_date">Date de fin : *</label>
                        <input class="form-control" name="end_date" type="date" id="end_date">

                        <hr />
                        <div class="text-center">
                            <input class="btn btn-dark" type="submit" value="Ajouter l&#039;événement">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?php
    include '../ressources/includes/footer.php';
?>
