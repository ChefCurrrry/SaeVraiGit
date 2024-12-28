const menuToggle = document.querySelector('.menu-toggle');
const containerBouton = document.querySelector('.containerBouton');

menuToggle.addEventListener('click', () => {
    containerBouton.classList.toggle('show'); // Affiche ou masque le menu
});

// Fonction pour afficher/masquer le mot de passe
const showPasswordCheckbox = document.getElementById('show-password');
const passwordField = document.getElementById('password');

showPasswordCheckbox.addEventListener('change', function() {
    // Si la case est cochée, afficher le mot de passe
    if (this.checked) {
        passwordField.type = 'text';
    } else {
        passwordField.type = 'password';
    }
});