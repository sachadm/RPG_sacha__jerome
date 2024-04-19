<?php
session_start();

// Vérifie si le formulaire a été soumis
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
            $username = $_POST["username"];
            $password = $_POST["password"];

            // Prépare et exécute la requête pour récupérer l'utilisateur
            $stmt = $connection->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->execute(['username' => $username]);
            $user = $stmt->fetch();

            // Vérifie si l'utilisateur existe et si le mot de passe est correct
            if ($user && password_verify($password, $user['password'])) {
                // Authentification réussie, redirige vers la page JDR_combat.php
                header("Location: JDR_combat.php");
                exit();
            } else {
                // Mauvais nom d'utilisateur ou mot de passe, définit un message d'erreur
                $errorMessage = "Nom d'utilisateur ou mot de passe incorrect.";
                // Redirige vers la page de connexion avec un message d'erreur
                header("Location: index.php?error=" . urlencode($errorMessage));
                exit();
            }
        } catch(PDOException $error) {
            // Affiche un message d'erreur
            echo "Erreur : " . $error->getMessage();
        }
    } else {
        // Affiche un message d'erreur si les champs ne sont pas remplis
        $errorMessage = "Veuillez remplir tous les champs.";
        // Redirige vers la page de connexion avec un message d'erreur
        header("Location: index.php?error=" . urlencode($errorMessage));
        exit();
    }
}
?>
