const gap = 16;

const carousel = document.getElementById("carousel"),
  content = document.getElementById("content"),
  next = document.getElementById("next"),
  prev = document.getElementById("prev");

const carousel2 = document.getElementById("carousel2"),
  content2 = document.getElementById("content2"),
  next2 = document.getElementById("next2"),
  prev2 = document.getElementById("prev2");

const updateButtonsVisibility2 = () => {
  const items = content2.querySelectorAll('.item');
  let isAnyHiddenBefore = false;
  let isAnyHiddenAfter = false;

  const carouselRect = carousel2.getBoundingClientRect();

  items.forEach(item => {
    const itemRect = item.getBoundingClientRect();
    
    // Vérifie si l'élément est visible dans le viewport du carousel
    const isVisible = (itemRect.left >= carouselRect.left) && (itemRect.right <= carouselRect.right);

    // Marque les éléments cachés avant le viewport
    if (!isVisible && itemRect.left < carouselRect.left) {
      isAnyHiddenBefore = true;
    }
    // Marque les éléments cachés après le viewport
    if (!isVisible && itemRect.right > carouselRect.right) {
      isAnyHiddenAfter = true;
    }
  });

  // Affiche ou cache les boutons en fonction des éléments visibles
  prev2.style.display = isAnyHiddenBefore ? "flex" : "none";
  next2.style.display = isAnyHiddenAfter ? "flex" : "none";

  // Cache le bouton de gauche si aucun élément caché avant
  if (!isAnyHiddenBefore) {
    prev2.style.display = "none";
  }

  // Cache le bouton de droite si aucun élément caché après
  if (!isAnyHiddenAfter) {
    next2.style.display = "none";
  }
};

// Écouteur pour le bouton "Suivant"
next2.addEventListener("click", e => {
  carousel2.scrollBy(width2 + gap, 0);
  setTimeout(updateButtonsVisibility2, 100); // Utilisation de setTimeout pour garantir que le scroll est terminé
});

// Écouteur pour le bouton "Précédent"
prev2.addEventListener("click", e => {
  carousel2.scrollBy(-(width2 + gap), 0);
  setTimeout(updateButtonsVisibility2, 100); // Utilisation de setTimeout pour garantir que le scroll est terminé
});

let width2 = carousel2.offsetWidth;
window.addEventListener("resize", e => {
  width2 = carousel2.offsetWidth;
  updateButtonsVisibility2();
});




// Fonction pour mettre à jour la visibilité des boutons
const updateButtonsVisibility = () => {
  const items = content.querySelectorAll('.item');
  let isAnyHiddenBefore = false;
  let isAnyHiddenAfter = false;

  const carouselRect = carousel.getBoundingClientRect();

  items.forEach(item => {
    const itemRect = item.getBoundingClientRect();
    
    // Vérifie si l'élément est visible dans le viewport du carousel
    const isVisible = (itemRect.left >= carouselRect.left) && (itemRect.right <= carouselRect.right);

    // Marque les éléments cachés avant le viewport
    if (!isVisible && itemRect.left < carouselRect.left) {
      isAnyHiddenBefore = true;
    }
    // Marque les éléments cachés après le viewport
    if (!isVisible && itemRect.right > carouselRect.right) {
      isAnyHiddenAfter = true;
    }
  });

  // Affiche ou cache les boutons en fonction des éléments visibles
  prev.style.display = isAnyHiddenBefore ? "flex" : "none";
  next.style.display = isAnyHiddenAfter ? "flex" : "none";

  // Cache le bouton de gauche si aucun élément caché avant
  if (!isAnyHiddenBefore) {
    prev.style.display = "none";
  }

  // Cache le bouton de droite si aucun élément caché après
  if (!isAnyHiddenAfter) {
    next.style.display = "none";
  }
};

// Écouteur pour le bouton "Suivant"
next.addEventListener("click", e => {
  carousel.scrollBy(width + gap, 0);
  setTimeout(updateButtonsVisibility, 100); // Utilisation de setTimeout pour garantir que le scroll est terminé
});

// Écouteur pour le bouton "Précédent"
prev.addEventListener("click", e => {
  carousel.scrollBy(-(width + gap), 0);
  setTimeout(updateButtonsVisibility, 100); // Utilisation de setTimeout pour garantir que le scroll est terminé
});

let width = carousel.offsetWidth;
window.addEventListener("resize", e => {
  width = carousel.offsetWidth;
  updateButtonsVisibility();
});

// Appelle la fonction pour initialiser la visibilité des boutons
updateButtonsVisibility();
updateButtonsVisibility2();
