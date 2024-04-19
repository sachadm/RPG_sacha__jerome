<?php
// Votre code de traitement du formulaire ici

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si les champs sont remplis
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        // Connexion à la base de données
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "rpg_sacha_jerome";

        try {
            $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Récupère les données du formulaire
            $usernameInput = $_POST["username"];
            $passwordInput = $_POST["password"];

            // Prépare et exécute la requête pour récupérer l'utilisateur
            $stmt = $connection->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->execute(['username' => $usernameInput]);
            $user = $stmt->fetch();

            // Vérifie si l'utilisateur existe et si le mot de passe est correct
            if ($user && password_verify($passwordInput, $user['password'])) {
                // Authentification réussie, redirige vers la page JDR_combat.php
                header("Location: JDR_combat.php");
                exit();
            } else {
                // Mauvais nom d'utilisateur ou mot de passe, définit un message d'erreur
                if (!$user) {
                    $_SESSION['errorMessage'] = "Nom d'utilisateur incorrect.";
                } else {
                    $_SESSION['errorMessage'] = "Mot de passe incorrect.";
                }
            }
        } catch(PDOException $error) {
            // Affiche un message d'erreur
            echo "Erreur : " . $error->getMessage();
        }
    } else {
        // Affiche un message d'erreur si les champs ne sont pas remplis
        $_SESSION['errorMessage'] = "Veuillez remplir tous les champs.";
    }

    // Redirige vers index.php
    header("Location: index.php");
    exit();
}
?>

<form id="loginForm" action="login.php" method="POST">
    <div class="input-group">
        <input required="" type="text" id="username" name="username" autocomplete="off" class="input">
        <label class="user-label">Nom d'utilisateur</label>
    </div>
                
    <div class="input-group">
        <input required="" type="password" id="password" name="password" autocomplete="off" class="input">
        <label class="user-label">Mot de passe</label>
    </div>
    <button type="submit">Connexion</button>
</form>
<p class="account_link" id="createAccountLinkLogin">Vous n'avez pas de compte ? <a href="index.php?action=register">Créer un compte</a></p>
