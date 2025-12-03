<?php
include ("session_init.php");
include ("paths.php");
include (SRC_PATH."/Conexao.class.php");
include (SRC_PATH."/Init.class.php");
include (SRC_PATH."/Tools.class.php");
include (SRC_PATH."/Crud.class.php");
include (CONF_PATH."/conf.php");

if (WHATSAPP) {

  // Atualiza o contador de cliques
  $wppClicks = new Crud("admin_wpp_clicks");
  $userIp = Tools::getClientIP();
  $userAgent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : "";
  $dados = [
    'ip_address' => $userIp,
    'user_agent' => $userAgent,
    'created_at' => Tools::getDateTime(),
  ];
  $wppClicks->insert($dados);

  // Redireciona para o WhatsApp
  $whatsNumber = "55".Tools::somenteNumeros(WHATSAPP);
  if (isset($_GET['msg']) && $_GET['msg'] != "") {
    $whatsMsg = rawurlencode(trim($_GET['msg']));
  } else {
    $whatsMsg = rawurlencode(trim(WHATS_MSG));
  }
  //$whatsLink = Tools::isMobile() ? "https://api.whatsapp.com" : "https://web.whatsapp.com";
  $whatsLink = "https://api.whatsapp.com";
  $whatsLink = $whatsLink."/send?phone=".$whatsNumber."&text=".$whatsMsg;
  header('Location: '.$whatsLink);
  Tools::redireciona($whatsLink);
} else {
  Tools::redireciona(URL);
}