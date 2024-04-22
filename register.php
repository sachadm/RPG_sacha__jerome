<?php
// Démarre une session PHP pour gérer les variables de session
session_start();
// Inclut le fichier de connexion à la base de données
require_once ('connection.php');

// Vérifie si l'utilisateur est déjà connecté, s'il l'est, le redirige vers la page de jeu
if (isset($_SESSION['user_id'])) {
    header("Location: game.php");
    exit;
}

// Vérifie si la requête est de type POST et si le formulaire d'inscription a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    // Récupère les données du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérifie si le nom d'utilisateur existe déjà dans la base de données
    $statement = $pdo->prepare("SELECT COUNT(*) FROM users WHERE user_name = :username");
    $statement->execute(['username' => $username]);
    $count = $statement->fetchColumn();

    if ($count > 0) {
        // Affiche un message d'erreur si le nom d'utilisateur est déjà utilisé
        $error = "Ce nom d'utilisateur est déjà utilisé. Veuillez en choisir un autre.";
    } else {
        // Si le nom d'utilisateur est disponible, procède à l'insertion dans la base de données
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $insertStatement = $pdo->prepare("INSERT INTO users (user_name, password) VALUES (:username, :password)");
        $result = $insertStatement->execute(['username' => $username, 'password' => $hashed_password]);

        if ($result) {
            // Stocke l'ID de l'utilisateur dans la variable de session
            $_SESSION['user_id'] = $pdo->lastInsertId();

            // Redirige l'utilisateur vers game.php après la création du compte
            header("Location: game.php");
            exit;
        } else {
            // Affiche un message d'erreur en cas d'échec de l'insertion dans la base de données
            $error = "Une erreur s'est produite lors de la création du compte. Veuillez réessayer.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Configuration des métadonnées de la page -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./IMAGES/epees.png">
    <!-- Inclusion de la feuille de style -->
    <link rel="stylesheet" href="style.css">
    <!-- Préconnexion aux polices de caractères -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <!-- Chargement des polices de caractères -->
    <link href="https://fonts.bunny.net/css?family=bigelow-rules:400|chelsea-market:400|finger-paint:400|new-rocker:400"
        rel="stylesheet" />
    <!-- Titre de la page -->
    <title>Evermist Dungeons</title>
</head>

<body>
    <div class="container">
        <!-- Titre de la page -->
        <h1>Evermist<span class="dungeon">Dungeons</span></h1>
        <!-- Titre du formulaire d'inscription -->
        <h2>Inscription</h2>
        <!-- Affichage des messages d'erreur -->
        <div class="boxError">
            <?php if (isset($error))
                echo "<p>$error</p>"; ?>
        </div>
        <!-- Formulaire d'inscription -->
        <form id="registerForm" action="" method="POST">
            <!-- Champ de saisie pour le nom d'utilisateur -->
            <div class="input-group">
                <input class="input" type="text" id="username" name="username" autocomplete="off" required>
                <label for="username" class="user-label">Nouveau nom d'utilisateur</label>
            </div>
            <!-- Champ de saisie pour le mot de passe -->
            <div class="input-group">
                <input class="input" type="password" id="password" name="password" autocomplete="off" required>
                <label for="password" class="user-label">Nouveau mot de passe</label>
            </div>
            <!-- Bouton de soumission du formulaire -->
            <button type="submit" name="register">S'inscrire</button>
        </form>
        <!-- Lien vers la page de connexion -->
        <p class="account_link">Vous avez déjà un compte ? <a href="login.php">Se connecter</a></p>
    </div>
</body>

</html>