<div class="cd-dropdown-wrapper">
  <nav class="cd-dropdown">
    <ul class="cd-dropdown-content">
      
      <!-- HEADER -->
      <li class="cd-dropdown-header">
        <a href="<?=URL?>" class="cd-dropdown-logo">
          <img src="<?=LOGO_PRINCIPAL?>" alt="<?=TITULO_SITE?>">
        </a>
      </li>
      <!-- //HEADER -->

      <!-- <li><a class="dest" href="<?=URL?>minha-conta/inicio">Minha conta</a></li> -->
      <? if ($linha_conf['botao_url']) { ?>
        <li><a class="dest" href="<?=$linha_conf['botao_url']?>"><?=$linha_conf['botao_txt']?></a></li>
      <? } ?>
      
      <li><a href="<?=URL?>">Home</a></li>
      <li><a href="<?=URL?>sobre">Sobre</a></li>		

      <!-- SERVIÇOS -->
      <li class="has-children">
        <a href="#">Serviços</a>
        <ul class="cd-secondary-dropdown is-hidden">
          <li class="go-back"><a href="#0">Voltar</a></li>
          <li class="see-all"><a href="<?=URL?>servicos">Serviços</a></li>
          <? foreach ($servicosMenu as $servicoMenu) { ?>
            <li><a href="<?=URL?><?=$servicoMenu['url_amigavel']?>"><?=$servicoMenu['titulo']?></a></li>
          <? } ?>	
        </ul>
      </li>
      <!-- //SERVIÇOS -->

      <!-- PRODUTOS -->
      <li class="has-children">
        <a href="#">Produtos</a>
        <ul class="cd-secondary-dropdown is-hidden">
          <li class="go-back"><a href="#0">Voltar</a></li>
          <li class="see-all"><a href="<?=URL?>produtos">Produtos</a></li>
          <? foreach ($catsMenu as $catMenu) { ?>
            <li><a href="<?=URL?>produtos/<?=$catMenu['url_amigavel']?>"><?=$catMenu['titulo']?></a></li>
          <? } ?>	
        </ul>
      </li>
      <!-- //PRODUTOS -->
      
      <li><a href="<?=URL?>fotos">Fotos</a></li>	
      <li><a href="<?=URL?>videos">Vídeos</a></li>	
      <li><a href="<?=URL?>blog">Blog</a></li>	
      <li><a href="<?=URL?>contato">Contato</a></li>
      
      <!-- MULTINÍVEL -->
      <!-- <li class="has-children">
        <a href="#">Multinível</a>
        <ul class="cd-secondary-dropdown is-hidden">
          <li class="go-back"><a href="#0">Voltar</a></li>
          <li class="see-all"><a href="#">Multinível</a></li>
          <li class="has-children">
            <a href="#">Item 1</a>
            <ul class="is-hidden">
              <li class="go-back"><a href="#0">Voltar</a></li>
              <li class="see-all"><a href="#">Item 1</a></li>
              <li><a href="#">Subitem 1</a></li>	
              <li><a href="#">Subitem 2</a></li>	
              <li><a href="#">Subitem 3</a></li>
            </ul>
          </li>
          <li class="has-children">
            <a href="#">Item 2</a>
            <ul class="is-hidden">
              <li class="go-back"><a href="#0">Voltar</a></li>
              <li class="see-all"><a href="#">Item 1</a></li>
              <li><a href="#">Subitem 1</a></li>	
              <li><a href="#">Subitem 2</a></li>	
              <li><a href="#">Subitem 3</a></li>
            </ul>
          </li>
          <li class="has-children">
            <a href="#">Item 3</a>
            <ul class="is-hidden">
              <li class="go-back"><a href="#0">Voltar</a></li>
              <li class="see-all"><a href="#">Item 1</a></li>
              <li><a href="#">Subitem 1</a></li>	
              <li><a href="#">Subitem 2</a></li>	
              <li><a href="#">Subitem 3</a></li>
            </ul>
          </li>
        </ul>
      </li> -->
      <!-- //MULTINÍVEL -->

    </ul> <!-- .cd-dropdown-content -->
  </nav> <!-- .cd-dropdown -->
</div> <!-- .cd-dropdown-wrapper -->
