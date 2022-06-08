<?php

if(!empty($_SESSION["name"])){
    header('Location: /?page=dashboard');
}

?>

<?php require ROOT . 'private/login.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/carpool.svg" type="svg">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/login.css">
    <title>Carpool | Connexion</title>
</head>
<body>
    <?php include ROOT . 'includes/header.html.php'; ?>
    <div class="window">
        <h1>Connexion</h1>
        <div class="separator"></div>
        <form name="form" action="" method="POST">
            <p class="group email">
                <input type="email" name="user_email" placeholder="Adresse e-mail" onkeyup="isEmpty()">
                <label class="error" for="user_email"></label>
            </p>
            <p class="group password">
                <div class="group-input-eye">
                    <input type="password" name="user_mdp" placeholder="Mot de passe" onkeyup="isEmpty()">
                    <div class="eye-group">
                        <img id="closeye" src="../assets/images/closeye.png">
                        <img id="eye" src="../assets/images/eye.png">
                    </div>
                </div>
                <label class="error" for="user_mdp"></label>
            </p>
            <p class="group submit">
                <input name="submit" type="submit" value="Se connecter" disabled>
            </p>
        </form>
        <a class="lost-password" href="/?page=reset-password">Mot de passe oublié ?</a>
        <a class="form-redirection" href="/?page=signup">Vous n'avez toujours pas de compte ?</a>
    </div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="../scripts/main.js"></script>
<script src="../scripts/form-login.js"></script>
</body>
</html>