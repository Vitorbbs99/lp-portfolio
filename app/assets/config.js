module.exports = function (project) {
  const config = {
    paths: {
      styles: {
        src: project + '/app/assets/build/sass/**/*.scss',
        dest: project + '/app/assets/dist/css/',
      },
      scripts: {
        src: [
          // Desconsidera a pasta de plugins
          '!' + project + '/app/assets/build/js/plugins/**/*.js',
          // Gerais
          project + '/app/assets/build/js/gerais/funcoes.js',
          project + '/app/assets/build/js/gerais/loading.js',
          project + '/app/assets/build/js/gerais/modal.js',
          project + '/app/assets/build/js/gerais/tabs.js',
          project + '/app/assets/build/js/gerais/smooth_scroll.js',
          project + '/app/assets/build/js/gerais/mascaras_input.js',
          project + '/app/assets/build/js/gerais/form_validation.js',
          project + '/app/assets/build/js/gerais/ajax_forms.js',
          project + '/app/assets/build/js/gerais/completaEndereco.js',
          project + '/app/assets/build/js/gerais/reposiciona_img.js',
          project + '/app/assets/build/js/gerais/numberPicker.js',
          project + '/app/assets/build/js/gerais/share_buttons.js',
          project + '/app/assets/build/js/gerais/users_online.js',
          project + '/app/assets/build/js/gerais/popup_cookies.js',
          project + '/app/assets/build/js/gerais/lightbox.js',
          project + '/app/assets/build/js/gerais/carousel.js',
          // Estrutura
          project + '/app/assets/build/js/estrutura/menu_mobile.js',
          project + '/app/assets/build/js/estrutura/gotop.js',
          // Home
          project + '/app/assets/build/js/home/blocos.js',
          project + '/app/assets/build/js/home/clientes.js',
          project + '/app/assets/build/js/home/depoimentos.js',
          project + '/app/assets/build/js/home/contadores.js',
          project + '/app/assets/build/js/home/fotos.js',
          project + '/app/assets/build/js/home/videos.js',

          // Animações (Obs: Sempre manter na última posição)
          project + '/app/assets/build/js/gerais/animateScroll.js',
        ],
        dest: project + '/app/assets/dist/js/',
      },
      plugins: {
        src: [
          project + '/app/assets/build/js/plugins/lazysizes.min.js',
          project + '/app/assets/build/js/plugins/ls.unveilhooks.min.js',
          project + '/app/assets/build/js/plugins/jquery-2.2.4.min.js',
          project + '/app/assets/build/js/plugins/jquery.mobile.custom.min.js',
          project + '/app/assets/build/js/plugins/splide.min.js',
          project + '/app/assets/build/js/plugins/splide-auto-scroll.min.js',
          project +
            '/app/assets/build/js/plugins/simple-lightbox.jquery.min.js',
          project + '/app/assets/build/js/plugins/jquery.maskedinput.js',
          project + '/app/assets/build/js/plugins/parsley.min.js',
          project + '/app/assets/build/js/plugins/pt-br.js',
          project + '/app/assets/build/js/plugins/flatpickr.js',
        ],
        dest: project + '/app/assets/dist/js/',
      },
      images: {
        src: project + '/app/assets/build/img/**/*',
        dest: project + '/app/assets/dist/img/',
      },
      pages: {
        src: project + '/app/**/*.php',
      },
    },
  };
  return config;
};
