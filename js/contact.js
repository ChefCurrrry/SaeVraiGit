// Sélectionne tous les boutons de navigation ayant la classe .navBouton
const boutonsNav = document.querySelectorAll('.navBouton')
// Récupère le titre de la page active (ce qui est affiché dans l'onglet)
const pageActive = document.title

// Parcourt chaque bouton de navigation
boutonsNav.forEach(bouton => {
    // Si le texte du bouton correspond au titre de la page
    if (bouton.textContent === pageActive) {
        // Ajoute la classe 'active' au bouton pour le styliser comme actif
        bouton.classList.add('active')
    }
})
const menuToggle = document.querySelector('.menu-toggle');
const containerBouton = document.querySelector('.containerBouton');

menuToggle.addEventListener('click', () => {
    containerBouton.classList.toggle('show'); // Affiche ou masque le menu
});
