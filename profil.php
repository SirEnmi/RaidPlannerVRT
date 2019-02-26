<?php
    $titre = "VRT - Mon profil";
	//connexion BDD
	include "ressources/includes/connexion.php";
    include 'ressources/includes/header.php';
    include 'ressources/includes/navbar.php';

    $rqPerso = "SELECT id_lodestone, job FROM personnages WHERE id_user = :id_user";
    //preparation
    $stmtPerso = $dbh->prepare($rqPerso);
    //params
    $params = array(':id_user' => $_SESSION['id']);
    //execution
    $stmtPerso->execute($params);
    //recup données
    $Perso = $stmtPerso->fetch();
?>

<script>
    $(document).ready(function () {
        var job = "<?= $Perso['job'] ?>";
        
        $('option').each(function () {
            if ($(this).attr("value") == job){
                $(this).attr("selected","selected");
            }
        });
    });
</script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark">
                <div class="card-header dark" style="color: whitesmoke">Modifier profil</div>
                <div class="card-body bg-secondary ">
                    <form method="POST" action="updateProfil.php">
                        <!--<input type="hidden" name="_method" value="PATCH" /> {{csrf_field()}}-->
                        <!--<div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right" style="color: whitesmoke">Nom</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?= $_SESSION['name'] ?>" required autofocus>
                            </div>
                        </div>-->
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right" style="color: whitesmoke">Adresse Email</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?= $_SESSION['email'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right" style="color: whitesmoke">Nouveau mot de passe</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right" style="color: whitesmoke">Confirmer à nouveau</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="id_lodestone" class="col-md-4 col-form-label text-md-right" style="color: whitesmoke">Id Personnage</label>

                            <div class="col-md-6">
                                <input id="id_lodestone" type="text" class="form-control" name="id_lodestone" value="<?= $Perso['id_lodestone'] ?>" required>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="job" class="col-md-4 col-form-label text-md-right" style="color: whitesmoke">Job</label>
                            <div class="col-md-6">
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
                            </div>
                        </div>
                        <hr/>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    Enregistrer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <br />
    <hr />
    <br />

    <div class="row justify-content-center">
        <div class="col-centered">
            <form method="POST" action="updatePerso.php">
                <input id="id_lodestone" type="hidden" class="form-control" name="id_lodestone" value="<?= $Perso['id_lodestone'] ?>">
                <input id="job" type="hidden" class="form-control" name="job" value="<?= $Perso['job'] ?>">
                <button type="submit" class="btn btn-success center-block">
                    <b>Mettre à jour les informations de mon personnage</b>
                </button>
            </form>
        </div>
    </div>
</div>

<?php
    include 'ressources/includes/footer.php';
?>
