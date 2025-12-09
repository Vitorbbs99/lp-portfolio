<? include(ACOES_APP_PATH."/gerais/scripts_body.php"); ?>
<? include(ACOES_APP_PATH."/gerais/header.php"); ?>

<header class="header header-full">

  <!-- TELEFONES MOBILE -->
  <div class="header-telefones hide-desktop hide-tablet">		
    <? if (count($telsContato) > 0) { ?>
      <? foreach ($telsContato as $tel) { ?>
        <a href="tel:<?=Tools::somenteNumeros($tel)?>"><i class="fas fa-phone fa-flip-horizontal"></i> <?=$tel?></a>
      <? } ?>
    <? } ?>
    <? if (WHATSAPP != "") { ?>
      <a href="<?=URL?>whatsapp.php" target="_blank"><i class="fab fa-whatsapp"></i> <?=WHATSAPP?></a>
    <? } ?>
  </div>
  <!-- //TELEFONES MOBILE -->
 
	<div class="container">
		<div class="header-content">

      <!-- LOGO -->
      <a href="<?=URL?>" title="<?=TITULO_SITE?>" class="header-logo">
        Reload
      </a>

      <!-- DIREITA -->
      <div class="header-direita">

        <!-- MENU LATERAL -->
        <? include('menu_lateral.php'); ?>		
        
        <!-- BOTÕES/TELEFONES -->
        <div class="header-botoes">	
            <a href="tel:<?=Tools::somenteNumeros($telsContato[0])?>" class="btn btn-terciario">Projetos</a>
        </div>
        <!-- //BOTÕES/TELEFONES -->

      </div>
      <!-- //DIREITA -->

    </div>
  </div>
</header>
