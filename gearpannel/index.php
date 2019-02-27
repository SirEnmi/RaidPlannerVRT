<?php
    $titre = "VRT - Gear Pannel";
	//connexion BDD
	include "../ressources/includes/connexion.php";
    include '../ressources/includes/header.php';
    include '../ressources/includes/navbar.php';

    $rqPersonnages = "SELECT * FROM personnages";
    //preparation
    $stmtPersonnages = $dbh->prepare($rqPersonnages);
    //execution
    $stmtPersonnages->execute();
    //recup données
    $Personnages = $stmtPersonnages->fetchAll();


    $rqCats = "SELECT * FROM categories";
    //preparation
    $stmtCats = $dbh->prepare($rqCats);
    //execution
    $stmtCats->execute();
    //recup données
    $cats = $stmtCats->fetchAll(PDO::FETCH_OBJ);

    $rqSlots = "SELECT * FROM slots";
    //preparation
    $stmtSlots = $dbh->prepare($rqSlots);
    //execution
    $stmtSlots->execute();
    //recup données
    $Slots = $stmtSlots->fetchAll();
?>

<script src="../ressources/js/gearPannel.js"></script>


    <?php
        if(isset($Personnages)){
            foreach($Personnages as $Personnage) :     
    ?>
            <div id="<?= $Personnage['id_lodestone']; ?>" class="perso" name="<?= $Personnage['id_lodestone']; ?>">
                <!-- card -->
                <div class="card bg-dark">
                    <!-- en-tête, partie cliquable -->
                    <div class="card-header" id="header<?= $Personnage['id_lodestone']; ?>">
                        <div class="container-fluid">
                            <div class="row" style="color: white;">
                                <div class="col-auto mr-auto">
                                    <div class="row">
                                        <table>
                                            <td id="avatar<?= $Personnage['id_lodestone']; ?>" class=""></td>
                                            <td id="name<?= $Personnage['id_lodestone']; ?>" class="info"></td>
                                            <td id="title<?= $Personnage['id_lodestone']; ?>" class="info"></td>
                                        </table>

                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="row">
                                        <table>
                                            <td id="ilvl<?= $Personnage['id_lodestone']; ?>" class="info"></td>
                                            <td id="class<?= $Personnage['id_lodestone']; ?>" class="info"></td>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- body, partie depliable -->
                    <div class="card-body bg-secondary" id="body<?= $Personnage['id_lodestone']; ?>">
                        <div class="container-fluid">
                            <?php
                                if(isset($Slots)){
                                    foreach($Slots as $Slot) :     
                            ?>
                            <div class="row">
                                <div class="col-md-5">
                                    <div id="slot_<?= $Slot['libelle']; ?><?= $Personnage['id_lodestone']; ?>"></div>
                                </div>
                                <div class="col-md-2 text-center"><img src="../ressources/img/GearIcons/<?= $Slot['libelle']; ?>.png" /></div>
                                <div class="col-md-5 row">
                                        <?php
                                            if($_SESSION['id'] == $Personnage['id_user']){
                                        ?>
                                                <select class="ajaxClass valign form-control" id="<?= $Slot['libelle']; ?>"  style="width:80%;">
                                                <?php 
                                                    foreach ($cats as $cat){
                                                        if($cat->arme == 1){
                                                            echo '<option value="'.$cat->libelle_categorie.'">'.$cat->libelle_categorie.'</option>';
                                                        }
                                                    }
                                                ?>
                                                </select><img src="../ressources/img/GearIcons/slot.png" class="slot slot-active" />
                                        <?php
                                            }
                                            else echo '<img src="../ressources/img/GearIcons/slot.png" class="slot" />';
                                        ?>
                                </div>
                            </div>
                            <hr>
                            <?php 
                                    endforeach;
                                };
                            ?>
                        </div>
                    </div>
                </div>
            </div><br>
        <?php 
                endforeach;
            };
        ?>
    <div class="btnMenu">
        <a href="#app"><button id="btn1" type="button" class="btn btn-default btn-info btnGP"><i class="fas fa-home"></i></button></a>
        <br><br>
        <button id="btn2" type="button" class="btn btn-default btn-info btnGP"><i class="fas fa-times"></i></button>
    </div>

<?php
    include '../ressources/includes/footer.php';
?>