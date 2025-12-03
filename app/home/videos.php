<? include(ACOES_APP_PATH."/home/videos.php"); ?>
<? if ($numVideos > 0) { ?>
<section class="secao home-videos">
  <div class="container">

    <h2 class="titulo videos-titulo" data-aos="fade-up"><?=$videosText['titulo']?></h2>
    <h2 class="subtitulo videos-subtitulo" data-aos="fade-up"><?=$videosText['subtitulo']?></h2>

    <!-- CARROSSEL -->
    <div class="grid-12" data-aos="fade-up">
      <div class="splide carousel carousel-arrows-zoom carrossel-videos">
        <div class="splide__track">
          <div class="splide__list">

            <? foreach ($videosLista as $video) { ?>

              <!-- Repete -->
              <div class="splide__slide">
                <div class="bloco-video modal-video-open" data-video-cod="<?=$video['video']?>" data-video-tit="<?=$video['titulo']?>">
                  <div class="bloco-video-wrapper bloco-video-thumb lazyload" style="background-image: url('<?=$lazyImg?>');" data-bg="<?=Tools::getVideoThumb($video['video'])?>">
                    <span class="bloco-video-thumb-play"><i class="fas fa-play"></i></span>
                  </div>
                  <div class="bloco-video-infos">
                    <div class="bloco-video-titulo"><?=$video['titulo']?></div>
                  </div>
                </div>
              </div>
              <!-- //Repete -->
          
            <? } ?>

          </div>
        </div>
      </div>
    </div>
    <!-- //CARROSSEL -->

    <div class="btn-container btn-cta-home" data-aos="zoom-in">
      <a href="#lp-form" class="btn btn-primario pulse"><?=$videosText['botao']?></a>
    </div>
    
  </div>
</section>
<? } ?>
