<?php

/*
Vérification si l'utilisateur existe.
Si oui, on vérifie que le password reçu par le formulaire est le bon
*/
function connection($bdd, $email, $mdp)
{
    require ROOT . 'private/connect.php';

    $req = $bdd->prepare('SELECT * FROM tbl_user WHERE user_email = ?');
    $req->execute(array($email));
    $user = $req->fetch(PDO::FETCH_OBJ);
    if($user)
    {
        // on vérifie le mot de passe comme ça si tu utilises password_hash
        // pour crypter les mots de passe
        $verif = password_verify($mdp , $user->user_mdp);
        if($verif)
        {
            // si c'est bon on return les info de l'utilisateur récup dans la table connection juste avant
            return $user;
        }
    }
    return false;
}

function openSession($user)
{
    // on rempli les sessions
    $_SESSION["id"]     = $user->user_id;
    $_SESSION["email"]  = $user->user_email;
    $_SESSION["name"]  = $user->user_firstName;
    $_SESSION["lastname"]  = $user->user_lastName;
    $_SESSION["password"]  = $user->user_mdp;
    $_SESSION["role"]  = $user->user_role;
}

// si le formulaire de connexion est soumis
if((isset($_POST['user_email']) && !empty($_POST['user_email'])) && (isset($_POST['user_mdp']) && !empty($_POST['user_mdp'])))
{
    $email = $_POST['user_email'];
    $mdp = $_POST['user_mdp'];
     
    // on exécute la fonction connection
    $user = connection($bdd, $email, $mdp);
     
    // si la fonction connection retourne quelques chose
    // ça veut dire que l'utilisateur existe et que le mot de
    // passe renseigné dans le formulaire de connexion est le bon
    if($user)
    {
        openSession($user);
        if($_SESSION["role"] == "admin")
        {
            header('Location: /?page=admin');
        }
        else
        {
            header('Location: /?page=dashboard');
        }
    }
}