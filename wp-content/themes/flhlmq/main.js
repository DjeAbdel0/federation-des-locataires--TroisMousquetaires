/* -------------   Abdel    ------------- */
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

/* -------------   Vincent    ------------- 
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

const premiereNewsContainer = document.querySelector(".newshub-premiere");
const container = document.querySelector(".newshub");
const apiUrl =
  "http://localhost/fede_locataires/wp-json/wp/v2/nouvelles?orderby=date&order=desc&per_page=12&_embed"; // URL de l'API

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
        date.textContent = new Date(news.date).toLocaleDateString("fr-FR");
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

      // Ajoute la classe 'hidden' à partir de la 5e news (index >= 4)
      if (index >= 4) {
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
            console.error("Erreur lors de la récupération de l'image :", error);
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
      date.textContent = new Date(news.date).toLocaleDateString("fr-FR"); // Formater la date en français
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
      container.appendChild(cardLink);
    });
  })
  .catch((error) => {
    console.error("Erreur lors de la récupération des données :", error);
  });

// Sélectionner le bouton "Voir plus"
const voirPlusButton = document.querySelector(".voirPlus");

// Vérifier si le bouton existe
if (voirPlusButton) {
  voirPlusButton.addEventListener("click", function () {
    // Sélectionner toutes les cartes d'actualités cachées
    const hiddenCards = document.querySelectorAll(".news.hidden");

    // Pour chaque carte cachée, retirer la classe 'hidden'
    hiddenCards.forEach((card) => {
      card.classList.remove("hidden");
    });

    // Optionnel : après avoir retiré la classe 'hidden', on peut aussi cacher le bouton 'Voir plus'
    voirPlusButton.style.display = "none";
  });
}
 ------------- Fin  Vincent    ------------- */
