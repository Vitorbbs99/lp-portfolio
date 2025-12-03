/* =================== CLIENTES =================== */
$(function () {
  // Carrossel
  $(".carrossel-clientes").each(function () {
    // Elemento
    const $carousel = $(this);

    // Total de itens no carrossel
    const totalItens = $carousel.find(".splide__slide").length;

    // Configuração de colunas do carrossel
    const cols = {
      desktop: 6,
      tablet: 5,
      mobile: 3,
    };

    // Opções gerais do slide
    let carouselOpts = {
      type: "loop",
      perPage: cols.desktop,
      gap: "20px",
      arrows: false,
      pagination: false,
      autoScroll: {
        speed: 1,
      },
      breakpoints: {
        // Tablet
        1200: {
          perPage: cols.tablet,
        },
        // Mobile
        760: {
          //destroy: true, // <-- Descomente para desativar o carrossel
          perPage: cols.mobile,
        },
      },
    };

    // Ajuste para quando houver menos itens do que a quantidade por página do carrossel (Centraliza)
    if (
      (isMedia("desktop") && totalItens < cols.desktop) ||
      (isMedia("tablet") && totalItens < cols.tablet) ||
      (isMedia("mobile") && totalItens < cols.mobile)
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
    carousel.mount(window.splide.Extensions);
  });
});
