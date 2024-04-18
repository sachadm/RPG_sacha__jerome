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