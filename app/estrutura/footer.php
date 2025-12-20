<? include(ACOES_APP_PATH."/gerais/footer.php"); ?>
<footer class="footer footer-simples bg-image" style="background-image: url('<?=URL?>uploads/paginas/<?=$footer['id']?>/thumb-2000-0/<?=$footer['foto']?>');">
  
  <span class="mascara"></span>

  <div class="container">
    
    <div class="footer-content">
      
      <!-- Sobre -->
      <div class="footer-col footer-sobre">
        <!-- Redes sociais -->
        <div class="redes-sociais">
            <a href="https://www.linkedin.com/in/vitor-barbosa-162640174/" target="_blank" title=LinkedIn><i class="fab fa-linkedin-in"></i></a>
        </div>
        <!-- //Redes sociais -->
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
