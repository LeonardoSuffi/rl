<!-- CARROSEL QUE APARECE COMO IMAGEM E TROCA SEM MOVIMENTAÇÃO-->

<style>
    #carousel-container {
      width: 100%;
      overflow: hidden;
      border-radius: 12px;
    }

    #image-container {
      display: flex;
      transition: transform 0.5s ease-in-out;
    }

    .carousel-image {
      width: 100%;
      display: none; /* Oculta todas as imagens por padrão */
    }

    .show {
      display: block; /* Exibe a imagem com a classe 'show' */
    }
  </style>
<div id="carousel-container">
  <div id="image-container">
    <img class="carousel-image show" src="https://conteudo.ravvor.com.br/wp-content/uploads/2023/12/Captura-de-Tela-2023-12-06-as-19.33.19-768x360.png" alt="Financeiro para empresas" width="768px" height="360">
    <img class="carousel-image" src="https://conteudo.ravvor.com.br/wp-content/uploads/2023/12/Captura-de-Tela-2023-12-06-as-19.33.43-768x394.png" alt="Financeiro para empresas" width="768px" height="394">
    <img class="carousel-image" src="https://conteudo.ravvor.com.br/wp-content/uploads/2023/12/Captura-de-Tela-2023-12-06-as-19.33.31-768x382.png" alt="Financeiro para empresas" width="768px" height="382">
  </div>
</div>

<script>
  let currentIndex = 0;

  function showSlide(index) {
    const images = document.querySelectorAll('.carousel-image');
    
    images.forEach((image, i) => {
      if (i === index) {
        image.classList.add('show');
      } else {
        image.classList.remove('show');
      }
    });
  }

  function nextSlide() {
    const totalSlides = document.querySelectorAll('.carousel-image').length;
    currentIndex = (currentIndex + 1) % totalSlides;
    showSlide(currentIndex);
  }

  function startAutoSlide() {
    setInterval(() => {
      nextSlide();
    }, 3000); // Troca de slide a cada 3 segundos (ajuste conforme necessário)
  }

  startAutoSlide();  // Inicia o carrossel automático
</script>