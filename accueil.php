<?php
    $titre = "VRT - Accueil";
	//connexion BDD
	include "ressources/includes/connexion.php";
    include 'ressources/includes/header.php';
    include 'ressources/includes/navbar.php';
    
    /* FETCH GHRIST*/
    //requete
    $rqVerif ="SELECT titre, texte, id_user FROM web_agency_fails";
    //preparation
    $stmtVerif = $dbh->prepare($rqVerif);
    //exectuion
    $stmtVerif->execute();
    //recup données
    $wafs = $stmtVerif->fetchAll();

    /* FETCH RAPPORTS */
    //requete
    $rqVerif2 ="SELECT lien_video, lien_FFlogs, commentaire FROM blogs";
    //preparation
    $stmtVerif2 = $dbh->prepare($rqVerif2);
    //exectuion
    $stmtVerif2->execute();
    //recup données
    $rapports = $stmtVerif2->fetchAll();
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
            if(isset($rapports)){
                foreach($rapports as $rapport) :     
        ?>
        <div class="card text-white bg-dark" style="margin:1rem;">
            <div class="card-header">
                <h5>{{$blog->nom_raid}}</h5>
            </div>
            <div class="card-body">
                <h5>Lien youtube : </h5><a href="{{$blog->lien_video}}" target="blank"><?= $rapport['lien_video'] ?></a><br /><br />
                <h5>Lien FFlogs : </h5><a href="{{$blog->lien_FFlogs}}" target="blank"><?= $rapport['lien_FFlogs'] ?></a><br />
                <hr />
                <h5>Commentaire :</h5>
                <p class="card-text"><?= $rapport['commentaire'] ?></p>
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
