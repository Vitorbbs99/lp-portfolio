<? include(ACOES_APP_PATH."/home/sobre.php"); ?>
<section class="secao home-sobre overflow-hidden">
  <div class="container">
    <div class="home-sobre-content">

      <!-- Textos -->
      <div class="grid-6 grid-s-12 home-sobre-infos" data-aos="fade-right" data-aos-offset="0">

        <h3 class="subtitulo top-tit left"><?=$sobreHome['subtitulo']?></h3>
        <h2 class="titulo left"><?=$sobreHome['titulo']?></h2>

        <!-- Imagem mobile -->
        <span class="load-img-mobile" data-img="sobre-home"></span>

        <div class="texto"><?=$sobreHome['texto']?></div>

        <div class="btn-container left">
          <a href="<?=URL?><?=$sobreHome['link']?>" class="btn btn-primario"><?=$sobreHome['botao']?></a>
        </div>

      </div>
      <!-- //Textos -->

      <!-- Foto -->
      <div class="grid-6 grid-s-12 home-sobre-foto" data-id-img="sobre-home" data-aos="fade-left" data-aos-offset="0">    
        <figure>
          <img class="shimmer lazyload" data-src="<?=URL?>uploads/paginas/<?=$sobreHome['id']?>/thumb-600-420/<?=$sobreHome['foto']?>" src="<?=Tools::genPchSrc(580, 406)?>" width="580px" height="406px" alt="<?=$sobreHome['titulo']?>">
        </figure>
      </div>
      <!-- //Foto -->

    </div>
  </div>
</section>
