<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$database = "rpg_sacha_jerome";

try {
    // Création d'un nouvel objet PDO pour se connecter à la base de données
    $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // Configuration pour générer une exception si une erreur survient
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérification si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupération des données du formulaire
        $new_username = $_POST["new_username"];
        $new_password = $_POST["new_password"];

        // Hash du mot de passe
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Préparation de la requête SQL pour insérer un nouvel utilisateur
        $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $statement = $connection->prepare($query);
        
        // Liaison des paramètres
        $statement->bindParam(':username', $new_username);
        $statement->bindParam(':password', $hashed_password);

        // Exécution de la requête
        $statement->execute();

        // Redirection vers la page JDR_combat.php après l'inscription réussie
        header("Location: JDR_combat.php");
        exit(); // Assure que le script s'arrête après la redirection
    }
} catch(PDOException $error) {
    // En cas d'erreur, définit un message d'erreur
    $errorMessage = "Erreur : " . $error->getMessage();
    // Redirige vers la page de connexion avec un message d'erreur
    header("Location: index.php?error=" . urlencode($errorMessage));
    exit();
}
?>