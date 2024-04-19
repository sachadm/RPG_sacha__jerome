<?php
require_once 'connection.php';
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si un fichier a été sélectionné
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
    
    $nom_image = $_FILES["image"]["name"];

    // emplacement du dossier portrait à concaténer
$cheminendur = "C:\Users\ACS\Documents\GitHub\RPG_TP_(sacha_jérome)\RPG_sacha__jerome\PortraitTest\\";

// Concaténation pour former une nouvelle variable
$chemincomplet = $cheminendur . $nom_image;

// Affichage de la nouvelle variable
echo "chemin complet du portrait : " .  $chemincomplet;
}
}
////////////////////////////////////////////////////////////////////////////
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si la clé 'countingPV' existe dans $_POST
    if (isset($_POST['countingPV'])) {
        // Récupère la valeur de 'countingPV' depuis $_POST
        $countingPV = $_POST['countingPV'];
        
        // Utilisez $countingPV comme vous le souhaitez
        echo "La valeur de countingPV est : " .  $countingPV;
    } else {
        echo "La clé countingPV n'a pas été trouvée dans la requête POST.";
    }
}
/////////////////////////////////////////////////////////////////////////
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si la clé 'countingMana' existe dans $_POST
    if (isset($_POST['countingMana'])) {
        // Récupère la valeur de 'countingMana' depuis $_POST
        $countingMana = $_POST['countingMana'];
        
        // Utilisez $countingMana comme vous le souhaitez
        echo "La valeur de countingMana est : " .  $countingMana;
    } else {
        echo "La clé countingMana n'a pas été trouvée dans la requête POST.";
    }
}
///////////////////////////////////////////////////////////////////////
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si la clé 'countingATK' existe dans $_POST
    if (isset($_POST['countingATK'])) {
        // Récupère la valeur de 'countingATK' depuis $_POST
        $countingATK = $_POST['countingATK'];
        
        // Utilisez $countingATK comme vous le souhaitez
        echo "La valeur de countingATK est : " .  $countingATK;
    } else {
        echo "La clé countingATK n'a pas été trouvée dans la requête POST.";
    }
}
////////////////////////////////////////////////////////////////////////
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si la clé 'countingInit' existe dans $_POST
    if (isset($_POST['countingInit'])) {
        // Récupère la valeur de 'countingInit' depuis $_POST
        $countingInit = $_POST['countingInit'];
        
        // Utilisez $countingInit comme vous le souhaitez
        echo "La valeur de countingInit est : " .  $countingInit;
    } else {
        echo "La clé countingInit n'a pas été trouvée dans la requête POST.";
    }
}
///////////////////////////////////////////////////////////////////////////
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si la clé 'countingDEF' existe dans $_POST
    if (isset($_POST['countingDEF'])) {
        // Récupère la valeur de 'countingDEF' depuis $_POST
        $countingDEF = $_POST['countingDEF'];
        
        // Utilisez $countingDEF comme vous le souhaitez
        echo "La valeur de countingDEF est : " .  $countingDEF;
    } else {
        echo "La clé countingDEF n'a pas été trouvée dans la requête POST.";
    }
}
///////////////////////////////////////////////////////////////////////////
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si la clé 'countingDEF' existe dans $_POST
    if (isset($_POST['nom'])) {
        // Récupère la valeur de 'countingDEF' depuis $_POST
        $nom_crea = $_POST['nom'];
        
        // Utilisez $countingDEF comme vous le souhaitez
        echo "Le nom du personnage est : " .  $nom_crea;
    } else {
        echo "La clé nom n'a pas été trouvée dans la requête POST.";
    }
}

// Création de la requête SQL
// Création de la requête SQL avec des paramètres
$sql = "INSERT INTO player (users_idusers, Character_Name, Image, PV, PV_MAX, MANA, ATK, Defense, Armure, INIT, LEVEL, EXP, PO) 
        VALUES (1, :nom_crea, :chemincomplet, :countingPV, :countingPV, :countingMana, :countingATK, :countingDEF, 3, :countingInit, 1, 0, 100)";

$stmt = $connection->prepare($sql);

// Liaison des valeurs avec les paramètres
$stmt->bindParam(':nom_crea', $nom_crea);
$stmt->bindParam(':chemincomplet', $chemincomplet);
$stmt->bindParam(':countingPV', $countingPV);
$stmt->bindParam(':countingMana', $countingMana);
$stmt->bindParam(':countingATK', $countingATK);
$stmt->bindParam(':countingDEF', $countingDEF);
$stmt->bindParam(':countingInit', $countingInit);

// Exécution de la requête
try {
    $stmt->execute();
    echo "Nouvel enregistrement créé avec succès.";
} catch (PDOException $e) {
    echo "Erreur lors de la création de l'enregistrement : " . $e->getMessage();
}
    ?>
