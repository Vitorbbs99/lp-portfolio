/* =================== VOLTAR AO TOPO =================== */
$(function () {
  function toggleGoTop() {
    var scrollTop = $(window).scrollTop();
    if (scrollTop > 100) {
      $('.gotop').addClass('active');
    } else {
      $('.gotop').removeClass('active');
    }
  }
  toggleGoTop();
  $(window).on(
    'scroll',
    debounce(function () {
      toggleGoTop();
    }, 100),
  );
  $('.gotop').on('click', function () {
    scrollToX('html');
  });
});

$(function () {
  var cursor = document.querySelector('#cursor'),
    cursorBorder = document.querySelector('#cursor-border'),
    currentPos = { x: 0, y: 0 },
    targetPos = { x: 0, y: 0 };

  document.addEventListener('mousemove', function (e) {
    currentPos.x = e.clientX;
    currentPos.y = e.clientY;
    cursor.style.transform =
      'translate(' + e.clientX + 'px, ' + e.clientY + 'px)';
  });

  requestAnimationFrame(function updateCursor() {
    targetPos.x += (currentPos.x - targetPos.x) / 8;
    targetPos.y += (currentPos.y - targetPos.y) / 8;
    cursorBorder.style.transform =
      'translate(' + targetPos.x + 'px, ' + targetPos.y + 'px)';
    requestAnimationFrame(updateCursor);
  });

  // Adiciona event listeners para os links
  var links = document.querySelectorAll('a');
  links.forEach(function (link) {
    link.addEventListener('mouseenter', function () {
      cursorBorder.classList.add('hovered');
    });

    link.addEventListener('mouseleave', function () {
      cursorBorder.classList.remove('hovered');
    });
  });
});
(function ($) {
  'use strict';

  $(document).ready(function () {
    'use strict';

    //Scroll back to top

    var progressPath = document.querySelector('.progress-wrap path');
    var pathLength = progressPath.getTotalLength();
    progressPath.style.transition = progressPath.style.WebkitTransition =
      'none';
    progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
    progressPath.style.strokeDashoffset = pathLength;
    progressPath.getBoundingClientRect();
    progressPath.style.transition = progressPath.style.WebkitTransition =
      'stroke-dashoffset 10ms linear';
    var updateProgress = function () {
      var scroll = $(window).scrollTop();
      var height = $(document).height() - $(window).height();
      var progress = pathLength - (scroll * pathLength) / height;
      progressPath.style.strokeDashoffset = progress;
    };
    updateProgress();
    $(window).scroll(updateProgress);
    var offset = 50;
    var duration = 550;
    jQuery(window).on('scroll', function () {
      if (jQuery(this).scrollTop() > offset) {
        jQuery('.progress-wrap').addClass('active-progress');
      } else {
        jQuery('.progress-wrap').removeClass('active-progress');
      }
    });
    jQuery('.progress-wrap').on('click', function (event) {
      event.preventDefault();
      jQuery('html, body').animate({ scrollTop: 0 }, duration);
      return false;
    });
  });
})(jQuery);

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