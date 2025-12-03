<?php
include ("../../session_init.php");
include ("../../paths.php");
include (SRC_PATH."/Conexao.class.php");
include (SRC_PATH."/Init.class.php");
include (SRC_PATH."/Tools.class.php");
include (SRC_PATH."/Crud.class.php");
include (CONF_PATH."/conf.php");

$visitas = new Crud("admin_visitas");

if (isset($_POST['acao']) && $_POST['acao'] == "users_online") {

  $userViewPag = Tools::protege($_POST['page']);
  $userAgent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : "";
  $userIp = Tools::getClientIP();

  // Gera o token
  function generateRandonToken() {
    $bytes = random_bytes(20);
    $hex = bin2hex($bytes);
    $md5 = md5(date('Y-m-d H:i:s'));
    return $hex.$md5;
  }
  if (isset($_SESSION['user_view_token']) && $_SESSION['user_view_token'] != "") {
    $userViewToken = $_SESSION['user_view_token'];
  } else {
    $userViewToken = generateRandonToken();
    $_SESSION['user_view_token'] = $userViewToken;
  }

  // Verifica se não é BOT de buscadores
  function isBot($user_agent) {
    $bots = ['bot','spider','crawl','slurp','scanner','http','fetch','monitor','googlebot','bingbot','yahoo','duckduckbot','yandexbot','baiduspider','mj12bot','ahrefsbot','semrushbot','facebookexternalhit','applebot'];
    $user_agent = strtolower($user_agent);
    foreach ($bots as $bot) {
      if (strpos($user_agent, $bot) !== false) {
        return true;
      }
    }
    return false;
  }
  if (isBot($userAgent)) {
    exit();
  }

  // Verifica se o usuário já visitou a página (Últimas 6 horas)
  $totalVisitaSQL = $conexao->prepare("SELECT id FROM admin_visitas WHERE session_id=:session_id AND token=:token AND TIMESTAMPDIFF(HOUR, data_upd, now()) < 6");
  $totalVisitaSQL->bindValue(":session_id", session_id(), PDO::PARAM_STR);
  $totalVisitaSQL->bindValue(":token", $userViewToken, PDO::PARAM_STR);
  $totalVisitaSQL->execute();
  $totalVisitas = $totalVisitaSQL->rowCount();

  // Grava a visita
  if ($totalVisitas == 0) {
    $dadosVisita = array(
      'session_id' => session_id(),
      'token' => $userViewToken,
      'user_ip' => $userIp,
      'user_agent' => $userAgent,
      'device' => Tools::isMobile($userAgent) ? "mobile" : "desktop",
      'page_first' => $userViewPag,
      'page_last' => $userViewPag
    );
    $locationIp = Tools::getLocationIP($userIp);
    if ($locationIp['status'] == "success") {
      $dadosVisita['city'] = $locationIp['city'];
      $dadosVisita['state'] = $locationIp['region'];
      $dadosVisita['country'] = $locationIp['countryCode'];
    }
    $gravaVisita = $visitas->Insert($dadosVisita);
  } 
  // Atualiza a visita
  else {
    $atualizaVisita = $conexao->prepare("UPDATE admin_visitas SET page_last=:page_last, data_upd=now() WHERE session_id=:session_id AND token=:token ORDER BY id DESC LIMIT 1");
    $atualizaVisita->bindValue(":page_last", $userViewPag, PDO::PARAM_STR);
    $atualizaVisita->bindValue(":session_id", session_id(), PDO::PARAM_STR);
    $atualizaVisita->bindValue(":token", $userViewToken, PDO::PARAM_STR);
    $atualizaVisita->execute();
  }

}
