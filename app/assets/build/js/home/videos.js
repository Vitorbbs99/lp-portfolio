/* =================== FOTOS HOME =================== */
$(function () {
  // Carrossel
  $(".carrossel-videos").each(function () {
    // Elemento
    const $carousel = $(this);

    // Total de itens no carrossel
    const totalItens = $carousel.find(".splide__slide").length;

    // Configuração de colunas do carrossel
    const cols = {
      desktop: 3,
      tablet: 2,
      mobile: 1,
    };

    // Opções gerais do slide
    let carouselOpts = {
      type: "loop",
      perPage: cols.desktop,
      perMove: 1,
      speed: 600,
      gap: "20px",
      autoplay: true,
      speed: 800,
      interval: 3000, // 3 segundos
      arrows: true,
      pagination: false,
      breakpoints: {
        // Tablet
        1200: {
          perPage: cols.tablet,
        },
        // Mobile
        760: {
          //destroy: true, // <-- Descomente para desativar o carrossel
          perPage: cols.mobile,
          //focus: "center",
          type: "slide",
          autoplay: false,
          arrows: false,
          pagination: false,
          drag: "free",
          fixedWidth: "90%", // <- Ignora o 'perPage'
          padding: { left: "20px", right: "20px" },
        },
      },
    };

    // Ajuste para quando houver menos itens do que a quantidade por página do carrossel (Centraliza)
    if (
      (isMedia("desktop") && totalItens < cols.desktop) ||
      (isMedia("tablet") && totalItens < cols.tablet)
    ) {
      $carousel.addClass("carousel-force-center");
      carouselOpts.type = "slide";
      carouselOpts.arrows = false;
      carouselOpts.pagination = false;
      carouselOpts.drag = false;
      carouselOpts.autoplay = false;
      carouselOpts.keyboard = false;
    }

    // Inicia o carrossel
    let carousel = new Splide($carousel[0], carouselOpts);

    // Monta o carrossel
    carousel.mount();
  });
});
