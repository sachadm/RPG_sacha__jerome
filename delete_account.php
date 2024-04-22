<?php
session_start();
require_once('connection.php');

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: login.php");
    exit;
}

// Traitement de la demande de suppression du compte
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_account'])) {
    // Supprimer le compte de l'utilisateur de la base de données
    $user_id = $_SESSION['user_id'];
    $deleteStatement = $pdo->prepare("DELETE FROM users WHERE id = :user_id");
    $deleteStatement->execute(['user_id' => $user_id]);

    // Déconnexion de l'utilisateur
    session_destroy();
    // Rediriger vers une page de confirmation ou une autre page appropriée
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer mon compte</title>
</head>
<body>
    <h1>Supprimer mon compte</h1>
    <p>Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.</p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <button type="submit" name="delete_account">Confirmer la suppression</button>
    </form>
</body>
</html>
