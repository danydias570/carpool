<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require ROOT . 'private/connect.php';
require ROOT . 'private/jwt.php';
require ROOT . 'private/PHPMailer/src/Exception.php';
require ROOT . 'private/PHPMailer/src/PHPMailer.php';
require ROOT . 'private/PHPMailer/src/SMTP.php';

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = 'smtp-relay.sendinblue.com';              //Adresse IP ou DNS du serveur SMTP
$mail->Port = 587;                                      //Port TCP du serveur SMTP
$mail->SMTPAuth = 1;                                    //Utiliser l'identification

if($mail->SMTPAuth){
   $mail->SMTPSecure = 'tsl';                           //Protocole de sécurisation des échanges avec le SMTP
   $mail->Username   =  'sim.francois@hotmail.fr';      //Adresse email à utiliser
   $mail->Password   =  'gzjZEY2ONyVnBC4Q';             //Mot de passe de l'adresse email à utiliser
}
$mail->CharSet = 'UTF-8';                               //Format d'encodage à utiliser pour les caractères

$mail->smtpConnect();

$mail->From       =  'Carpoolcontact@support.fr';      //L'email à afficher pour l'envoi
$mail->FromName   = 'AdminCarpool';                    //L'alias à afficher pour l'envoi

$mail->Subject    =  'Mot de passe oublié';            //Le sujet du mail
$mail->WordWrap   = 42; 			                   //Nombre de caracteres pour le retour a la ligne automatique
    //Texte brut
$mail->IsHTML(true);

if(!empty($_POST))
{
    $user_email = $_POST['user_email'];
    
    $stmt = $bdd->prepare("SELECT * FROM tbl_user WHERE user_email=?");
    $stmt->execute([$user_email]); 
    $user = $stmt->fetch();
    if ($user)
    {
        $id = $user['user_id'];
        $token= getJwt(['user_id' => $id], 'azerty' );
        
        $mail->addAddress($user_email);
        // Changer l'adresse pour https://carpool.diasdany.fr/
        $mail->Body = 'Voici le lien pour reset le mot de passe : <a href="http://covoiturage/?page=new-password&token='.$token.'">Reinitialiser mon mot de passe</a>';
        if (!$mail->send())
        {
            echo $mail->ErrorInfo;
        }
    }
}