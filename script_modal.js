// Récupérer le lien "Nouveau personnage"
var newCharacterLink = document.querySelector('a[href="#"]');

// Récupérer la modale
var modal = document.getElementById('modal');

// Lorsque le lien est cliqué, afficher la modale
newCharacterLink.addEventListener('click', function(event) {
    event.preventDefault(); // Empêche le lien de suivre son comportement par défaut
    modal.style.display = 'block'; // Affiche la modale
});

// Lorsque l'utilisateur clique en dehors de la modale, celle-ci se ferme
window.addEventListener('click', function(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
});
