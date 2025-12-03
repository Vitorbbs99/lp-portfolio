/* =================== SMOOTH SCROLL (SCROLL SUAVE) =================== */

// Scroll para um determinado elemento
function scrollToX(element) {
  let offset = 20;
  let $headerEl;
  if ($(".header").length > 0) {
    $headerEl = $(".header");
  } else if ($(".header-full").length > 0) {
    $headerEl = $(".header-full");
  }
  if ($headerEl && $headerEl.css("position") === "fixed") {
    offset = $headerEl.outerHeight() + 20;
  }
  console.log(offset);
  var top = $(element) ? $(element).offset().top - offset : 0;
  $("html, body").animate(
    {
      scrollTop: top,
    },
    500
  );
}

$(function () {
  // Scroll suave para âncoras
  $('a[href^="#"]:not([href="#"]):not([href="#0"])').click(function (ev) {
    ev.preventDefault();
    if (
      location.pathname.replace(/^\//, "") ==
        this.pathname.replace(/^\//, "") ||
      location.hostname == this.hostname
    ) {
      var target = $(this.hash);
      target = target.length ? target : $("[name=" + this.hash.slice(1) + "]");
      if (target.length) {
        scrollToX(target);
        return false;
      }
    }
  });

  // Scroll suave para links externos
  $(document).on("ready", function () {
    var urlHash = window.location.href.split("#")[1];
    if (urlHash && urlHash != 0) {
      scrollToX("#" + urlHash);
    }
  });
});
