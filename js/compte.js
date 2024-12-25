const menuToggle = document.querySelector('.menu-toggle');
const containerBouton = document.querySelector('.containerBouton');

menuToggle.addEventListener('click', () => {
    containerBouton.classList.toggle('show'); // Affiche ou masque le menu
});

