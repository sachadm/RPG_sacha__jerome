function increment(id) {
    var element = document.getElementById(id);
    var next = element.nextElementSibling
    var pointsElement = document.querySelector('.remaining_point'); // Sélection de la balise avec la classe "remaining_point"
    var totalPoints = parseInt(pointsElement.innerText); // Récupération de la valeur et conversion en entier
    var value = parseInt(element.innerText);
    if (totalPoints > 0) {
        value++;
        totalPoints--;
        element.innerText = value;
        next.value = value;
        pointsElement.innerText = totalPoints; // Mettre à jour la valeur affichée
    }
}

function decrement(id) {
    var element = document.getElementById(id);
    var next = element.nextElementSibling
    var pointsElement = document.querySelector('.remaining_point'); // Sélection de la balise avec la classe "remaining_point"
    var totalPoints = parseInt(pointsElement.innerText); // Récupération de la valeur et conversion en entier
    var value = parseInt(element.innerText);
    if (value > 0) {
        value--;
        totalPoints++;
        element.innerText = value;
        next.value = value;
        pointsElement.innerText = totalPoints; // Mettre à jour la valeur affichée
    }
}
//////////////////////////////////////////////////////////////////////////////////////////