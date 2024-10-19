

  /*   Abdel
  ---------------------- Code qui lorsqu'on Hover une nouvelle, rend le texte visible et lorqu'on quitte, le cache ------------------------------ */
  // Select all elements that have class 'list-service__assos', 'list-service__truc', 'list-service__cool', etc.
const serviceDiv = document.querySelectorAll('.list-service > div'); // Choisis la div enfant directe de .list-service
const serviceTexte = document.querySelectorAll('.page-service__texte'); // Choisis le texte dans .list-service
const serviceBtn = document.querySelectorAll('.page-service__btn'); //  Choisis le btn dans .list-service


// Toogle la visibilité selon si la souris Hover ou pas
serviceDiv.forEach((element, index) => {
    element.addEventListener('mouseenter', () => {
        serviceTexte[index].style.opacity = '1';
        serviceTexte[index].style.visibility = 'visible';
        serviceBtn[index].style.opacity = '1';
        serviceBtn[index].style.visibility = 'visible';
    });

    element.addEventListener('mouseleave', () => {
        serviceTexte[index].style.opacity = '0';
        serviceTexte[index].style.visibility = 'hidden';
        serviceBtn[index].style.opacity = '0';
        serviceBtn[index].style.visibility = 'hidden';
    });
});
