const menuToggle = document.querySelector('.menu-toggle');
const containerBouton = document.querySelector('.containerBouton');

menuToggle.addEventListener('click', () => {
    containerBouton.classList.toggle('show'); // Affiche ou masque le menu
});

const toggleFormButton = document.getElementById('toggleFormButton');
const addUserForm = document.getElementById('addUserForm');

toggleFormButton.addEventListener('click', () => {
    if (addUserForm.style.display === 'none') {
        addUserForm.style.display = 'block';
    } else {
        addUserForm.style.display = 'none';
    }
});