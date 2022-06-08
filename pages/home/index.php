<?php

if(!empty($_SESSION["name"])){
    header('Location: /?page=dashboard');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/carpool.svg" type="svg">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/home.css">
    <title>Carpool</title>
</head>
<body>
    <?php include ROOT . 'includes/burger-menu.html.php'; ?>
    <header>
        <div class="inner-header">
            <nav class="menu">
                <ul class="link-list">
                    <li>
                        <a class="logo-link" href="">
                            <img src="../assets/images/carpool.svg" alt="Logo de la société carpool">
                            <span class="logo">Carpool</span>
                        </a>
                    </li>
                    <li>
                        <a class="link" href="/?page=about">À propos</a>
                    </li>
                    <li>
                        <a class="link" href="/?page=contact">Contact</a>
                    </li>
                </ul>
                <div class="login-container">
                    <a class="link connexion" href="/?page=login">Connexion</a>
                    <a class="animated-button" href="/?page=signup">
                        <span>Essayer Carpool gratuitement</span>
                    </a>
                </div>
            </nav>
            <div class="burgermenu collapse">
                <span></span>
            </div>
        </div>
    </header>
    <div class="hero">
        <div class="text-container">
            <h1>
                À plusieurs,<br>
                C'est bien meilleur.<br>
            </h1>
            <h2>Plus ambitieux qu'une simple plateforme de covoiturage, Carpool vous offre une téléportation sans accroc n'importe où sur la planète. Et tout ça, en quelques secondes seulement.</h2>
            <a class="animated-button text-button" href="/?page=signup">
                <span>Essayer Carpool gratuitement</span>
            </a>
        </div>
        <div class="image-container">
            <img src="../assets/images/human.png" alt="Image d'une voiture familiale">
        </div>
    </div>
<script src="../scripts/main.js"></script>
<script src="../scripts/burger-anim.js"></script>
</body>
</html>