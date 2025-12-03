<!-- CONTATOS LATERAIS
<? if (WHATSAPP != "" && WHATS_LATERAL) { ?>
  <div class="contatos-laterais">
    <a href="<?=URL?>whatsapp.php" target="_blank" class="whatsapp" title="Fale conosco pelo WhatsApp!"><i class="fab fa-whatsapp"></i></a>
  </div> -->
<? } ?>

<!-- VOLTAR AO TOPO -->
<div class="gotop"></div>

<!-- LOADING -->
<div class="loading">
  <div class="loading-wrap">
    <div class="loader">Aguarde...</div>
  </div>
</div>

<!-- ALERTA -->
<div class="modal alert" id="modal-alert">
  <div class="modal-wrap">
    <span class="modal-btn-close modal-close" data-modal="modal-alert"></span>
    <div class="modal-header">
      <div class="modal-alert-icon">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <i class="fas fa-times-circle"></i>
      </div>
      <span class="modal-titulo" id="alert-titulo"></span>          
    </div>
    <div class="modal-body">
      <div id="alert-texto" class="texto center"></div>
      <div class="modal-btn center">	
        <button type="button" class="btn btn-sm modal-close" data-modal="modal-alert">Fechar</button>
      </div>  
    </div>
  </div>
</div>
<!-- //ALERTA -->

<!-- POPUP MODAL -->
<? include(APP_PATH.'/estrutura/popup_modal.php'); ?>

<!-- POPUP DE COOKIES -->
<? include(APP_PATH.'/estrutura/popup_cookies.php'); ?>

<span id="infos" data-url-base="<?=URL?>" data-recaptchakey="<?=RECAPTCHA_KEY?>"></span>

<!-- SCRIPTS -->
<script src="<?=URL_APP?>assets/dist/js/plugins.min.js?v=<?=CACHE?>"></script>
<script src="<?=URL_APP?>assets/dist/js/script.min.js?v=<?=CACHE?>"></script>
<? include(ACOES_APP_PATH."/gerais/scripts_footer.php"); ?>

<!-- Evento conversão WhatsApp (Google) -->
<? if ($linha_conf['whats_event'] != "") { ?>
<script>
function gtagReportConvWhats(t){if("undefined"!=typeof gtag)return gtag("event","conversion",{send_to:"<?=$linha_conf['whats_event']?>",event_callback:function(){void 0!==t&&(console.log("Whatsapp gtag event dispatched..."),window.location=t)}}),!1;window.location=t}$(function(){$('a[href*="whatsapp"]').on("click",function(t){t.preventDefault(),gtagReportConvWhats($(this).attr("href"))})});
</script>
<? } ?>
