<?php
	//connexion BDD
	include "../ressources/includes/connexion.php";

    $raid_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    
    if($raid_id == 0){
        header("Location: ../raidplanner");
    }
    else

    $rqRaid = "SELECT nom_raid, start_date, end_date
            FROM events
            WHERE id = $raid_id";

    $stmtRaid = $dbh->query($rqRaid);
    //recuperation 
    $Raid = $stmtRaid->fetch(PDO::FETCH_OBJ);
    
    $rqInscription = "SELECT i.id_inscription, i.date_inscription, i.message, i.job, i.id_user, e.nom_raid, e.start_date, e.end_date, u.name
                FROM inscriptions as i
                JOIN events as e ON i.id_event = e.id
                JOIN users as u ON i.id_user = u.id
                WHERE e.id = $raid_id";

    $stmtInscription = $dbh->query($rqInscription);
    //recuperation 
    $Inscriptions = $stmtInscription->fetchAll(PDO::FETCH_OBJ);

    $titre = "VRT - " . $Raid->nom_raid;
    include '../ressources/includes/header.php';
    include '../ressources/includes/navbar.php';
    $now = date('Y-m-d');
?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <h3 style="text-align: center;"><b>Nom du raid : </b>
                <?= $Raid->nom_raid; ?>
            </h3>
            <h3 style="text-align: center;"><b>Date début : </b>
                <?= $Raid->start_date; ?>
            </h3>
            <?php if($Raid->start_date != $Raid->end_date): ?>
            <h3 style="text-align: center;"><b>Date Fin : </b>
                <?= $Raid->end_date; ?>
            </h3>
            <?php endif; ?>
            <hr />


            <h5 style="text-align: center;"><b>Inscrits :</b></h5>
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <div class="card text-white bg-dark" style="margin:1rem;">
                        <div class="card-header" style="text-align: center">
                            DPS - Melees
                        </div>
                        <div class="card-body bg-secondary bg-inscrit">
                            <ul style="list-style-type:none">
                                <?php
                                    if(isset($Inscriptions)){
                                        foreach($Inscriptions as $Inscription){
                                            if($Inscription->job === '22' || $Inscription->job === '20' || $Inscription->job === '34' || $Inscription->job === '30' ):
                                ?>
                                <li><img class="jobInscrit" src="../ressources/img/JobIcons/<?= $Inscription->job; ?>.png" />
                                    <?= $Inscription->name ?>
                                </li>
                                <hr />
                                <?php
                                            endif;
                                        };
                                    };
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-white bg-dark" style="margin:1rem;">
                        <div class="card-header" style="text-align: center">
                            DPS - Distances
                        </div>
                        <div class="card-body bg-secondary bg-inscrit">
                            <ul style="list-style-type:none">
                                <?php
                                    if(isset($Inscriptions)){
                                        foreach($Inscriptions as $Inscription){
                                            if($Inscription->job === '23' || $Inscription->job === '31' || $Inscription->job === '25' || $Inscription->job === '27' || $Inscription->job === '35' ):
                                ?>
                                <li><img class="jobInscrit" src="../ressources/img/JobIcons/<?= $Inscription->job; ?>.png" />
                                    <?= $Inscription->name ?>
                                </li>
                                <hr />
                                <?php
                                            endif;
                                        };
                                    };
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-white bg-dark" style="margin:1rem;">
                        <div class="card-header" style="text-align: center">
                            Healers
                        </div>
                        <div class="card-body bg-secondary bg-inscrit">
                            <ul style="list-style-type:none">
                                <?php
                                    if(isset($Inscriptions)){
                                        foreach($Inscriptions as $Inscription){
                                            if($Inscription->job === '33' || $Inscription->job === '24' || $Inscription->job === '28'):
                                ?>
                                <li><img class="jobInscrit" src="../ressources/img/JobIcons/<?= $Inscription->job; ?>.png" />
                                    <?= $Inscription->name ?>
                                </li>
                                <hr />
                                <?php
                                            endif;
                                        };
                                    };
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-white bg-dark" style="margin:1rem;">
                        <div class="card-header" style="text-align: center">
                            Tanks
                        </div>
                        <div class="card-body bg-secondary bg-inscrit">
                            <ul style="list-style-type:none">
                                <?php
                                    if(isset($Inscriptions)){
                                        foreach($Inscriptions as $Inscription){
                                            if($Inscription->job === '19' || $Inscription->job === '32' || $Inscription->job === '21'):
                                ?>
                                <li><img class="jobInscrit" src="../ressources/img/JobIcons/<?= $Inscription->job; ?>.png" />
                                    <?= $Inscription->name ?>
                                </li>
                                <hr />
                                <?php
                                            endif;
                                        };
                                    };
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr />


            <h5 style="text-align: center;"><b>Messages :</b></h5>
            <?php
                foreach($Inscriptions as $Inscription){
                    if($Inscription->message != null) :
            ?>
            <div class="card text-white bg-dark" style="margin:1rem;">
                <div class="card-header">
                    <?= $Inscription->name ?> (
                    <?= $Inscription->date_inscription ?>)
                </div>
                <div class="card-body bg-secondary">
                    <?= $Inscription->message ?>
                </div>
            </div>
            <?php
                    endif;
                };
            ?>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-dark" style="margin:1rem;">
                <div class="card-header text-center">Inscription à l'event</div>
                <form method="POST" action="inscription.php" accept-charset="UTF-8" enctype="multipart/form-data"><input name="_token" type="hidden" value="lggnVyqO7OsRLH6qVMeBQV2iXzbn9TL6yq85E8pY">
                    <div class="card-body bg-secondary">
                        <p class="card-text">
                            <label for="job">Job : *</label>
                            <select id="job" name="job" class="form-control" required>
                                <optgroup label="Tanks">
                                    <option value="19">Paladin</option>
                                    <option value="21">Guerrier</option>
                                    <option value="32">Chevalier Noir</option>
                                </optgroup>
                                <optgroup label="Healers">
                                    <option value="24">Mage blanc</option>
                                    <option value="33">Astromancien</option>
                                    <option value="28">Erudit</option>
                                </optgroup>
                                <optgroup label="DPS - Melee">
                                    <option value="34">Samouraï</option>
                                    <option value="20">Moine</option>
                                    <option value="22">Dragoon</option>
                                    <option value="30">Ninja</option>
                                </optgroup>
                                <optgroup label="DPS - Distance">
                                    <option value="23">Barde</option>
                                    <option value="31">Machiniste</option>
                                </optgroup>
                                <optgroup label="DPS - Magique">
                                    <option value="25">Mage Noir</option>
                                    <option value="27">Invocateur</option>
                                    <option value="35">Mage Rouge</option>
                                </optgroup>
                            </select>
                        </p>
                        <p class="card-text">
                            <label for="message">Message :</label>
                            <textarea class="form-control" name="message" type="text" id="message" rows="5"></textarea>
                        </p>
                        <p class="card-text">
                            <input class="form-control" type="hidden" name="id_event" id="id_event" value="<?= $raid_id; ?>">
                            <input class="form-control" type="hidden" name="id_user" id="id_user" value="<?= $_SESSION['id']; ?>">
                            <input class="form-control" type="hidden" name="date_inscription" id="date_inscription" value="<?= $now; ?>">
                        </p>
                        <hr />
                        <div class="text-center">
                            <input class="btn btn-dark" type="submit" value="S'inscrire">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<?php
    include '../ressources/includes/footer.php';
?>
