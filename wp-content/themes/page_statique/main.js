/* 
-------------   Abdel    ------------- */
/* ----------------------  Hover un service, texte visible/Non-visible ------------------------------ */
const serviceDiv = document.querySelectorAll(".page-service > div"); // Choisis la div enfant directe de .list-service
const serviceTexte = document.querySelectorAll(".page-service__texte"); // Choisis le texte dans .list-service
const serviceBtn = document.querySelectorAll(".page-service__btn"); //  Choisis le btn dans .list-service
const serviceDivCrr = document.querySelectorAll(".page-service-crr > div"); // Choisis la div enfant directe de .list-service
const serviceTexteCrr = document.querySelectorAll(
  ".page-service-crr__texte-crr"
); // Choisis le texte dans .list-service

// Toogle la visibilité selon si la souris Hover ou pas
if (serviceDiv !== null) {
  //Met les elements visible
  serviceDiv.forEach((element, index) => {
    element.addEventListener("mouseenter", () => {
      serviceTexte[index].style.opacity = "1";
      serviceTexte[index].style.visibility = "visible";
      serviceBtn[index].style.opacity = "1";
      serviceBtn[index].style.visibility = "visible";
      serviceDivCrr[index].style.opacity = "1";
      serviceDivCrr[index].style.visibility = "visible";
    });
    //Met les elements caches
    element.addEventListener("mouseleave", () => {
      serviceTexte[index].style.opacity = "0";
      serviceTexte[index].style.visibility = "hidden";
      serviceBtn[index].style.opacity = "0";
      serviceBtn[index].style.visibility = "hidden";
      serviceDivCrr[index].style.opacity = "0";
      serviceDivCrr[index].style.visibility = "hidden";
    });
  });
}
/* -------------   Anim qui ouvre le menu burger   ------------- */
function toggleMenu() {
  const menu = document.querySelector(".navbar__menu");
  menu.classList.toggle("active"); //Lui donne la classe ("active")
}
/* -------------   Gsap qui rotate le menu burger  ------------- */
const burgerButton = document.querySelector(".navbar-toggler");
let isRotated = false;

// Au click du burger
burgerButton.addEventListener("click", () => {
  // Utilise GSAP pour animer la rotation du bouton burger
  gsap.to(burgerButton, {
    rotation: isRotated ? 0 : 90, // Si le bouton est déjà tourné, on le remet à 0° (sinon, on le fait tourner à 90°)
    duration: 0.5, // Durée de l'animation en secondes (0.5s)
    ease: "power1.inOut", // Type de transition de l'animation, ici "inOut" pour un mouvement fluide
  });

  // Inverse l'état de rotation (true/false)
  isRotated = !isRotated;
});

/* -------------  Fin Abdel    ------------- */

/* -------------   Vincent    ------------- */

// Affiche les nouvelles masqués lors du clique du bouton
const newsBtn = document.querySelector(".voirPlus");
if (newsBtn !== null) {
  newsBtn.addEventListener("click", function () {
    // Sélectionne les nouvelles masquées
    const hiddenNews = document.querySelectorAll(".news.hidden");

    // Affiche les nouvelles masquées
    hiddenNews.forEach((news) => {
      news.classList.remove("hidden");
    });

    // Cache le bouton "voir plus"
    this.style.display = "none";
  });
}

// Sélectionne le bouton X de la bannière
const banniereBtn = document.querySelector(".btn-fermer");
const banniere = document.querySelector(".banniere");

// Vérifie si la bannière a déjà été fermée
if (localStorage.getItem("banniereFermee") === "true") {
  banniere.classList.add("hidden");
}

// Ajoute un événement de clic au bouton pour fermer la bannière
if (banniereBtn !== null) {
  banniereBtn.addEventListener("click", function () {
    // Cache la bannière
    banniere.classList.add("hidden");
    // Enregistre dans le localStorage que la bannière a été fermée
    localStorage.setItem("banniereFermee", "true");
  });
}

// Sélectionne le menu déroulant pour le tri
const sortDateDropdown = document.getElementById("sort-date");
const newsContainer = document.querySelector(".newshub");

if (sortDateDropdown !== null && newsContainer !== null) {
  sortDateDropdown.addEventListener("change", function () {
    const order = sortDateDropdown.value;
    const newsItems = Array.from(document.querySelectorAll(".news"));

    // Trie les nouvelles en fonction de l'ordre sélectionné
    newsItems.sort((a, b) => {
      const dateA = new Date(a.querySelector(".news__date").textContent);
      const dateB = new Date(b.querySelector(".news__date").textContent);

      // Trie par date en fonction de l'ordre choisi
      return order === "new-to-old" ? dateB - dateA : dateA - dateB;
    });

    // Réordonne les éléments dans le DOM
    newsItems.forEach((item) => newsContainer.appendChild(item));
  });
}

/* ------------- Fin  Vincent    ------------- */

/* -------------   Yavuz    ------------- */

/* ------------ Modal pour la page equipe ------------ */
document.querySelectorAll(".equipe__membre").forEach((membre) => {
  membre.addEventListener("click", () => {
    const modalId = membre.getAttribute("data-modal");
    const modal = document.getElementById(modalId);
    if (modal) {
      modal.style.display = "block";
    }
  });
});

document.querySelectorAll(".modal .close").forEach((closeButton) => {
  closeButton.addEventListener("click", () => {
    closeButton.closest(".modal").style.display = "none";
  });
});

window.addEventListener("click", (event) => {
  if (event.target.classList.contains("modal")) {
    event.target.style.display = "none";
  }
});

/* --------------- Fin Modal  -----------------*/

/* --------------- Animation 404 ---------*/

gsap
  .timeline()
  .to(".erreur__404", {
    y: "100%", // Utilisation d'une valeur en pourcentage pour rester proportionnel.
    duration: 2,
    ease: "bounce.out",
  })
  .to(".erreur__404", {
    rotation: 20,
    duration: 0.5,
  });

/* -------------  Fin Yavuz    -------------*/
