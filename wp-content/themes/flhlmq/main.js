/* -------------   Abdel    ------------- */
/* -------------  Fin Abdel    ------------- */

/* -------------   Vincent    ------------- */
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

const container = document.querySelector(".newshub"); // Assure-toi que l'élément existe dans le HTML
const apiUrl = "http://localhost:81/fede_locataires/wp-json/wp/v2/nouvelles"; // URL de l'API
const maxNewsToDisplay = 4; // Nombre de nouvelles à afficher

fetch(apiUrl)
  .then((response) => response.json())
  .then((data) => {
    // Limiter l'affichage aux 4 premières nouvelles
    const firstFourNews = data.slice(0, maxNewsToDisplay);

    firstFourNews.forEach((news) => {
      const newsCard = document.createElement("div");
      newsCard.classList.add("news");

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

      // Ajouter la carte d'actualité au conteneur
      container.appendChild(newsCard);
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
/* ------------- Fin  Vincent    ------------- */

/* -------------   Yavuz    ------------- */

/* -------------  Fin Yavuz    -------------*/
