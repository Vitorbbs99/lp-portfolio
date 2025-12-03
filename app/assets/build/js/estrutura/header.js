/* =================== HEADER =================== */
$(function () {
  // Ajusta padding-top da body com base na altura do header
  /* function fixBodyTop() {
    if ($(".header").length && $(".header").css("position") === "fixed") {
      const headerHeight = $(".header").outerHeight();
      $("body").css("padding-top", headerHeight);
    }
  }
  $(window).on("resize", debounce(fixBodyTop, 50));
  $(window).on("load", fixBodyTop); */

  // Menu fixo ao rolar a tela
  const $header = $(".header-full");
  if ($header.length > 0) {
    function toggleHeaderFull() {
      const scrollTop = $(window).scrollTop();
      if (scrollTop > 100) {
        $header.addClass("active");
      } else {
        $header.removeClass("active");
      }
    }
    toggleHeaderFull();
    $(window).on(
      "scroll",
      debounce(function () {
        toggleHeaderFull();
      }, 50)
    );
  }
});

// Busca
(function () {
  "use strict";

  const $searchBtn = $(".header-search-btn");
  const $searchDropdown = $(".header-search-dropdown");
  const $searchInput = $("#header-search-input");

  // Evento de clique no botão
  $searchBtn.on("click", function (ev) {
    ev.preventDefault();
    if (!$searchDropdown.hasClass("active")) {
      $searchDropdown.addClass("active");
      setTimeout(() => {
        $searchInput.focus();
        $searchInput.select();
      }, 100);
    } else {
      $searchDropdown.removeClass("active");
    }
  });

  // Fecha o dropdown se clicar fora dele
  $("body").on("click", (event) => {
    if (
      !event.target.closest(".header-search-form") &&
      !event.target.closest(".header-search-btn")
    ) {
      $searchDropdown.removeClass("active");
    }
  });

  // Fecha o modal ao pressionar a tecla ESC
  $(document).on("keyup", function (e) {
    if (e.keyCode == 27 && $searchDropdown.hasClass("active")) {
      $searchDropdown.removeClass("active");
    }
  });
})();
