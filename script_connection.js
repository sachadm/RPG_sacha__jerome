document.addEventListener("DOMContentLoaded", function() {
    // Fonction pour basculer entre les formulaires
    function toggleForms() {
        var loginContainer = document.getElementById('loginContainer');
        var registerContainer = document.getElementById('registerContainer');

        loginContainer.classList.toggle('hide');
        registerContainer.classList.toggle('hide');

        var createAccountLinkLogin = document.getElementById('createAccountLinkLogin');
        var createAccountLinkRegister = document.getElementById('createAccountLinkRegister');

        if (loginContainer.classList.contains('hide')) {
            createAccountLinkLogin.innerHTML = "Déjà un compte ? <a href='#' id='toggleFormsLinkLogin'>Se connecter</a>";
            createAccountLinkRegister.innerHTML = "Vous avez déjà un compte ? <a href='#' id='toggleFormsLinkRegister'>Formulaire de connexion</a>";
        } else {
            createAccountLinkLogin.innerHTML = "Pas de compte ? <a href='#' id='toggleFormsLinkLogin'>Créer un compte</a>";
            createAccountLinkRegister.innerHTML = "Pas de compte ? <a href='#' id='toggleFormsLinkRegister'>Créer un compte</a>";
        }
    }

    // Ajout de l'événement de clic une fois le DOM chargé
    document.getElementById('createAccountLinkLogin').addEventListener('click', function(event) {
        event.preventDefault(); // Empêche le comportement par défaut du lien
        toggleForms();
    });

    document.getElementById('createAccountLinkRegister').addEventListener('click', function(event) {
        event.preventDefault(); // Empêche le comportement par défaut du lien
        toggleForms();
    });

    document.getElementById('toggleFormsLinkLogin').addEventListener('click', function(event) {
        event.preventDefault(); // Empêche le comportement par défaut du lien
        toggleForms();
    });

    // Déplacer cet appel après l'ajout des gestionnaires d'événements
    toggleCreateAccountLinkContent();

    function toggleCreateAccountLinkContent() {
        var loginContainer = document.getElementById('loginContainer');
        var createAccountLinkLogin = document.getElementById('createAccountLinkLogin');

        if (loginContainer.classList.contains('hide')) {
            createAccountLinkLogin.innerHTML = "Déjà un compte ? <a href='#' id='toggleFormsLinkLogin'>Se connecter</a>";
        } else {
            createAccountLinkLogin.innerHTML = "Pas de compte ? <a href='#' id='toggleFormsLinkLogin'>Créer un compte</a>";
        }
    }
});
