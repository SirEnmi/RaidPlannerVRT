<?php
    $titre = "VRT - Accueil";
	//connexion BDD
	include "ressources/includes/connexion.php";
    include 'ressources/includes/header.php';
    include 'ressources/includes/navbar.php';
    
    /* FETCH GHRIST*/
    //requete
    $rqWafs = "SELECT titre, texte, id_user FROM web_agency_fails";
    //preparation
    $stmtWafs = $dbh->prepare($rqWafs);
    //exectuion
    $stmtWafs->execute();
    //recup données
    $wafs = $stmtWafs->fetchAll();

    /* FETCH RAPPORTS */
    //requete
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
?>

<div class="row">
    <div class="col-md-7">
        <h4 class="titreAccueil">DERNIERES CHRONIQUES</h4>
        <?php
            if(isset($wafs)){
                foreach($wafs as $waf) :     
        ?>
        <div class="card text-white bg-dark" style="margin:1rem;">
            <div class="card-header">
                <h6><b><?= $waf['titre'] ?></b></h6>
            </div>
            <div class="card-body">
                <p class="card-text"><cite>&rdquo;<?= $waf['texte'] ?>&bdquo;</cite></p>
            </div>
        </div>
        <?php
                endforeach;
            };
        ?>
    </div>
    <div class="col-md-5">
        <h4 class="titreAccueil">DERNIERS RAPPORTS</h4>
        <?php
            if(isset($Rapports)){
                foreach($Rapports as $Rapport) :     
        ?>
        <div class="card text-white bg-dark" style="margin:1rem;">
            <div class="card-header">
                <h5><?= $Rapport['nom_raid']; ?></h5>
            </div>
            <div class="card-body">
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
</div>


<?php
    include 'ressources/includes/footer.php';
?>
