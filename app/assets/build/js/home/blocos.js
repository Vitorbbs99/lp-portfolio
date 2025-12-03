/* =================== BLOCOS HOME =================== */
$(function () {
  // Carrossel
  $(".carrossel-blocos").each(function () {
    // Elemento
    const $carousel = $(this);

    // Total de itens no carrossel
    const totalItens = $carousel.find(".splide__slide").length;

    // Configuração de colunas do carrossel
    const cols = {
      desktop: 4,
      tablet: 3,
      mobile: 1,
    };

    // Opções gerais do slide
    let carouselOpts = {
      type: "loop",
      perPage: cols.desktop,
      perMove: 1,
      gap: "20px",
      speed: 600,
      autoplay: true,
      interval: 3000, // 3 segundos
      arrows: true,
      pagination: false,
      waitForTransition: false, // Permite interações durante a transição
      dragMinThreshold: { touch: 30 },
      breakpoints: {
        // Tablet
        1200: {
          perPage: cols.tablet,
        },
        // Mobile
        760: {
          //destroy: true, // <-- Descomente para desativar o carrossel
          perPage: cols.mobile,
          type: "slide",
          autoplay: false,
          arrows: false,
          pagination: false,
          drag: "free",
          fixedWidth: "70%", // <- Ignora o 'perPage'
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

  // Cancela o evento de click nos blocos sem link
  $('.bloco-item[href="#"]').on("click", function (ev) {
    ev.preventDefault();
  });
});
