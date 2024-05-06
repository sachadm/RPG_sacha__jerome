<?php
session_start();
require_once('connection.php');

if (isset($_SESSION['idusers'])) {
    header("Location: game.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérifier si le nom d'utilisateur existe déjà dans la base de données
    $statement = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = :username");
    $statement->execute(['username' => $username]);
    $count = $statement->fetchColumn();

    if ($count > 0) {
        // Nom d'utilisateur déjà utilisé, afficher un message d'erreur
        $error = "Ce nom d'utilisateur est déjà utilisé. Veuillez en choisir un autre.";
    } else {
        // Nom d'utilisateur disponible, procéder à l'insertion dans la base de données
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $insertStatement = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $result = $insertStatement->execute(['username' => $username, 'password' => $hashed_password]);

        if ($result) {
            // Stocke l'ID de l'utilisateur dans la variable de session
            $_SESSION['idusers'] = $pdo->lastInsertId();

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./IMAGES/epees.png">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=bigelow-rules:400|chelsea-market:400|finger-paint:400|new-rocker:400" rel="stylesheet" />
    <title>Evermist Dungeons</title>
</head>
<body>
<div class="container">
    <h1>Evermist<span class="dungeon">Dungeons</span></h1>
    <h2>Inscription</h2>
    <div class="boxError">
        <?php if (isset($error)) echo "<p>$error</p>"; ?>
    </div>
    <form id="registerForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="input-group">
            <input class="input" type="text" id="username" name="username" autocomplete="off" required>
            <label for="username" class="user-label">Nouveau nom d'utilisateur</label>
        </div>
        <div class="input-group">
            <input class="input" type="password" id="password" name="password" autocomplete="off" required>
            <label for="password" class="user-label">Nouveau mot de passe</label>
        </div>
        <button type="submit" name="register">S'inscrire</button>
    </form>
    <p class="account_link">Vous avez déjà un compte ? <a href="login.php">Se connecter</a></p>
</body>
</html>
