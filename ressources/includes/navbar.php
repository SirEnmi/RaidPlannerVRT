<div class="jumbotron">
    <div class="container" id="titreJumbo">
        <h3 class="display-4">
            <?= $titre ?>
        </h3>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbar">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse container" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <div class="navbar-brand">
                    <img src="ressources/img/VRTLogo.png" style="height: 29px;" />
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="accueil.php">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="raidplanner.php">Raid Planner</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="gearpannel.php">Gear Pannel</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="webagencyfail.php">Devotion Doctrine</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="blogs.php">Rapports</a>
            </li>
        </ul>
        <ul class="navbar-nav my-2 my-lg-0">
            <!--<li class="nav-item">
                <a class="nav-link" href="profil.php">Profil</a>
            </li>-->
            <?php
                if(($_SESSION['role'] == '1')) 
                { 
                    $form=true;
                } 
                else 
                {
                    $form=false;
                }
                if($form)
                {
                    echo' <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Admin
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/users">Users</a>
                            <a class="dropdown-item" href="#">Events</a>
                            <a class="dropdown-item" href="#">Personnages</a>
                            </div>
                            </li>';
                }
            ?>
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <?= $_SESSION['name'] ?> <span class="caret"></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="profil.php">Profil</a>
                    <a class="dropdown-item" href="logout.php">
                        Déconnexion
                    </a>
                    <!--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>-->
                </div>
            </li>
        </ul>
    </div>
</nav>
<div class="container containerPrincipal">
    <main class="py-4">
