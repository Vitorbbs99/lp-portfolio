<?php
$pag_title = "Site em manutenção - ".TITULO_SITE;
$pag_desc = SEO_DESCRIPTION;
?>
<!DOCTYPE html>
<html lang="pt-br">

<!-- HEAD -->
<? include(APP_PATH.'/estrutura/head.php'); ?>

<body class="manutencao-body">

<section class="manutencao-pg">
  <div class="container">
    <div class="grid-12 manutencao-content fade-up">
      <div class="manutencao-logo">
        <img src="<?=LOGO_PRINCIPAL?>" alt="<?=TITULO_SITE?>">
      </div>
      <div class="manutencao-infos">
        <h1 class="titulo">Estamos em manutenção</h1>
        <div class="texto">
          <p>Estamos realizando melhorias em nosso site. Agradecemos pela compreensão.</p>
          <p>Volte logo!</p>
        </div>
      </div>
    </div>
  </div>
</section>

<? include('gerais_footer.php'); ?>

</body>
</html>
