<nav class="fdx-menu lateral">
  <ul class="fdx-menu-1-level">
    <li><a href="<?=URL?>">Home</a></li>
    <li><a href="<?=URL?>sobre">Sobre</a></li>	
    <li><a href="<?=URL?>servicos">Serviços</a>
      <ul class="fdx-menu-2-level">
        <? foreach ($servicosMenu as $servicoMenu) { ?>
          <li><a href="<?=URL?><?=$servicoMenu['url_amigavel']?>"><?=$servicoMenu['titulo']?></a></li>
        <? } ?>							
      </ul>
    </li>
    <li><a href="<?=URL?>produtos">Produtos</a>
      <ul class="fdx-menu-2-level">
        <? foreach ($catsMenu as $catMenu) { ?>
          <li><a href="<?=URL?>produtos/<?=$catMenu['url_amigavel']?>"><?=$catMenu['titulo']?></a></li>
        <? } ?>							
      </ul>
    </li>
    <li><a href="<?=URL?>fotos">Fotos</a></li>	
    <li><a href="<?=URL?>videos">Vídeos</a></li>	
    <li><a href="<?=URL?>blog">Blog</a></li>	
    <li><a href="<?=URL?>contato">Contato</a></li>			
  </ul>		
</nav>
