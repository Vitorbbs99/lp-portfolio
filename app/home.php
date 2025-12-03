<?php
$pag_title = SEO_TITLE;
$pag_desc = SEO_DESCRIPTION;
?>
<!DOCTYPE html>
<html lang="pt-br">

<!-- HEAD -->
<? include(APP_PATH.'/estrutura/head.php'); ?>

<body class="home-full">

  <!-- HEADER -->
  <? include(APP_PATH.'/estrutura/header.php'); ?>

  <!-- APRESENTAÇÃO -->
  <? include(APP_PATH.'/home/apresentacao.php'); ?>

  <!-- SOBRE -->
  <? include(APP_PATH.'/home/sobre.php'); ?>

  <!-- BLOCOS HOME -->
  <? include(APP_PATH.'/home/blocos.php'); ?>

  <!-- FOTOS -->
  <? include(APP_PATH.'/home/fotos.php'); ?>

  <!-- CONTADORES -->
  <? include(APP_PATH.'/home/contadores.php'); ?>

  <!-- DEPOIMENTOS -->
  <? include(APP_PATH.'/home/depoimentos.php'); ?>

  <!-- CHAMADA -->
  <? include(APP_PATH.'/home/chamada.php'); ?>  

  <!-- VÍDEOS -->
  <? include(APP_PATH.'/home/videos.php'); ?>

  <!-- FAQ -->
  <? include(APP_PATH.'/home/faq.php'); ?>

  <!-- CLIENTES -->
  <? include(APP_PATH.'/home/clientes.php'); ?>

  <!-- FOOTER -->
  <? include(APP_PATH.'/estrutura/footer.php'); ?>

</body>
</html>
