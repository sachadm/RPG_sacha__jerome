<?php
// Démarre une session PHP pour gérer les variables de session
session_start();
// Inclut le fichier de connexion à la base de données
require_once('connection.php');

// Vérifie si l'utilisateur est déjà connecté, s'il l'est, le redirige vers la page de jeu
if (isset($_SESSION['user_id'])) {
    header("Location: game.php");
    exit;
}

// Vérifie si la requête est de type POST et si le formulaire de connexion a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    // Récupère les données du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prépare et exécute une requête pour récupérer l'identifiant et le mot de passe de l'utilisateur à partir de la base de données
    $statement = $pdo->prepare("SELECT id, password FROM users WHERE user_name = :username");
    $statement->execute(['username' => $username]);
    // Récupère une ligne de résultat (le premier utilisateur correspondant au nom d'utilisateur)
    $user = $statement->fetch();

    // Vérifie si un utilisateur a été trouvé et si le mot de passe correspond
    if ($user && password_verify($password, $user['password'])) {
        // Stocke l'identifiant de l'utilisateur dans la variable de session
        $_SESSION['user_id'] = $user['id'];
        
        // Redirige l'utilisateur vers game.php après la connexion réussie
        header("Location: game.php");
        exit;
    } else {
        // Affiche un message d'erreur si le nom d'utilisateur ou le mot de passe est incorrect
        $error = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./IMAGES/epees.png">
    <!-- Inclusion de la feuille de style -->
    <link rel="stylesheet" href="style.css">
    <!-- Préconnexion aux polices de caractères -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <!-- Chargement des polices de caractères -->
    <link href="https://fonts.bunny.net/css?family=bigelow-rules:400|chelsea-market:400|finger-paint:400|new-rocker:400" rel="stylesheet" />
    <!-- Titre de la page -->
    <title>Evermist Dungeons</title>
</head>
<body>
<div class="container">
    <!-- Titre de la page -->
    <h1>Evermist<span class="dungeon">Dungeons</span></h1>
    <!-- Titre du formulaire de connexion -->
    <h2>Connexion</h2>
    <!-- Affichage des messages d'erreur -->
    <div class="boxError">
        <?php if (isset($error)) echo "<p>$error</p>"; ?>
    </div>
    <!-- Formulaire de connexion -->
    <form id="registerForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <!-- Champ de saisie pour le nom d'utilisateur -->
        <div class="input-group">
            <input class="input" type="text" id="username" name="username" autocomplete="off" required>
            <label for="username" class="user-label">Nom d'utilisateur</label>
        </div>
        <!-- Champ de saisie pour le mot de passe -->
        <div class="input-group">
            <input class="input" type="password" id="password" name="password" autocomplete="off" required>
            <label for="password" class="user-label">Mot de passe</label>
        </div>
        <!-- Bouton de soumission du formulaire -->
        <button type="submit" name="login">Se connecter</button>
    </form>
    <!-- Lien vers la page d'inscription -->
    <p class="account_link">Vous n'avez pas de compte ? <a href="register.php">Créer un compte</a></p>
</div>
</body>
</html>
