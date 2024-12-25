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

// Sélectionne tous les éléments ayant une classe qui commence par "image-"
const images = document.querySelectorAll('.image-avaler, .image-parler, .image-respirer');

// Parcourt chaque élément et ajoute des événements
images.forEach(image => {
    // Quand la souris entre dans l'élément
    image.addEventListener('mouseenter', () => {
        image.style.transform = 'scale(1.2)'; // Agrandit légèrement
        image.style.backgroundColor = '#4caf50'; // Change la couleur en vert
        image.style.transition = 'all 0.3s ease'; // Ajoute une animation fluide
    });

    // Quand la souris quitte l'élément
    image.addEventListener('mouseleave', () => {
        image.style.transform = 'scale(1)'; // Retour à la taille normale
        image.style.backgroundColor = '#f44336'; // Retour à la couleur d'origine (rouge)
        image.style.transition = 'all 0.3s ease'; // Garde l'animation fluide
    });
});