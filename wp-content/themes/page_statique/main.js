/* 
-------------   Abdel    ------------- */
/* ----------------------  Hover une nouvelle, texte visible/Non-visible ------------------------------ */

const serviceDiv = document.querySelectorAll(".page-service > div"); // Choisis la div enfant directe de .list-service
const serviceTexte = document.querySelectorAll(".page-service__texte"); // Choisis le texte dans .list-service
const serviceBtn = document.querySelectorAll(".page-service__btn"); //  Choisis le btn dans .list-service

// Toogle la visibilité selon si la souris Hover ou pas
if (serviceDiv !== null) {
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
};
/* ----------------------  Animation Gsap ------------------------------ */

//Detecte si la width du viewport est a 1400px et + pour activer le code Gsap
let   miniteur;
if (miniteur !== null) {
window.addEventListener("resize", (event) => {
  clearTimeout(miniteur);

  miniteur = setTimeout(restartGsap, 500);
});

function restartGsap() {
  if (window.innerWidth > 1399) {
    scroll_tl = gsap.timeline({
        scrollTrigger: {
          trigger: ".crr__titre",
          start: "top top",
          scrub: true,
          end: "bottom bottom",
          markers: false,
        },
      }),
      roles = document.querySelectorAll(".role");

    scroll_tl.to(roles, {
      xPercent: -100 * (roles.length - 1),
      scrollTrigger: {
        trigger: ".crr__contenue",
        start: "top top",
        pin: true,
        scrub: 1,
        snap: 2 / (roles.length - 1),
        end: () => `+=4320`,
      },
    });
  }
}
}


/* ---------------------- Fin Animation Gsap ------------------------------ */

function toggleMenu() {
  const menu = document.querySelector(".navbar__menu");
  menu.classList.toggle("active");
  console.log("ca marche");
}

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
document.addEventListener("DOMContentLoaded", () => {
  let mm = gsap.matchMedia();

  // Animation pour les petits écrans (375px et moins)
  mm.add("(min-width: 375px)", () => {
    gsap.timeline()
      .to(".erreur__404", {
        y: 265,  // Utilisation d'une valeur en pourcentage pour rester proportionnel.
        duration: 2,
        ease: "bounce.out"
      })
      .to(".erreur__404", {
        rotation: 20,
        duration: 0.5
      });
  });

  mm.add("(min-width: 480px)", () => {
    gsap.timeline()
      .to(".erreur__404", {
        y: 280,  // Utilisation d'une valeur en pourcentage pour rester proportionnel.
        duration: 2,
        ease: "bounce.out"
      })
      .to(".erreur__404", {
        rotation: 20,
        duration: 0.5
      });
  });

  mm.add("(min-width: 645px)", () => {
    gsap.timeline()
      .to(".erreur__404", {
        y: 310,  // Utilisation d'une valeur en pourcentage pour rester proportionnel.
        duration: 2,
        ease: "bounce.out"
      })
      .to(".erreur__404", {
        rotation: 20,
        duration: 0.5
      });
  });

  // Animation pour les écrans moyens (jusqu'à 675px)
  mm.add("(min-width: 768px)", () => {
    gsap.timeline()
      .to(".erreur__404", {
        y: 350,  // Ajustement pour les écrans plus larges.
        duration: 2,
        ease: "bounce.out"
      })
      .to(".erreur__404", {
        rotation: 20,
        duration: 0.5
      });
  });

  mm.add("(min-width: 985px)", () => {
    gsap.timeline()
      .to(".erreur__404", {
        y: 390,  // Utilisation d'une valeur en pourcentage pour rester proportionnel.
        duration: 2,
        ease: "bounce.out"
      })
      .to(".erreur__404", {
        rotation: 20,
        duration: 0.5
      });
  });

  // Animation pour les écrans jusqu'à 1400px
  mm.add("(min-width: 1400px)", () => {
    gsap.timeline()
      .to(".erreur__404", {
        y: 450,  // Plus grand déplacement pour les écrans plus larges.
        duration: 2,
        ease: "bounce.out"
      })
      .to(".erreur__404", {
        rotation: 20,
        duration: 0.5
      });
  });
});


/* -------------  Fin Yavuz    -------------*/
