// Altera a posição da imagem no mobile
$(function () {
  if (isMobileX(760)) {
    $(".load-img-mobile").each(function () {
      var container = $(this);
      var img = $('[data-id-img="' + container.data("img") + '"]');
      img.appendTo(container);
    });
  }
});
