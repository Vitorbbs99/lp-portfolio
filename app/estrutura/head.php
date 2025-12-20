<head>
  <meta charset="UTF-8">

  <title><?=$pag_title?></title>
  <meta name="description" content="<?=$pag_desc?>" />
  <meta name="author" content="Vitor Barbosa" />
  <meta name="reply-to" content="<?=EMAIL_ATENDIMENTO?>"/>
  <meta name="robots" content="index,follow" />
  <meta name="theme-color" content="#000319" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- COMPARTILHAMENTO -->
	<?php
	$og_title = $og_title != "" ? $og_title : $pag_title;
	$og_description = $og_description != "" ? $og_description : $pag_desc;
  $og_image = $og_image != "" ? $og_image : LOGO_SHARE;	
  $og_type = $og_type != "" ? $og_type : "website";
	$og_url = $og_url != "" ? $og_url : "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];	
	$canonical = $og_url;	
	?>
  <meta property="og:title" content="<?=$og_title?>" />
  <meta property="og:description" content="<?=$og_description?>" />
  <meta property="og:image" content="<?=$og_image?>" />
  <link rel="canonical" href="<?=$canonical?>"/>	
  <meta property="og:url" content="<?=$og_url?>" />
  <meta property="og:type" content="<?=$og_type?>" />
  <meta property="og:locale" content="pt_BR" />
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:image" content="<?=$og_image?>" />
  <meta name="twitter:title" content="<?=$og_title?>" />
  <meta name="twitter:description" content="<?=$og_description?>" />

  <!-- SCHEMA -->
  <? include('schema.php'); ?>
  
  <!-- FAVICONS -->
  <link rel="shortcut icon" href="<?=FAVICON?>">
  <link rel="icon" href="<?=URL?>fav.png" sizes="32x32">
  <link rel="icon" href="<?=URL?>fav.png" sizes="128x128">
  <link rel="icon" href="<?=URL?>fav.png" sizes="180x180">
  <link rel="icon" href="<?=URL?>fav.png" sizes="192x192">
  <link rel="apple-touch-icon" href="<?=URL?>fav.png" sizes="180x180">

  <!-- FONTES -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap">
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

  <!-- ÍCONES -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css" integrity="sha512-vebUliqxrVkBy3gucMhClmyQP9On/HAWQdKDXRaAlb/FKuTbxkjPKUyqVOxAcGwFDka79eTF+YXwfke1h3/wfg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- CSS -->
  <link rel="stylesheet" href="<?=URL_APP?>assets/dist/css/style.min.css?v=<?=CACHE?>">

  <!-- SCRIPTS -->
  <? include(ACOES_APP_PATH."/gerais/scripts_head.php"); ?>
  <? include(ACOES_API."/fb_api.php"); ?>

</head>
