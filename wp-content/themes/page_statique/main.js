

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


  const headers = document.querySelectorAll('.accordion-header');

  headers.forEach(header => {
      header.addEventListener('click', () => {
          const content = header.nextElementSibling;

          // Toggle active class
          header.classList.toggle('active');

          // Toggle content visibility
          if (content.style.display === 'block') {
              content.style.display = 'none';
          } else {
              // Hide other contents
              document.querySelectorAll('.accordion-content').forEach(item => {
                  item.style.display = 'none';
              });
              content.style.display = 'block';
          }
      });
  });