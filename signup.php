<?php
//relie la page .PHP permettant de se connecter a la base de donnée avec le PDO
 require_once 'connection.php';

// Vérifier si les données du formulaire ont été soumises
if(isset($_POST['new_username']) && isset($_POST['new_password'])) {
    // Récupérer les données du formulaire
    $new_username = $_POST['new_username'];
    $new_password = $_POST['new_password'];

    // Hasher le mot de passe
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
print_r($hashed_password);
    // Préparer la requête SQL
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $statement = $connection->prepare($sql);

    // Exécuter la requête en liant les valeurs
    try {
        $statement->execute([$new_username, $hashed_password]);
        echo "Inscription réussie !";
    } catch(PDOException $error) {
        echo "Erreur lors de l'inscription : " . $error->getMessage();
    }
} else {
    echo "Veuillez soumettre le formulaire d'inscription.";
}


?>

<form action="signup.php" method="POST">
        <label for="new_username">Nouveau nom d'utilisateur:</label><br>
        <input type="text" id="new_username" name="new_username" required><br>
        <label for="new_password">Nouveau mot de passe:</label><br>
        <input type="password" id="new_password" name="new_password" required><br><br>
        <input type="submit" value="Créer un compte">
    </form>