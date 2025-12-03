<?php
$pag_title = "Página não encontrada - ".TITULO_SITE;
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
  <section class="pag-banner" style="background-image: url('<?=URL?>app/assets/dist/img/bg_pags.jpg');">
    <div class="mascara"></div>
    <div class="container">
      <div class="grid-12 content" data-aos="fade-up">
        <h1 class="titulo">Página não encontrada!</h1>
      </div>
    </div>
  </section>
  <!-- //BANNER -->

  <!-- PÁGINA -->
  <section class="secao secao-pag">
    <div class="container">
      <div class="empty" data-aos="fade-up">
        <div class="grid-12 empty-content">
          <div class="texto center">
            <h2>A página que você está tentando acessar não foi encontrada.</h2>
            Verifique a url informada ou remova algum filtro.
          </div>
          <div class="btn-container">
            <a href="<?=URL?>" class="btn btn-primario">Voltar ao início</a>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- //PÁGINA -->

  <!-- FOOTER -->
  <? include(APP_PATH.'/estrutura/footer.php'); ?>

</body>
</html>
