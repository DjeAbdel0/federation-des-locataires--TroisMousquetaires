/* -------------   Abdel    ------------- */
/* ---------------------- Code qui lorsqu'on Hover une nouvelle, rend le texte visible et lorqu'on quitte, le cache ------------------------------ */

const serviceDiv = document.querySelectorAll(".page-service > div"); // Choisis la div enfant directe de .list-service
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
