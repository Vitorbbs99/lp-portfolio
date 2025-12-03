<? include(ACOES_APP_PATH."/home/faq.php"); ?>
<section class="secao grey home-faq">
  <div class="container">
    
    <h2 class="titulo faq-titulo" data-aos="fade-up"><?=$faqText['titulo']?></h2>
    <h2 class="subtitulo faq-subtitulo" data-aos="fade-up"><?=$faqText['subtitulo']?></h2>

    <!-- LISTA -->
    <div class="flex-center mt-2">
      <div class="grid-7 grid-m-10 grid-s-12 faq-lista">
        <div class="row">
          <div class="flex-center">
            <? foreach ($faqLista as $faqItem) { ?>
              <!-- Repete -->	
              <div class="faq" data-aos="fade-up">
                <div class="faq-pergunta"><i></i> <span><?=$faqItem['titulo']?></span></div>
                <div class="faq-resposta">
                  <div class="texto"><?=$faqItem['texto']?></div>
                </div>
              </div>
              <!-- //Repete -->
            <? } ?>
          </div>
        </div>
      </div>
    </div>
    <!-- //LISTA -->

    <div class="btn-container btn-cta-home" data-aos="zoom-in">
      <a href="#lp-form" class="btn btn-primario pulse"><?=$faqText['botao']?></a>
    </div>

  </div>
</section>
