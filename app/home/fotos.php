<? include(ACOES_APP_PATH."/home/fotos.php"); ?>
<? if ($numFotos > 0) { ?>
<section class="secao home-fotos grey">
  <div class="container">

    <h2 class="titulo fotos-titulo" data-aos="fade-up"><?=$fotosText['titulo']?></h2>
    <h2 class="subtitulo fotos-subtitulo" data-aos="fade-up"><?=$fotosText['subtitulo']?></h2>

    <!-- CARROSSEL -->
    <div class="grid-12" data-aos="fade-up">
      <div class="splide carousel carousel-arrows-zoom carrossel-fotos">
        <div class="splide__track">
          <div class="splide__list">

            <? foreach ($fotosLista as $fotoItem) { ?>

              <!-- Repete -->
              <div class="splide__slide">
                <a href="<?=URL?>uploads/paginas/<?=$fotosText['id']?>/paginas_fotos/thumb-800-0/<?=$fotoItem['foto']?>" class="galeria-thumb" data-lightbox data-title="<?=$fotoItem['descricao']?>">
                  <figure>
                    <img class="shimmer lazyload" data-src="<?=URL?>uploads/paginas/<?=$fotosText['id']?>/paginas_fotos/thumb-300-300/<?=$fotoItem['foto']?>" src="<?=Tools::genPchSrc(280, 220)?>" width="280px" height="220px" alt="<?=$fotoItem['descricao']?>">
                  </figure>
                  <? if ($fotoItem['descricao']) { ?>
                    <div class="galeria-tit"><?=$fotoItem['descricao']?></div>
                  <? } ?>
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
      <a href="#lp-form" class="btn btn-primario pulse"><?=$fotosText['botao']?></a>
    </div>
    
  </div>
</section>
<? } ?>
