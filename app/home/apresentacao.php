<? include(ACOES_APP_PATH."/home/apresentacao.php"); ?>
<section class="secao bg-image apresentacao" style="background-image: url('<?=URL_APP?>assets/dist/img/ap.png');">
  <div class="container">
    <div class="aps-content">

      <!-- Informações -->
      <div class="grid-8 grid-m-7 grid-s-12 aps-infos">

        <!-- Título -->
        <h1 class="titulo left aps-titulo" data-aos="fade-up"><?=$apresentacao['titulo']?></h1>

        <!-- Subtítulo -->
        <h2 class="subtitulo left aps-subtitulo" data-aos="fade-up"><?=$apresentacao['subtitulo']?></h2>

        <div class="load-img-mobile" data-img="load-form-mobile" data-aos="fade-up"></div>
        
        <!-- Texto -->
        <div class="aps-texto texto" data-aos="fade-up">
          <?=$apresentacao['texto']?>
        </div>

      </div>
      <!-- //Informações -->

    </div>
  </div>
</section>
