/* =================== CONTADORES =================== */
(function () {
  "use strict";

  const $counters = $(".stat-number");
  const duration = 2000;

  if ($counters.length > 0) {
    $counters.each(function () {
      const $el = $(this);
      const countTo = parseInt($el.attr("data-count"), 10) || 0;

      $({ countCur: 0 }).animate(
        { countCur: countTo },
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
  }
})();
