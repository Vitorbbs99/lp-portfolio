/* =================== CONTADORES =================== */
(function () {
  "use strict";

  // Variáveis
  const $container = $(".contadores-lista");
  const $counters = $(".contador-num");
  const duration = 2000;

  // Verifica os contadores existem
  if ($container.length > 0) {
    // Inicia os contadores quando estiverem visíveis na tela
    onElementVisible($container, function () {
      $counters.each(function () {
        // Variáveis
        const $el = $(this);
        const countTo = $el.attr("data-count");

        // Contador
        $({
          countCur: $el.text(),
        }).animate(
          {
            countCur: countTo,
          },
          {
            duration: duration,
            easing: "swing",
            step: function () {
              $el.text(Math.floor(this.countCur));
            },
            complete: function () {
              $el.text(this.countCur);
            },
          }
        );
      });
    });
  }
})();
