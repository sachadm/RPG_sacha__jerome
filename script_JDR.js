// Récupérer les éléments à manipuler
const equipementText = document.getElementById("equipementText");
const inventoryZone = document.getElementById("inventoryZone");
const btnEquipement = document.getElementById("btnEquipement");
const btnInventaire = document.getElementById("btnInventaire");

// Événement clic sur le bouton Equipement
btnEquipement.addEventListener("click", function() {
    equipementText.style.display = "flex";
    inventoryZone.style.display = "none";
});

// Événement clic sur le bouton Inventaire
btnInventaire.addEventListener("click", function() {
    equipementText.style.display = "none";
    inventoryZone.style.display = "flex";
});

// Récupérer les éléments à manipuler pour l'ennemi
const equipementTextEnemy = document.getElementById("equipementTextEnemy");
const inventoryZoneEnemy = document.getElementById("inventoryZoneEnemy");
const btnEquipementEnemy = document.getElementById("btnEquipementEnemy");
const btnInventaireEnemy = document.getElementById("btnInventaireEnemy");

// Événement clic sur le bouton Equipement ennemi
btnEquipementEnemy.addEventListener("click", function() {
    equipementTextEnemy.style.display = "flex";
    inventoryZoneEnemy.style.display = "none";
});

// Événement clic sur le bouton Inventaire ennemi
btnInventaireEnemy.addEventListener("click", function() {
    equipementTextEnemy.style.display = "none";
    inventoryZoneEnemy.style.display = "flex";
});