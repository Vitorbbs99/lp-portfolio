(function () {
  "use strict";
  const $popup = $("#popup-cookie");
  const $button = $("#popup-cookie-btn");
  $button.on("click", function (ev) {
    ev.preventDefault();
    localStorage.setItem("cookie_popup", "true");
    $popup.removeClass("active");
  });
  if (!localStorage.getItem("cookie_popup")) {
    setTimeout(function () {
      $popup.addClass("active");
    }, 2000);
  }
})();
