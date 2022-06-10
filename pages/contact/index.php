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
    <link rel="stylesheet" href="../styles/contact.css">
    <title>Carpool | À propos</title>
</head>
<body>
    <?php include ROOT . 'includes/burger-menu.html.php'; ?>
    <div class="toile">
        <div class="first-space">
            <span>Ne nous contactez pas</span>
            <h1>carpool@fakemail.com</h1>
        </div>
        <div class="second-space">
            <img src="../assets/images/cadeau.png">
            <p>
                Μεταφράσατε αυτή την πρόταση γιατί δεν μπορείτε να διαβάσετε ελληνικά, συγχαρητήρια! Επισκεφτείτε τη σελίδα σχετικά για να μάθετε περισσότερα. την αλήθεια αυτού που μας περιβάλλει.
            </p>
        </div>
    </div>




    <?php include ROOT . 'includes/footer.html.php'; ?>
<script src="../scripts/main.js"></script>
<script src="../scripts/burger-anim.js"></script>
</body>
</html>