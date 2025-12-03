<? include(ACOES_APP_PATH."/institucionais/institucionais.php"); ?>
<?php
$pag_title = $pagina['titulo']." - ".TITULO_SITE;
$pag_desc = SEO_DESCRIPTION;
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

  <!-- INSTITUCIONAL -->
  <section class="secao institucional pag-obg pag-height-fix">
    <div class="container">
      <div class="grid-12" data-aos="fade-up">
        <div class="texto center"><?=$pagina['texto']?></div>
      </div>
      <div class="btn-container" data-aos="fade-up">
        <a href="<?=URL?>" class="btn btn-primario">Voltar ao início</a>
      </div>
    </div>
  </section>
  <!-- //INSTITUCIONAL -->

  <!-- FOOTER -->
  <? include(APP_PATH.'/estrutura/footer.php'); ?>

</body>
</html>
