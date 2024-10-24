/*   Abdel
  ---------------------- Code qui lorsqu'on Hover une nouvelle, rend le texte visible et lorqu'on quitte, le cache ------------------------------ */
// Select all elements that have class 'list-service__assos', 'list-service__truc', 'list-service__cool', etc.
const serviceDiv = document.querySelectorAll(".list-service > div"); // Choisis la div enfant directe de .list-service
const serviceTexte = document.querySelectorAll(".page-service__texte"); // Choisis le texte dans .list-service
const serviceBtn = document.querySelectorAll(".page-service__btn"); //  Choisis le btn dans .list-service

// Toogle la visibilité selon si la souris Hover ou pas
serviceDiv.forEach((element, index) => {
  element.addEventListener("mouseenter", () => {
    serviceTexte[index].style.opacity = "1";
    serviceTexte[index].style.visibility = "visible";
    serviceBtn[index].style.opacity = "1";
    serviceBtn[index].style.visibility = "visible";
  });

  element.addEventListener("mouseleave", () => {
    serviceTexte[index].style.opacity = "0";
    serviceTexte[index].style.visibility = "hidden";
    serviceBtn[index].style.opacity = "0";
    serviceBtn[index].style.visibility = "hidden";
  });
});
/*
const serviceImages = document.querySelectorAll('.page-service__assos img, .page-service__crr img, .page-service__locataire img');

function updateImageSources() {
  const screenWidth = window.innerWidth;

  serviceImages.forEach((img) => {
    if (screenWidth >= 765) {
      if (img.parentElement.classList.contains('page-service__assos')) {
        img.src = '../assets/medias/services/memoire.jpg'; // Change to desired image
      } else if (img.parentElement.classList.contains('page-service__crr')) {
        img.src = '../assets/medias/services/memoire.jpg'; // Change to desired image
      } else if (img.parentElement.classList.contains('page-service__locataire')) {
        img.src = '../assets/medias/services/memoire.jpg'; // Change to desired image
      }
    } else {
      // Reset to original images
      if (img.parentElement.classList.contains('page-service__assos')) {
        img.src = '../assets/medias/services/comite-association.jpg';
      } else if (img.parentElement.classList.contains('page-service__crr')) {
        img.src = '../assets/medias/services/meeting-crr.jpg';
      } else if (img.parentElement.classList.contains('page-service__locataire')) {
        img.src = '../assets/medias/services/Donner_cle-locataire.jpg';
      }
    }
  });
}


// Initial check
updateImageSources();

// Event listener for window resize
window.addEventListener('resize', updateImageSources);
  */

document.addEventListener("DOMContentLoaded", function () {
  const items = document.querySelectorAll(".hero__item");
  let currentIndex = 0;

  // Affiche la première image
  items[currentIndex].classList.add("active");

  setInterval(() => {
    // Retire la classe 'active' de l'image actuelle
    items[currentIndex].classList.remove("active");

    // Passe à l'image suivante
    currentIndex = (currentIndex + 1) % items.length; // Réinitialise à 0 si atteint la fin

    // Ajoute la classe 'active' à la nouvelle image
    items[currentIndex].classList.add("active");
  }, 3000); // Change d'image toutes les 3 secondes
});
