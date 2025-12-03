<? include(ACOES_APP_PATH."/home/blocos.php"); ?>
<? if ($numBlocosDest > 0) { ?>
<section class="secao bg-image blocos-home lazyload" style="background-image: url('<?=$lazyImg?>');" data-bg="<?=URL?>uploads/paginas/<?=$blocosText['id']?>/thumb-2000-0/<?=$blocosText['foto']?>">
  <span class="mascara"></span>
  <div class="container">

    <h2 class="titulo white blocos-titulo" data-aos="fade-up"><?=$blocosText['titulo']?></h2>
    <h2 class="subtitulo white blocos-subtitulo" data-aos="fade-up"><?=$blocosText['subtitulo']?></h2>

    <!-- CARROSSEL -->
    <div class="grid-12" data-aos="fade-up">
      <div class="splide carousel carousel-arrows-zoom carousel-controls-white carrossel-blocos">
        <div class="splide__track">
          <div class="splide__list">

            <? foreach ($blocosDest as $bloco) { ?>

              <!-- Repete -->
              <div class="splide__slide">
                <a href="<?=$bloco['url']?>" class="bloco-item" <?=$bloco['target']?>>
                  <div class="bloco-item-img">
                    <img class="shimmer lazyload" data-src="<?=URL?>uploads/blocos_home/<?=$bloco['id']?>/thumb-150-150/<?=$bloco['foto']?>" src="<?=Tools::genPchSrc(65, 65)?>" width="65px" height="65px" alt="<?=$bloco['titulo']?>">
                  </div>
                  <div class="bloco-item-infos">
                    <div class="bloco-item-tit"><?=$bloco['titulo']?></div>
                    <div class="bloco-item-txt"><?=$bloco['texto']?></div>
                    <!-- <div class="bloco-item-btn">
                      <button class="btn btn-sm btn-primario">Saiba Mais</button>
                    </div> -->
                  </div>
                </a>
              </div>
              <!-- //Repete -->

            <? } ?>

          </div>
        </div>
      </div>
    </div>
    <!-- //CARROSSEL -->

    <div class="btn-container btn-cta-home" data-aos="zoom-in">
      <a href="#lp-form" class="btn btn-white pulse"><?=$blocosText['botao']?></a>
    </div>

  </div>
</section>
<? } ?>
