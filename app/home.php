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

  <!-- BLOCOS HOME -->
  <? include(APP_PATH.'/home/blocos.php'); ?>

  <!-- Certificados -->
  <? include(APP_PATH.'/home/certificados.php'); ?>

  <? include(APP_PATH.'/home/skills.php'); ?>

  <!-- FOOTER https://www.flaticon.com/search?author_id=164&style_id=1170&type=standard&word=stack-->
  <? include(APP_PATH.'/estrutura/footer.php'); ?>

</body>
</html>
