<?php

if(!empty($_SESSION["name"])){
    header('Location: /?page=dashboard');
}

?>

<?php require ROOT . 'private/signup.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/carpool.svg" type="svg">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="stylesheet" href="../styles/signup.css">
    <title>Carpool | Inscription</title>
</head>
<body>
    <?php include ROOT . 'includes/header.html.php'; ?>
    <div class="window">
        <h1>Inscription</h1>
        <div class="separator"></div>
        <form name="form" action="" method="POST">
            <div class="name-container">
                <p class="group firstName">
                    <input type="text" name="user_firstName" placeholder="Prénom" onkeyup="isEmpty()">
                    <label for="user_firstName" class="error"></label>
                </p>
                <p class="group lastName">
                    <input type="text" name="user_lastName" placeholder="Nom" onkeyup="isEmpty()">
                    <label for="user_lastName" class="error"></label>
                </p>
            </div>
            <p class="group email">
                <input type="email" name="user_email" placeholder="Adresse e-mail" onkeyup="isEmpty()">
                <label for="user_email" class="error"></label>
            </p>
            <p class="group password">
                <div class="group-input-eye">
                    <input type="password" name="user_mdp" placeholder="Mot de passe" onkeyup="isEmpty()">
                    <div class="eye-group">
                        <img id="closeye" src="../assets/images/closeye.png">
                        <img id="eye" src="../assets/images/eye.png">
                    </div>
                </div>
                <label for="user_mdp" class="info-password">Au moins 1 chiffre, 1 majuscule et 8 caractères.</label>
            </p>
            <p class="group password">
                <div class="group-input-eye">
                    <input type="password" name="confirmed_mdp" placeholder="Confirmation mot de passe" onkeyup="isEmpty()">
                    <div class="eye-group">
                        <img id="confirmed_closeye" src="../assets/images/closeye.png">
                        <img id="confirmed_eye" src="../assets/images/eye.png">
                    </div>
                </div>
                <label for="confirmed_mdp" class="error"></label>
            </p>
            <p class="group submit">
                <input name="submit" type="submit" value="S'inscrire" disabled>
            </p>
        </form>
        <a class="form-redirection" href="/?page=login">Vous avez déjà un compte ?</a>
    </div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="../scripts/main.js"></script>
<script src="../scripts/form-login.js"></script>
<script src="../scripts/form-signup.js"></script>
</body>
</html>