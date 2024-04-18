<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "rpg_sacha_jerome";

$errorMessage = ""; // Variable pour stocker les messages d'erreur

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $inputUsername = $_POST['username'];
            $inputPassword = $_POST['password'];

            $checkUserQuery = "SELECT * FROM users WHERE username=:username";
            $checkUserStmt = $pdo->prepare($checkUserQuery);
            $checkUserStmt->execute(['username' => $inputUsername]);

            if ($checkUserStmt->rowCount() > 0) {
                $user = $checkUserStmt->fetch();
                if (password_verify($inputPassword, $user['password'])) {
                    header("Location: JDR_combat.php");
                    exit();
                } else {
                    $errorMessage = "Mot de passe incorrect.";
                }
            } else {
                $errorMessage = "Utilisateur non trouvé.";
            }
        } else {
            $errorMessage = "Veuillez remplir tous les champs.";
        }
    }
} catch(PDOException $exception) {
    echo "Erreur : " . $exception->getMessage();
}

$pdo = null;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Wyrmwood Dungeons</title>
    <link rel="icon" type="image/png" href="./IMAGES/epees.png">
    <link rel="stylesheet" type="text/css" href="./style_connection.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=bigelow-rules:400|chelsea-market:400|finger-paint:400|new-rocker:400" rel="stylesheet" />
    <script defer src="./script_connection.js"></script>
</head>
<body>
    <div class="container" id="loginContainer">
        <h1>Wyrmwood <span class="dungeon">Dungeons</span></h1>
        <h2>Connexion</h2>
        <div class="error_zone">
            <!-- Affichage du message d'erreur -->
            <?php if(isset($errorMessage)) { ?>
                <p><?php echo $errorMessage; ?></p>
            <?php } ?>
        </div>
        <form id="loginForm" action="index.php" method="POST">
            <div class="input-group">
                <input required="" type="text" id="username" name="username" autocomplete="off" class="input">
                <label class="user-label">Nom d'utilisateur</label>
            </div>
            
            <div class="input-group">
                <input required="" type="password" id="password" name="password" autocomplete="off" class="input">
                <label class="user-label">Mot de passe</label>
            </div>
            
            <input type="submit" value="Se connecter" class="full-rounded">
        </form>
        <p class="account_link" id="createAccountLinkLogin">Pas de compte ? <a href="#" id="toggleFormsLinkLogin">Créer un compte</a></p>

    </div>

    <div class="container hide" id="registerContainer">
        <h1>Wyrmwood <span class="dungeon">Dungeons</span></h1>
        <h2>Inscription</h2>
        <div class="error_zone">
            <!-- Affichage du message d'erreur -->
            <?php if(isset($errorMessage)) { ?>
                <p><?php echo $errorMessage; ?></p>
            <?php } ?>
        </div>
        <form id="registerForm" action="register.php" method="POST">
            <div class="input-group">
                <input required="" type="text" id="newUsername" name="newUsername" autocomplete="off" class="input">
                <label class="user-label">Nouveau Nom d'utilisateur</label>
            </div>
            
            <div class="input-group">
                <input required="" type="password" id="newPassword" name="newPassword" autocomplete="off" class="input">
                <label class="user-label">Nouveau Mot de passe</label>
            </div>
            
            <input type="submit" value="Créer un compte" class="full-rounded">
        </form>
        <p class="account_link" id="createAccountLinkRegister">Vous avez déjà un compte ? <a href="#" id="toggleFormsLinkRegister">Formulaire de connexion</a></p>
    </div>
</body>
</html>
