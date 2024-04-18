<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si un fichier a été sélectionné
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) 
    
    $nom_image = $_FILES["image"]["name"];
    echo $nom_image;

    // emplacement du dossier portrait à concaténer
$string_supplementaire = "C:\Users\ACS\Documents\GitHub\RPG TP (sacha & jérome)\RPG_sacha__jerome\PortraitTest\\";

// Concaténation pour former une nouvelle variable
$nouvelle_variable = $string_supplementaire . $nom_image;

// Affichage de la nouvelle variable
echo "chemin complet du portrait : " . $nouvelle_variable;
}
    ?>

