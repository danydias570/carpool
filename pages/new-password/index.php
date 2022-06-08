<?php

require ROOT . 'private/connect.php';
require ROOT . 'private/jwt.php';

if(!empty($_SESSION["name"]))
{
    header('Location: /?page=dashboard');
}

$token = $_GET['token'];

if ($token && isJwtValid($token, 'azerty')) 
{
    $user = getPayload($token);
    if(!empty($_POST))
    {
        if($_POST['newuser_mdp'] == $_POST['confirmed_mdp'])
        {
            $userPassword = $_POST['newuser_mdp'];
            $sql = "UPDATE tbl_user SET user_mdp = :mdp WHERE user_id= :id";
            $stmt= $bdd->prepare($sql);
            $stmt->execute([
                ':id' => $user->user_id,
                ':mdp' => password_hash($userPassword, PASSWORD_DEFAULT)
            ]);
            $user = $stmt->fetch();

            header('Location: /?page=home');
            exit;
        }
    }
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
    <link rel="stylesheet" href="../styles/signup.css">
    <title>Nouveau mot de passe</title>
</head>
<body>
    <?php include ROOT . 'includes/header.html.php'; ?>
    <div class="window">
        <h1>Mot de passe</h1>
        <div class="separator"></div>
        <form name="form" action="" method="POST">
            <p class="group password">
                <div class="group-input-eye">
                    <input type="password" name="newuser_mdp" placeholder="Nouveau mot de passe" onkeyup="isEmpty()">
                    <div class="eye-group">
                        <img id="closeye" src="../assets/images/closeye.png">
                        <img id="eye" src="../assets/images/eye.png">
                    </div>
                </div>
                <label for="newuser_mdp" class="info-password">Au moins 1 chiffre, 1 majuscule et 8 caractères.</label>
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
                <input name="submit" type="submit" value="Confirmez">
            </p>
        </form>
    </div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="../scripts/main.js"></script>
<script src="../scripts/form-password.js"></script>
</body>
</html>

