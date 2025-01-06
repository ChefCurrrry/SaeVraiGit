const menuToggle = document.querySelector('.menu-toggle');
const containerBouton = document.querySelector('.containerBouton');

menuToggle.addEventListener('click', () => {
    containerBouton.classList.toggle('show'); // Affiche ou masque le menu
});


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


// Sélectionne tous les éléments ayant la classe .circle (cercles interactifs)
const boutonsInfo = document.querySelectorAll('.circle1, .circle2, .circle3, .circle4')
// Sélectionne l'élément qui affichera le texte associé aux cercles
const texteAffiche = document.getElementById('output')

// Parcourt chaque cercle
boutonsInfo.forEach(boutonI => {
    // Ajoute un événement au clic sur chaque cercle
    boutonI.addEventListener('click', () => {
        // Récupère l'attribut 'data-paragraphe' du cercle cliqué
        const paragraphe = boutonI.getAttribute('data-paragraphe')
        // Change le texte de l'élément #output pour afficher le paragraphe correspondant
        texteAffiche.textContent = paragraphe
    })
})


let observer = new IntersectionObserver(function(entries){
    entries.forEach(entry=>{
        if(entry.isIntersecting) {
            commencerAnimation(entry.target);
        }
    });
},{
    threshold: 0.5
});

let items = document.querySelectorAll('.num');

items.forEach(function(item){
    observer.observe(item);
});

function commencerAnimation(element){
    const valeurChange = element;

    const dureeTotale = 2000;

    let valeurDebut = parseInt(valeurChange.getAttribute('data-start')) || 0;
    let valeurFin = parseInt(valeurChange.getAttribute('data-value'));
    let increment =(valeurFin - valeurDebut) / (dureeTotale/10);

    const compteur = setInterval(function() {
        valeurDebut += increment;
        if(valeurDebut >= valeurFin) {
            valeurChange.textContent = valeurFin;
            clearInterval(compteur);
        } else {
            valeurChange.textContent = Math.floor(valeurDebut)
        }
    }, 10);

}