

/* Changer l'url de l'image dons lorsque la page dépasse les 1400px
function changeDonsImage() {
    const img = document.getElementById('dons__image');
    if (window.innerWidth >= 1400) {
      img.src = './assets/medias/dons/dons_maison.png'; 
    } else {
      img.src = './assets/medias/dons/donnations_maison.jpg';
    }
  }

  window.onload = changeDonsImage;
  window.onresize = changeDonsImage;
  */ 