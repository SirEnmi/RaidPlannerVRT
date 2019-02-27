<?php
    $titre = "VRT - Connexion";
	//connexion BDD
	include "../ressources/includes/connexion.php";
    include '../ressources/includes/header.php';
?>

<div class="container" id="bloc">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark">
                <div class="card-header dark" style="color: white ">Se connecter</div>
                <div class="card-body bg-secondary">
                    <form method="POST" action="logincheck.php">
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="" required autofocus>

                                <!--
                                @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
-->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Mot de passe</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                <?php
                                    $errors = array (
                                        1 => "Mot de passe incorrect",
                                        2 => "Email incorrect",
                                    );

                                    $error_id = isset($_GET['err']) ? (int)$_GET['err'] : 0;
                                    if (array_key_exists($error_id, $errors)) {
                                        echo    '<span class="">
                                                <strong>'.$errors[$error_id].'</strong>
                                                </span>';
                                    }
                                    else if ($error_id != 0){
                                        echo   '<span class="">
                                                <strong>Merci de ne pas jouer avec l\'url</strong>
                                                </span>';
                                    }
                                ?>

                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Se souvenir de moi
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-white">
                                    Connexion
                                </button>

                                <a class="btn btn-link" id="lien" href="{{ route('password.request') }}">
                                    Mot de passe oublié?
                                </a>

                                <a class="btn btn-link" id="lien" href="../inscription">
                                    S'inscrire
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
    include '../ressources/includes/footer.php';
?>
