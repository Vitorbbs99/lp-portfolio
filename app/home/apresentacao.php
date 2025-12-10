<? include(ACOES_APP_PATH."/home/apresentacao.php"); ?>
<section class="secao bg-image apresentacao" style="background-image: url('<?=URL_APP?>assets/dist/img/ap.png');">
  <div class="container">
    <div class="aps-content">

      <!-- Informações -->
      <div class="grid-12 grid-m-7 grid-s-12 aps-infos">

        <figure class="photo-ap">
          <img src="<?=URL_APP?>assets/dist/img/vitor.png" alt="">
        </figure>

        <!-- Título -->
        <h1 class="titulo aps-titulo" data-aos="fade-up">Desenvolvedor <b>Full-Stack.</b></h1>

        <!-- Subtítulo -->
        <h2 class="subtitulo aps-subtitulo" data-aos="fade-up">Olá! Sou o Vitor – Transformo ideias em código.</h2>
        
        <div class="btn-container">
          <a href="<?=URL?><?=$sobreHome['link']?>" class="btn btn-lg btn-primario btn-i-r">Ver projetos <i class="las la-arrow-right"></i></a>
        </div>

      </div>
      <!-- //Informações -->

      <div class="stats-container">

        <div class="stat-item">
            <span class="stat-number">7+</span>
            <p class="stat-text">Anos de<br>experiência</p>
        </div>
        <div class="stat-item">
            <span class="stat-number">7+</span>
            <p class="stat-text">Linguagens de<br>domínio</p>
        </div>
        <div class="stat-item">
            <span class="stat-number">5+</span>
            <p class="stat-text">Projetos<br>no GitHub</p>
        </div>
        <div class="stat-item">
            <span class="stat-number">10k+</span>
            <p class="stat-text">Horas de <br>código</p>
        </div>

      </div>

    </div>
  </div>
</section>
