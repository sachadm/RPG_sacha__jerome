<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$database = "rpg (sacha & jerome)";

try {
    // Création d'un nouvel objet PDO pour se connecter à la base de données
    $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // Configuration pour générer une exception si une erreur survient
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Message indiquant que la connexion est établie
    echo "connected to ". $database;
} catch(PDOException $error) {
    // En cas d'erreur, affiche un message d'erreur
    echo "NOPE: " . $error->getMessage();
}
?>