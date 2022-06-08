<?php

require ROOT . 'private/mail.php';

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
    <link rel="stylesheet" href="../styles/login.css">
    <title>Réinitialisation mot de passe</title>
</head>
<body>
    <?php include ROOT . 'includes/header.html.php'; ?>
    <div class="window">
        <h1>Réinitialisation</h1>
        <div class="separator"></div>
        <form name="form" action="" method="POST">
            <p class="group email">
                <input type="email" name="user_email" placeholder="Écrivez votre adresse e-mail" onkeyup="isEmpty()">
                <label for="user_email" class="error"></label>
            </p>
            <p class="group submit">
                <input name="submit" type="submit" value="Envoyer" disabled>
            </p>
        </form>
    </div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="../scripts/main.js"></script>
<script src="../scripts/form-reset.js"></script>
</body>
</html>