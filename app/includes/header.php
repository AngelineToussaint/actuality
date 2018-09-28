<!DOCTYPE HTML>
<HTML>
<head>
    <title><?php echo $route->getName() ?> - Site d'actualité</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/styles.css">
    <link rel="stylesheet" href="../public/css/materialize.css">

    <script type="text/javascript" src="../public/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../public/js/materialize.js"></script>
</head>
<body id="<?php echo str_replace(" ", "-", strtolower($route->getName())) ?>">
<nav>
    <div class="nav-wrapper grey darken-4">
        <a href="accueil" class="brand-logo">Actualité Gaming</a href="accueil">
        <ul id="nav-mobile" class="right hide-on-med-and-down semi-bold">
            <li><a href="accueil">Accueil</a></li>
            <?php
            if (!isset($_SESSION['user'])){
            ?>
            <li><a href="connexion">Connexion</a></li>
            <li><a href="inscription">Inscription</a></li>
                <?php
            } else {
                if ($_SESSION['user']['role'] == 'a'){ ?>
                    <li><a href="nouvel-article">Nouvel Article</a></li>
                <?php
                }
                ?>
            <li><a href="deconnexion">Déconnexion</a></li>
            <?php } ?>
        </ul>
    </div>
</nav>