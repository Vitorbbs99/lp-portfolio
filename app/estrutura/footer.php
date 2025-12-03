<? include(ACOES_APP_PATH."/gerais/footer.php"); ?>
<footer class="footer footer-simples bg-image" style="background-image: url('<?=URL?>uploads/paginas/<?=$footer['id']?>/thumb-2000-0/<?=$footer['foto']?>');">
  
  <span class="mascara"></span>

  <div class="container">
    
    <div class="footer-content">
      
      <!-- Sobre -->
      <div class="footer-col footer-sobre">
        <!-- Redes sociais -->
        <div class="redes-sociais">
          <? if (INSTAGRAM != "") { ?>
            <a href="<?=INSTAGRAM?>" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
          <? } ?>
          <? if (FACEBOOK != "") { ?>
            <a href="<?=FACEBOOK?>" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
          <? } ?>
          <? if (TIKTOK != "") { ?>
            <a href="<?=TIKTOK?>" target="_blank" title="TikTok"><i class="fab fa-tiktok"></i></a>
          <? } ?>
          <? if (YOUTUBE != "") { ?>
            <a href="<?=YOUTUBE?>" target="_blank" title=Youtube><i class="fab fa-youtube"></i></a>
          <? } ?>
          <? if (TWITTER != "") { ?>
            <a href="<?=TWITTER?>" target="_blank" title="X"><svg enable-background="new 0 0 1226.37 1226.37" viewBox="0 0 1226.37 1226.37" xmlns="http://www.w3.org/2000/svg"><path fill="currentColor" d="m727.348 519.284 446.727-519.284h-105.86l-387.893 450.887-309.809-450.887h-357.328l468.492 681.821-468.492 544.549h105.866l409.625-476.152 327.181 476.152h357.328l-485.863-707.086zm-144.998 168.544-47.468-67.894-377.686-540.24h162.604l304.797 435.991 47.468 67.894 396.2 566.721h-162.604l-323.311-462.446z"></path><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg></a>
          <? } ?>
          <? if (LINKEDIN != "") { ?>
            <a href="<?=LINKEDIN?>" target="_blank" title=LinkedIn><i class="fab fa-linkedin-in"></i></a>
          <? } ?>
        </div>
        <!-- //Redes sociais -->
      </div>
    
      <!-- Links -->
      <div class="footer-col">
        <ul class="footer-links">
          <li><a href="<?=URL?>politica-de-privacidade">Política de privacidade</a></li>
        </ul>
      </div>

    </div>
  </div>

  <!-- Barra footer -->
  <div class="footer-bar">
    <div class="container">
      <div class="footer-bar-content">
        <div class="footer-bar-item">&copy <?=date('Y')?> <?=TITULO_SITE?> - Todos os direitos reservados</div>
    </div>
  </div>

</footer>
<!-- //FOOTER -->

<!-- GERAIS -->
<? include('gerais_footer.php'); ?>
