<?php
$title = 'ERREUR 404';
session_start();
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr" class="h-100">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/united/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <link href="../assets/css/style.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column h-100 error">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="/accueil"><img src="../assets/img/drakkar_39521.png" height="50px" width="50px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?= $_SERVER['PHP_SELF'] == '/views/rechercher.php' ? 'active' : '' ?>">
                    <a class="nav-link" href="rechercher.php" role="button" aria-haspopup="true" aria-expanded="false">Rechercher</a>
                </li>
                <li class="nav-item <?= $_SERVER['PHP_SELF'] == '/views/guides.php' ? 'active' : '' ?>">
                    <a class="nav-link" href="Guides.php" role="button" aria-haspopup="true" aria-expanded="false">Support</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <?php if (!isset($_SESSION['profile'])) { //Si l'utilisateur n'est pas connecté 
                ?>
                    <li class="nav-item <?= $_SERVER['PHP_SELF'] == '/views/register.php' ? 'active' : '' ?>">
                        <a class="nav-link" href="/inscription" role="button" aria-haspopup="true" aria-expanded="false">Inscription</a>
                    </li>
                    <li class="nav-item <?= $_SERVER['PHP_SELF'] == '/views/login.php' ? 'active' : '' ?>">
                        <a class="nav-link" href="/connexion" role="button" aria-haspopup="true" aria-expanded="false">Connexion</a>
                    </li>
                <?php } else { //Si la personne est connectée 
                ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?= isset($_SESSION['profile']['username']) ? 'Bonjour ' . $_SESSION['profile']['username'] : '' ?></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" <?= $_SERVER['PHP_SELF'] == '/views/profile.php' ? 'active' : '' ?> href="/mon-profil" name="profile">profil</a>
                            <a class="dropdown-item" href="../controllers/logoutCTRL.php">Déconnexion</a>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </nav>

        <div class="textError  text-white">
        <h1 class="text-center"><?= $title ?></h1>
        <hr />
            <h2 class="text-center"> Mince ! vous avez fait naufrage, remontez sur le <a class="center" href="/accueil"> navire ! </a></h2>
        </div>
</body>

</html>