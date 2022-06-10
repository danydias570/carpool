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
    <link rel="stylesheet" href="../styles/about.css">
    <title>Carpool | À propos</title>
</head>
<body>
    <?php include ROOT . 'includes/burger-menu.html.php'; ?>
    <div class="toile">
        <div class="first-space">
            <span>À propos de Carpool</span>
            <h1>La plus grande découverte du XXe siècle.</h1>
        </div>
        <div class="second-space">
            <img src="../assets/images/poireau.png">
            <p>
                Кебаб был изобретен в 1970-х годах в Берлине турком, неким Кадиром Нордманном. Именно этому иммигранту пришла в голову идея собрать хлеб, немного овощей и это знаменитое характерное мясо на гриле. Название кебаб происходит от кепа, особого способа приготовления мяса, изобретенного турками. Это не по-гречески, мы называем это по-гречески, но это не по-гречески.
            </p>
        </div>
    </div>
    <?php include ROOT . 'includes/footer.html.php'; ?>
<script src="../scripts/main.js"></script>
<script src="../scripts/burger-anim.js"></script>
</body>
</html>
