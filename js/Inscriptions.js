const menuToggle = document.querySelector('.menu-toggle');
const containerBouton = document.querySelector('.containerBouton');

menuToggle.addEventListener('click', () => {
    containerBouton.classList.toggle('show'); // Affiche ou masque le menu
});
// Fonction pour afficher/masquer les recommandations
const showRecommendationsIcon = document.getElementById('show-recommendations');
const recommendationsSection = document.getElementById('password-recommendations');

showRecommendationsIcon.addEventListener('click', function() {
    // Alterner l'affichage des recommandations
    if (recommendationsSection.style.display === 'none') {
        recommendationsSection.style.display = 'block';
    } else {
        recommendationsSection.style.display = 'none';
    }
});

// Fonction pour afficher/masquer le mot de passe
const showPasswordCheckbox = document.getElementById('show-password');
const passwordField = document.getElementById('password');
const rePasswordField = document.getElementById('re_password');

showPasswordCheckbox.addEventListener('change', function() {
    // Si la case est cochée, afficher le mot de passe
    if (this.checked) {
        passwordField.type = 'text';
        rePasswordField.type = 'text';
    } else {
        passwordField.type = 'password';
        rePasswordField.type = 'password';
    }
});