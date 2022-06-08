<?php

if(!empty($_POST))
{
    $errors = [];
    require ROOT . 'private/connect.php';

    if(empty($_POST['user_firstName']) || !preg_match('/^[a-zA-Z- ]+$/', $_POST['user_firstName']))
    {
        $errors['user_firstName'] = "Votre prénom n'est pas valide (caractères alphabétique)";
    }

    if(empty($_POST['user_lastName']) || !preg_match('/^[a-zA-Z- ]+$/', $_POST['user_lastName']))
    {
        $errors['user_lastName'] = "Votre nom n'est pas valide (caractères alphabétique)";
    }

    if(empty($_POST['user_email']) || !filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL))
    {
        $errors['email'] = "Votre email n'est pas valide";
    }
    else
    {
        // On test si le mail insérer est déjà existant dans la bdd
        $req = $bdd->prepare("SELECT user_id FROM tbl_user WHERE user_email = ?");
        $req->execute([$_POST['user_email']]);
        $user = $req->fetch();
        if($user)
        {
            $errors['user_email'] = 'Cet email est déjà pris';
        }
    }

    if(empty($_POST['user_mdp']) || $_POST['user_mdp'] != $_POST['confirmed_mdp'])
    {
        $errors['user_mdp'] = "Vous devez entrer un mot de passe valide";
    }

    if(empty($errors))
    {
        $req = $bdd->prepare("INSERT INTO tbl_user SET user_firstName = :firstName, user_lastName = :lastName, user_mdp = :mdp, user_email = :email");

        $password = password_hash(htmlspecialchars($_POST['user_mdp'], ENT_QUOTES, 'UTF-8'), PASSWORD_BCRYPT);
        $email = htmlspecialchars($_POST['user_email'], ENT_QUOTES, 'UTF-8');
        $firstName = htmlspecialchars($_POST['user_firstName'], ENT_QUOTES, 'UTF-8');
        $lastName = htmlspecialchars($_POST['user_lastName'], ENT_QUOTES, 'UTF-8');

        $req->execute([
            ':firstName' => $firstName,
            ':lastName' => $lastName,
            ':mdp' => $password,
            ':email' => $email
        ]);

        header('Location: /?page=login');
        exit();
    }
}