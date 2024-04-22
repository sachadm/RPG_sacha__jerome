<?php
session_start();
require_once('connection.php');

if (isset($_SESSION['user_id'])) {
    header("Location: game.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $statement = $pdo->prepare("SELECT id, password FROM users WHERE user_name = :username");
    $statement->execute(['username' => $username]);
    $user = $statement->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        
        header("Location: game.php");
        exit;
    } else {
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
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=bigelow-rules:400|chelsea-market:400|finger-paint:400|new-rocker:400" rel="stylesheet" />
    <title>Evermist Dungeons</title>
</head>
<body>
<div class="container">
    <h1>Evermist<span class="dungeon">Dungeons</span></h1>
    <h2>Connexion</h2>
    <div class="boxError">
        <?php if (isset($error)) echo "<p>$error</p>"; ?>
    </div>
    <form id="registerForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="input-group">
            <input class="input" type="text" id="username" name="username" autocomplete="off" required>
            <label for="username" class="user-label">Nom d'utilisateur</label>
        </div>
        <div class="input-group">
            <input class="input" type="password" id="password" name="password" autocomplete="off" required>
            <label for="password" class="user-label">Mot de passe</label>
        </div>
        <button type="submit" name="login">Se connecter</button>
    </form>
    <p class="account_link">Vous n'avez pas de compte ? <a href="register.php">Créer un compte</a></p>
</div>
</body>
</html>

