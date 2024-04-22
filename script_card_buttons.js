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

