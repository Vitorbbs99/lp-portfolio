<? include(ACOES_APP_PATH."/institucionais/institucionais.php"); ?>
<?php
$pag_title = $pagina['seo_title'] ? $pagina['seo_title'] : $pagina['titulo'];
$pag_title = $pag_title." - ".TITULO_SITE;
$pag_desc = $pagina['seo_description'] ? $pagina['seo_description'] : SEO_DESCRIPTION;
?>
<!DOCTYPE html>
<html lang="pt-br">

<!-- HEAD -->
<? include(APP_PATH.'/estrutura/head.php'); ?>

<body>

  <!-- HEADER -->
  <? include(APP_PATH.'/estrutura/header.php'); ?>

  <!-- BANNER -->
  <section class="pag-banner" style="background-image: url('<?=URL?>uploads/paginas/<?=$pagina['id']?>/thumb-2000-400/<?=$pagina['banner']?>');">
    <div class="mascara"></div>
    <div class="container">
      <div class="grid-12 content" data-aos="fade-up">
        <h1 class="titulo"><?=$pagina['titulo']?></h1>
      </div>
    </div>
  </section>
  <!-- //BANNER -->

  <!-- PÁGINA -->
  <section class="secao secao-pag">
    <div class="container">
      
      <!-- CONTEÚDO PRINCIPAL -->
      <div class="pag-inst-content" data-aos="fade-up">

        <!-- TEXTO -->
        <div class="grid-9 grid-m-10 grid-s-12 pag-inst-texto">
          <div class="texto">
            <?=$pagina['texto']?>
          </div>
        </div>
        <!-- //TEXTO -->

      </div>
      <!-- //CONTEÚDO PRINCIPAL -->

    </div>
  </section>
  <!-- //PÁGINA -->

  <!-- FOOTER -->
  <? include(APP_PATH.'/estrutura/footer.php'); ?>

</body>
</html>
