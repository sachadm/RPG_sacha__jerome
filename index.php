<?php
session_start();

// Vérifie s'il y a un message d'erreur dans la session
if (isset($_SESSION['errorMessage'])) {
    echo '<div class="error_zone"><p>' . $_SESSION['errorMessage'] . '</p></div>';
    // Supprime le message d'erreur de la session après l'avoir affiché
    unset($_SESSION['errorMessage']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./IMAGES/epees.png">
    <link rel="stylesheet" type="text/css" href="./style_connection.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=bigelow-rules:400|chelsea-market:400|finger-paint:400|new-rocker:400" rel="stylesheet" />
    <title>Wyrmwood Dungeons</title>
</head>
<body>
    <div class="container">
        <h1>Wyrmwood <span class="dungeon">Dungeons</span></h1>
        <h2>Connexion</h2>
        <?php
        if(isset($_GET['action']) && $_GET['action'] == 'register') {
            require('register.php');
        } else {
            require('login.php');
        }
        ?>
    </div>
</body>
</html>
