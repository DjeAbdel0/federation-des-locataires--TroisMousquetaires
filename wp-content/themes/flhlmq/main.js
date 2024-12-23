/* -------------   Abdel    ------------- */
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

/* ------------- Vincent ------------- */
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

// Sélectionner le bouton "Voir plus"
const voirPlusButton = document.querySelector(".voirPlus");

// Vérifier si le bouton existe
if (voirPlusButton !== null) {
  voirPlusButton.addEventListener("click", function () {
    // Sélectionner toutes les cartes d'actualités cachées
    const hiddenCards = document.querySelectorAll(".news.hidden");

    // Pour chaque carte cachée, retirer la classe 'hidden'
    hiddenCards.forEach((card) => {
      card.classList.remove("hidden");
    });

    // Après avoir retiré la classe 'hidden', on cache le bouton 'Voir plus'
    voirPlusButton.style.display = "none";
  });
}

// Importation et affichage du contenu des nouvelles par fetch Api
const premiereNewsContainer = document.querySelector(".newshub-premiere");
const newsContainer = document.querySelector(".newshub");
const newsLinks = [];
const apiUrl =
  "https://trois-mousquetaires.tim-momo.com/wp-json/wp/v2/nouvelles?orderby=date&order=desc&per_page=12&_embed"; // URL de l'API

if (premiereNewsContainer !== null && newsContainer !== null) {
  // Fetch Api de toutes les nouvelles
  fetch(apiUrl)
    .then((response) => response.json())
    .then((data) => {
      data.forEach((news, index) => {
        // Nouvelle en héro (première nouvelle)
        if (index === 0) {
          const premiere = document.createElement("div");
          premiere.classList.add("premiere");

          // Ajouter le titre
          const title = document.createElement("h2");
          title.classList.add("premiere__titre");
          title.textContent = news.title.rendered;
          premiere.appendChild(title);

          // Ajouter la date
          const date = document.createElement("p");
          date.classList.add("premiere__date");
          date.textContent = new Date(news.date).toISOString().split("T")[0];
          premiere.appendChild(date);

          // Ajouter le bouton
          const bouton = document.createElement("a");
          bouton.classList.add("premiere__bouton");
          bouton.href = news.link;
          bouton.textContent = "Accéder";
          premiere.appendChild(bouton);

          // Ajouter l'image si disponible
          if (news._links["wp:featuredmedia"]) {
            const mediaUrl = news._links["wp:featuredmedia"][0].href;

            fetch(mediaUrl)
              .then((response) => response.json())
              .then((mediaData) => {
                const imageUrl = mediaData.source_url;
                const img = document.createElement("img");
                img.classList.add("premiere__image");
                img.src = imageUrl;
                img.alt = news.title.rendered;
                premiere.appendChild(img);
              })
              .catch((error) => {
                console.error(
                  "Erreur lors de la récupération de l'image :",
                  error
                );
              });
          }

          // Ajouter un overlay
          const overlay = document.createElement("div");
          overlay.classList.add("premiere__overlay");
          premiere.appendChild(overlay);

          // Ajouter la première nouvelle au conteneur dédié
          premiereNewsContainer.appendChild(premiere);
          return; // Évite de continuer pour cette nouvelle
        }

        // Nouvelles Cartes (autres nouvelles)
        const newsCard = document.createElement("div");
        newsCard.classList.add("news");

        // Créer un lien qui enveloppe toute la carte
        const cardLink = document.createElement("a");
        cardLink.href = news.link; // Lien vers la page de contenu de l'article
        cardLink.style.textDecoration = "none"; // Supprime le soulignement
        cardLink.style.color = "inherit"; // Inhère la couleur du parent
        cardLink.classList.add("cliquable"); // Classe pour styliser le lien si besoin

        // Ajouter la classe 'hidden' à partir de la 5e news (index >= 4)
        if (index >= 5) {
          newsCard.classList.add("hidden");
        }

        // Créer le titre
        const title = document.createElement("h2");
        title.classList.add("news__titre");
        title.textContent = news.title.rendered;
        newsCard.appendChild(title);

        // Vérifier si l'image vedette existe
        if (news._links["wp:featuredmedia"]) {
          const mediaUrl = news._links["wp:featuredmedia"][0].href;

          // Faire une autre requête pour récupérer les détails de l'image
          fetch(mediaUrl)
            .then((response) => response.json())
            .then((mediaData) => {
              const imageUrl = mediaData.source_url;

              // Créer l'élément image
              const img = document.createElement("img");
              const divImg = document.createElement("div");
              divImg.classList.add("news__image");
              img.src = imageUrl; // URL de l'image
              img.alt = news.title.rendered; // Texte alternatif avec le titre
              divImg.appendChild(img);
              newsCard.appendChild(divImg);
            })
            .catch((error) => {
              console.error(
                "Erreur lors de la récupération de l'image :",
                error
              );
            });
        } else {
          console.warn(
            "Aucune image trouvée pour cette nouvelle :",
            news.title.rendered
          );
        }

        // Ajouter la date de publication
        const date = document.createElement("p");
        date.classList.add("news__date");
        date.textContent = new Date(news.date).toISOString().split("T")[0]; // Formater la date en français
        newsCard.appendChild(date);

        // Ajouter le bouton de catégorie avec la sélection
        const newsCardTag = news.acf.news_card_tag; // Récupère la valeur du champ 'news_card_tag'

        const tagButton = document.createElement("button");
        tagButton.classList.add("news__categorie");

        // Ajouter une classe dynamique basée sur la valeur de news_card_tag
        if (newsCardTag) {
          const classSuffix = newsCardTag.toLowerCase().replace(/\s+/g, "-"); // Transformer la valeur en format compatible avec les classes CSS
          tagButton.classList.add(`news__categorie--${classSuffix}`);
        }

        tagButton.textContent = newsCardTag; // Ajoute la valeur de la sélection comme texte du bouton
        newsCard.appendChild(tagButton);

        // Ajouter la carte d'actualité dans le lien
        cardLink.appendChild(newsCard);

        // Ajouter le lien complet au conteneur
        newsContainer.appendChild(cardLink);

        // Sauvegarde des liens pour réattribution après le tri
        newsLinks.push({ link: news.link, element: cardLink });
      });
    })
    .catch((error) => {
      console.error("Erreur lors de la récupération des données :", error);
    });
}

// Section derniere actualité à l'index et single-nouvelles
// Fetch Api pour les cartes d'actualité (nouvelles 1 à 3)
const actualiteCartes = document.querySelector(".actualite__cartes");
const apercuNewsLinks = [];
const apiUrlActualiteCartes =
  "https://trois-mousquetaires.tim-momo.com/wp-json/wp/v2/nouvelles?orderby=date&order=desc&per_page=3&_embed";
if (actualiteCartes !== null) {
  fetch(apiUrlActualiteCartes)
    .then((response) => response.json())
    .then((actualites) => {
      console.log(actualites);
      actualites.forEach((news) => {
        const actualiteCarte = document.createElement("div");
        actualiteCarte.classList.add("actualite__carte");

        // Conteneur d'image
        const conteneurImg = document.createElement("div");
        conteneurImg.classList.add("actualite__conteneurImg");

        const img = document.createElement("img");
        img.classList.add("actualite__image");
        img.src = news._embedded["wp:featuredmedia"][0].source_url;
        img.alt = `Image ${news.title.rendered}`;
        conteneurImg.appendChild(img);
        actualiteCarte.appendChild(conteneurImg);

        // Zone de texte
        const zoneTexte = document.createElement("div");
        zoneTexte.classList.add("actualite__zoneTexte");

        const titre = document.createElement("h2");
        titre.classList.add("actualite__titre--petit");
        titre.textContent = news.title.rendered;
        zoneTexte.appendChild(titre);

        const text = document.createElement("div");
        text.classList.add("actualite__text");
        text.innerHTML = news.content.rendered;
        zoneTexte.appendChild(text);

        const footer = document.createElement("div");
        footer.classList.add("actualite__footer");
        footer.textContent = `Publié le : ${
          new Date(news.date).toISOString().split("T")[0]
        }`;
        
        // Créer un lien qui enveloppe toute la carte
        const apercuLink = document.createElement("a");
        apercuLink.href = news.link; // Lien vers la page de contenu de l'article
        apercuLink.style.textDecoration = "none"; // Supprime le soulignement
        apercuLink.style.color = "inherit"; // Inhère la couleur du parent
        
        zoneTexte.appendChild(footer);

        actualiteCarte.appendChild(zoneTexte);
        
        apercuLink.appendChild(actualiteCarte);

        actualiteCartes.appendChild(apercuLink);
        
        // Sauvegarde des liens pour réattribution après le tri
        apercuNewsLinks.push({ link: news.link, element: apercuLink });
      });
    })
    .catch((error) => {
      console.error(
        "Erreur lors de la récupération des données pour actualiteCartes :",
        error
      );
    });
}

// Sélectionne le menu déroulant pour le tri
const sortDateDropdown = document.getElementById("sort-date");

// Fonction pour trier les nouvelles
function sortNews(order) {
  // Assurez que newsLinks est défini
  if (!newsLinks.length) {
    console.error("newsLinks is not defined or empty.");
    return;
  }

  const newsItems = Array.from(document.querySelectorAll(".news"));

  if (sortDateDropdown !== null && newsItems !== null) {
    // Trie les éléments par ordre selon la date
    newsItems.sort((a, b) => {
      const dateA = new Date(a.querySelector(".news__date").textContent);
      const dateB = new Date(b.querySelector(".news__date").textContent);

      return order === "new-to-old" ? dateB - dateA : dateA - dateB;
    });

    // Réinsère les éléments triés dans leur conteneur
    newsItems.forEach((item, index) => {
      const linkedElement = newsLinks.find((link) =>
        link.element.contains(item)
      );
      if (linkedElement) {
        newsContainer.appendChild(linkedElement.element);
      }
    });

    // Applique le filtre sur les cartes d'actualités triées
    applyFilters();
  }
}

// Fonction pour appliquer les filtres
function applyFilters() {
  const newsItems = Array.from(document.querySelectorAll(".news"));

  // Obtenir la valeur de l'option de filtre sélectionnée
  const selectedCategory = document.querySelector(".filtre-categorie").value;

  // Si aucune catégorie n'est sélectionnée, afficher toutes les cartes
  if (selectedCategory === "all") {
    newsItems.forEach((item) => {
      item.classList.remove("hidden");
    });
  } else {
    newsItems.forEach((item) => {
      const tag = item
        .querySelector(".news__categorie")
        .textContent.trim()
        .toLowerCase();
      item.classList.toggle("hidden", tag !== selectedCategory);
    });
  }
}

// Écouteur d'événement pour le menu déroulant de filtrage
const filtreCategorieDropdown = document.querySelector(".filtre-categorie");

if (filtreCategorieDropdown !== null) {
  filtreCategorieDropdown.addEventListener("change", applyFilters);
}

// Écouteur d'événement pour le menu déroulant de tri
if (sortDateDropdown !== null) {
  sortDateDropdown.addEventListener("change", () => {
    // Applique le tri en fonction de l'option sélectionnée
    sortNews(sortDateDropdown.value);
  });
}

/*------------- Fin Vincent ------------- */
