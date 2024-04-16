<?php
//relie la page .PHP permettant de se connecter a la base de donnée avec le PDO
 require_once 'connection.php';

// Vérifier si les données du formulaire ont été soumises
if(isset($_POST['username']) && isset($_POST['password'])) {
    // Récupérer les données du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Préparer la requête pour éviter les injections SQL
    $sql = "SELECT * FROM users WHERE username=:username";
    $statement = $connection->prepare($sql);
    $statement->bindParam(':username', $username);
    $statement->execute();

    // Vérifier si l'utilisateur existe dans la base de données
    if ($statement->rowCount() > 0) {
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $row['password'])) {
            echo "Connexion réussie ! Bienvenue, " . $username . " !";
        } else {
            echo "Nom d'utilisateur ou mot de passe incorrect.";
        }
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
} else {
    echo "Veuillez soumettre le formulaire de connexion.";
}


?>

<form action="login.php" method="POST">
        <label for="username">Nom d'utilisateur:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Mot de passe:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Se connecter">
    </form>