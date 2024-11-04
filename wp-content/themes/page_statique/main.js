/* -------------   Abdel    ------------- */

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
}
/* ----------------------  Fin Hover ------------------------------ */

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
restartGsap();
/* ---------------------- Fin Animation Gsap ------------------------------ */
/* -------------  Fin Abdel    ------------- */


/* -------------   Vincent    ------------- */
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

/* ------------- Fin  Vincent    ------------- */

/* -------------   Yavuz    ------------- */
/* -------------  Fin Yavuz    ------------- */