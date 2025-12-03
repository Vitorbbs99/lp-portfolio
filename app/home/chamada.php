<? include(ACOES_APP_PATH."/home/chamada.php"); ?>
<section class="secao bg-image chamada-home lazyload" style="background-image: url('<?=$lazyImg?>');" data-bg="<?=URL?>uploads/paginas/<?=$chamadaHome['id']?>/thumb-2000-0/<?=$chamadaHome['foto']?>">
  <span class="mascara"></span>
  <div class="container">

    <h2 class="titulo white" data-aos="fade-up"><?=$chamadaHome['titulo']?></h2>

    <h3 class="subtitulo white" data-aos="fade-up"><?=$chamadaHome['texto']?></h3>

    <div class="btn-container" data-aos="fade-up">
      <a href="<?=$chamadaHome['link']?>" class="btn btn-white pulse"><?=$chamadaHome['botao']?></a>
    </div>

  </div>
</section>
