<? include(ACOES_APP_PATH."/home/clientes.php"); ?>
<? if ($numClientes > 0) { ?>
<section class="secao home-clientes">
  
  <div class="container">
    <h2 class="titulo" data-aos="fade-up"><?=$clientesText['titulo']?></h2>
    <h2 class="subtitulo" data-aos="fade-up"><?=$clientesText['subtitulo']?></h2>
  </div>

  <div class="container">
    <!-- CARROSSEL -->
    <div class="grid-12" data-aos="fade-up">
      <div class="splide carousel carousel-arrows-zoom carrossel-clientes">
        <div class="splide__track">
          <div class="splide__list">

            <? foreach ($clientes as $cliente) { ?>
              <!-- Repete -->
              <div class="splide__slide">
                <a href="<?=$cliente['url']?>" <?=$cliente['target']?> class="cliente-item">
                  <img class="shimmer lazyload" data-src="<?=URL?>uploads/clientes/<?=$cliente['id']?>/thumb-250-180/<?=$cliente['foto']?>" src="<?=Tools::genPchSrc(250, 180)?>" width="250px" height="180px" alt="<?=$cliente['titulo']?>">
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
      <a href="#lp-form" class="btn btn-primario pulse"><?=$clientesText['botao']?></a>
    </div>

  </div>
</section>
<? } ?>
