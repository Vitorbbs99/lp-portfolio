// ------------------------------------
// Galeria (Lightbox)
// ------------------------------------
(function () {
  "use strict";
  const $images = $("[data-lightbox]");
  if ($images.length > 0) {
    const lightboxCfg = {
      navText: ["", ""],
      closeText: "",
      captionPosition: "outside",
      fileExt: false,
      heightRatio: 0.8,
      captionSelector: "self",
      captionType: "data",
      history: false,
    };
    $images.simpleLightbox(lightboxCfg);
  }
})();
