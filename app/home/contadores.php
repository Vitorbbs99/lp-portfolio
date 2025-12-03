<? include(ACOES_APP_PATH."/home/contadores.php"); ?>
<? if ($numContadores > 0) { ?>
<section class="secao bg-image contadores-home lazyload" style="background-image: url('<?=$lazyImg?>');" data-bg="<?=URL?>uploads/paginas/<?=$contadoresText['id']?>/thumb-2000-0/<?=$contadoresText['foto']?>">
  <span class="mascara"></span>
  <div class="container">

    <h2 class="titulo white contadores-titulo" data-aos="fade-up"><?=$contadoresText['titulo']?></h2>
    <h2 class="subtitulo white contadores-subtitulo" data-aos="fade-up"><?=$contadoresText['subtitulo']?></h2>

    <ul class="contadores-lista">

      <? foreach ($contadores as $contador) { ?>

        <!-- Repete -->
        <li class="grid-3 grid-m-6 grid-s-12 contador-wrp" data-aos="fade-up">
          <div class="contador-item">
            <div class="contador-num-wrp">
              <div class="contador-prefix"><?=$contador['prefixo']?></div>
              <div class="contador-num" data-count="<?=$contador['numero']?>">0</div>
              <div class="contador-sufix"><?=$contador['sufixo']?></div>
            </div>
            <div class="contador-titulo"><?=$contador['titulo']?></div>
          </div>
        </li>
        <!-- //Repete -->

      <? } ?>

    </ul>

    <div class="btn-container btn-cta-home" data-aos="zoom-in">
      <a href="#lp-form" class="btn btn-white pulse"><?=$blocosText['botao']?></a>
    </div>

  </div>
</section>
<? } ?>
