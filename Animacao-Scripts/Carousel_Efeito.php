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
    flex-shrink: 0; /* Impede que as imagens sejam redimensionadas */
    transition: transform 0.5s ease-in-out;
  }

  .show {
    display: block;
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
  const imagesContainer = document.getElementById('image-container');
  const images = document.querySelectorAll('.carousel-image');

  function showSlide(index) {
    const transformValue = -index * 100 + '%';
    imagesContainer.style.transform = 'translateX(' + transformValue + ')';
  }

  function nextSlide() {
    const totalSlides = images.length;
    currentIndex = (currentIndex + 1) % totalSlides;
    showSlide(currentIndex);
  }

  function startAutoSlide() {
    setInterval(() => {
      nextSlide();
    }, 5000); // Troca de slide a cada 6 segundos (ajuste conforme necessário)
  }

  startAutoSlide();  // Inicia o carrossel automático
</script>