<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "rpg_sacha_jerome";

// Variable pour stocker le message d'erreur
$errorMsg = "";

try {
    // Connexion à la base de données
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérification de la méthode POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['newUsername']) && isset($_POST['newPassword'])) {
            $newUsername = $_POST['newUsername'];
            $newPassword = $_POST['newPassword'];

            // Vérification si l'utilisateur existe déjà
            $checkUserQuery = "SELECT * FROM users WHERE username=:username";
            $checkUserStmt = $pdo->prepare($checkUserQuery);
            $checkUserStmt->execute(['username' => $newUsername]);

            // Si l'utilisateur existe déjà
            if ($checkUserStmt->rowCount() > 0) {
                // Stocker le message d'erreur
                $errorMsg = "Cet utilisateur existe déjà.";
            } else {
                // Chiffrer le mot de passe avec password_hash
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                
                // Insérer l'utilisateur dans la base de données
                $insertUserQuery = "INSERT INTO users (username, password) VALUES (:username, :password)";
                $insertUserStmt = $pdo->prepare($insertUserQuery);
                $insertUserStmt->execute(['username' => $newUsername, 'password' => $hashedPassword]);

                // Redirection vers JDR_combat.php
                header("Location: JDR_combat.php");
                exit();
            }
        } else {
            // Si des champs sont manquants, stocker le message d'erreur
            $errorMsg = "Veuillez remplir tous les champs.";
        }
    }
} catch(PDOException $exception) {
    // En cas d'erreur de connexion à la base de données, stocker le message d'erreur
    $errorMsg = "Erreur de connexion à la base de données : " . $exception->getMessage();
}
?>
