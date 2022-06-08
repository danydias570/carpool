<?php 

require ROOT . 'private/protect.php';

date_default_timezone_set('Europe/Paris');
$date = date('H:i');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/carpool.svg" type="svg">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/main-dashboard.css">
    <link rel="stylesheet" href="../styles/dashboard.css">
    <title><?= ucfirst($_SESSION['name']) ?> <?= ucfirst($_SESSION['lastname']) ?> 👋</title>
</head>
<body>
    <?php require ROOT . 'includes/header-dashboard.html.php'; ?>
    <div class="window">
        <h1><?php if($date > 0 && $date < 21): ?>
                Bonjour
            <?php else: ?>
                Bonsoir
                <?php endif; ?>
            <?= ucfirst($_SESSION['name']) ?>. 👋</h1>
        <div class="card-container">
            <div class="card c-uno" href="">
                <div class="image-card-container">
                    <img src="../assets/images/drive.png" alt="">
                </div>
                <div class="text-card-container">
                    <h2>Conduisez</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit, velit.
                    </p>
                </div>
            </div>
            <div class="card c-dos modal-trigger">
                <div class="image-card-container">
                    <img src="../assets/images/seatdown.png" alt="">
                </div>
                <div class="text-card-container">
                    <h2>Prenez place</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit, velit.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php require ROOT . 'includes/modal-seat.html.php'; ?>
<script src="../scripts/dashboard.js"></script>
</body>
</html>