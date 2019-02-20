<?php
    $titre = "VRT - Devotion Doctrine";
	//connexion BDD
	include "ressources/includes/connexion.php";
    include 'ressources/includes/header.php';
    include 'ressources/includes/navbar.php';

	include 'ressources/includes/connexion.php';

	$rqVerif ="SELECT titre, texte, id_user FROM web_agency_fails";
    //preparation
    $stmtVerif = $dbh->prepare($rqVerif);
    //exectuion
    $stmtVerif->execute();
    //recup données
    $wafs = $stmtVerif->fetchAll();
?>


<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <?php
                if(isset($wafs)){
                    foreach($wafs as $waf) :     
            ?>
            <div class="card text-white bg-dark" style="margin:1rem;">
                <div class="card-header">
                    <h6><b>
                            <?= $waf['titre']; ?></b></h6>
                </div>
                <div class="card-body">
                    <p class="card-text"><cite>&rdquo;
                            <?= $waf['texte']; ?>&bdquo;</cite></p>
                </div>
            </div>
            <?php 
                    endforeach;
                };
            ?>
        </div>
    </div>
    <hr/>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-white bg-dark" style="margin:1rem;">
                <div class="card-header text-center">
                    Ecrire une entrée
                </div>
                <form method="POST" action="ajoutWAF.php" accept-charset="UTF-8" enctype="multipart/form-data"><input name="_token" type="hidden" value="lggnVyqO7OsRLH6qVMeBQV2iXzbn9TL6yq85E8pY">

                    <div class="card-body bg-secondary">
                        <p class="card-text">
                            <label for="titre">Titre :</label>
                            <input class="form-control" name="titre" type="text" id="titre">
                        </p>

                        <p class="card-text">
                            <label for="texte">Texte :</label>
                            <textarea class="form-control" name="texte" type="text" id="texte" rows="5"></textarea>
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
    include 'ressources/includes/footer.php';
?>