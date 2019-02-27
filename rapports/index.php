<?php
    $titre = "VRT - Rapports";
	//connexion BDD
	include "../ressources/includes/connexion.php";
    include '../ressources/includes/header.php';
    include '../ressources/includes/navbar.php';

	$rqRapp = "SELECT b.lien_video, b.lien_FFlogs, b.id_event, b.commentaire, e.nom_raid
                FROM blogs as b
                JOIN events as e
                WHERE b.id_event = e.id";
    //preparation
    $stmtRapp = $dbh->prepare($rqRapp);
    //execution
    $stmtRapp->execute();
    //recup données
    $Rapports = $stmtRapp->fetchAll();

    $rqEvent = "SELECT id, nom_raid, start_date, end_date
                FROM events";
    //execution
    $stmtEvent = $dbh->query($rqEvent);
    //recuperation 
    $events = $stmtEvent->fetchAll();
?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <?php
                if(isset($Rapports)){
                    foreach($Rapports as $Rapport) :     
            ?>
                    <div class="card text-white bg-dark" style="margin:1rem;">
                        <div class="card-header text-center">
                            <h5><?= $Rapport['nom_raid']; ?></h5>
                        </div>
                        <div class="card-body bg-secondary">
                            <h5>Lien youtube : </h5><a href="<?= $Rapport['lien_video']; ?>" target="blank"><?= $Rapport['lien_video']; ?></a><br/><br/>
                            <h5>Lien FFlogs : </h5><a href="<?= $Rapport['lien_FFlogs']; ?>" target="blank"><?= $Rapport['lien_FFlogs']; ?></a><br/>
                            <hr/>
                            <h5>Commentaire :</h5>
                            <p class="card-text"><?= $Rapport['commentaire']; ?></p>
                        </div>
                    </div>
            <?php 
                    endforeach;
                };
            ?>
        </div>

<!--        PARTIE ADMIN -->
         <div class="col-md-3">
             <form method="POST" action="ajoutRapport.php" accept-charset="UTF-8" enctype="multipart/form-data">
                <div class="card text-white bg-dark" style="margin:1rem;">
                    <div class="card-header text-center">
                        Ecrire un rapport
                    </div>
                    <div class="card-body bg-secondary">
                        <!--    liste déroulante des raids (appeler nom_raid depuis la table events) pour créer le commentaire qui ira avec -->
<!--                            <div class="form-group">-->
                            <p class="card-text"> <!--recuperer le nom des raid avec l'id correspondant pour les afficher dans une liste déroulante!-->
                                <label for="id_event">Raid :</label>
                                <select class="form-control" name="id_event" id="id_event">
                                    <?php
                                        if(isset($events)){
                                            foreach($events as $event) :     
                                    ?>
                                                <option value="<?= $event['id']; ?>">[<?= $event['start_date']; ?>] <?= $event['nom_raid']; ?></option>
                                    <?php 
                                            endforeach;
                                        };
                                    ?>
                                </select>
                            </p>
                            <p class="card-text">
                                <label for="lien_video">Lien vidéo :</label> 
                                <input class="form-control" name="lien_video" type="url" id="lien_video" placeholder="Lien vidéo">
                            </p>
                            <p class="card-text">
                                <label for="lien_FFlogs">Lien FFlogs :</label> 
                                <input class="form-control" name="lien_FFlogs" type="url" id="lien_FFlogs" placeholder="Lien FFlogs">
                            </p>
                            <p class="card-text">
                                <label for="commentaire">Commentaire :</label> 
                                <textarea class="form-control" name="commentaire" type="text" id="commentaire" row="5"></textarea>
                                <input class="form-control" type="hidden" name="id_user" id="id_user" value="<?= $_SESSION['id']; ?>">
                            </p>
                        <hr/>
                        <div class="text-center">
                            <input class="btn btn-dark" type="submit" value="Envoyer">
                        </div>
                    </div>
                </div>
             </form>
        </div>
<!--        FIN PARTIE ADMIN-->
    </div>
</div>

<?php
    include '../ressources/includes/footer.php';
?>