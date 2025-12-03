<? include(ACOES_APP_PATH."/home/depoimentos.php"); ?>
<? if ($numDepoimentos > 0) { ?>
<section class="secao home-depoimentos grey">
  <div class="container">

    <h2 class="titulo depoimentos-titulo" data-aos="fade-up"><?=$depoText['titulo']?></h2>
    <h2 class="subtitulo depoimentos-subtitulo" data-aos="fade-up"><?=$depoText['subtitulo']?></h2>

    <!-- CARROSSEL -->
    <div class="row depoimentos-wrp" data-aos="fade-up">
      <div class="grid-8 grid-m-10 grid-s-12 depoimentos-content">
        <div class="splide carousel carousel-arrows-zoom carrossel-depoimentos">
          <div class="splide__track">
            <div class="splide__list">

              <? foreach ($depoimentos as $depoimento) { ?>

                <!-- Repete -->
                <div class="splide__slide">
                  <div class="depoimento">
                    <figure class="depoimento-img">
                      <img class="shimmer lazyload" data-src="<?=URL?>uploads/depoimentos/<?=$depoimento['id']?>/thumb-174-174/<?=$depoimento['foto']?>" src="<?=Tools::genPchSrc(127, 127)?>" width="127px" height="127px" alt="<?=$depoimento['nome']?>">
                    </figure>
                    <div class="depoimento-infos">
                      <div class="depoimento-texto">
                        <i class="fas fa-quote-left"></i>
                        <?=$depoimento['texto']?>
                        <i class="fas fa-quote-right"></i>
                      </div>
                      <div class="depoimento-titulo"><?=$depoimento['titulo']?></div>
                    </div>
                  </div>
                </div>
                <!-- //Repete -->

              <? } ?>

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- //CARROSSEL -->

    <div class="btn-container btn-cta-home" data-aos="zoom-in">
      <a href="#lp-form" class="btn btn-primario pulse"><?=$depoText['botao']?></a>
    </div>
    
  </div>
</section>
<? } ?>
