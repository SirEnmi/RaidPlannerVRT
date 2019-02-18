<?php
    $titre = "VRT - S'enregistrer";
	//connexion BDD
	include "ressources/includes/connexion.php";
    include 'ressources/includes/header.php';
?>

<div class="container" id="bloc">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark" id="bloc">
                <div class="card-header dark" style="color: white ">S'enregistrer</div>

                <div class="card-body bg-secondary ">
                    <form method="POST" action="ajoutRegister.php">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Pseudo</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Mot de passe</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmer à nouveau</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_lodestone" class="col-md-4 col-form-label text-md-right">Id Personnage</label>

                            <div class="col-md-6">
                                <input id="id_lodestone" type="text" class="form-control" name="id_lodestone" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="job" class="col-md-4 col-form-label text-md-right">Job</label>

                            <div class="col-md-6">
                                <select id="job" name="job" class="form-control" required>
                                    <optgroup label="Tanks">
                                        <option value="PLD">Paladin</option>
                                        <option value="WAR">Guerrier</option>
                                        <option value="DRK">Chevalier Noir</option>
                                    </optgroup>
                                    <optgroup label="Healers">
                                        <option value="WHM">Mage blanc</option>
                                        <option value="AST">Astromancien</option>
                                        <option value="SCH">Erudit</option>
                                    </optgroup>
                                    <optgroup label="DPS - Melee">
                                        <option value="SAM">Samouraï</option>
                                        <option value="MNK">Moine</option>
                                        <option value="DRG">Dragoon</option>
                                        <option value="NIN">Ninja</option>
                                    </optgroup>
                                    <optgroup label="DPS - Distance">
                                        <option value="BRD">Barde</option>
                                        <option value="MCH">Machiniste</option>
                                    </optgroup>
                                    <optgroup label="DPS - Magique">
                                        <option value="BLM">Mage Noir</option>
                                        <option value="SMN">Invocateur</option>
                                        <option value="RDM">Mage Rouge</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="codepin" class="col-md-4 col-form-label text-md-right">Code pin</label>

                            <div class="col-md-6">
                                <input id="codepin" type="text" class="form-control" name="codepin" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    S'enregistrer
                                </button>
                                <a class="btn btn-link" id="lien" href="login.php">
                                    Se connecter
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include 'ressources/includes/footer.php';
?>
