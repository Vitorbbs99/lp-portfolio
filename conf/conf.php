<?php

// Ativa ou desativa os erros do PHP
Tools::debug(false);
if (isset($_GET['debug']) && $_GET['debug'] == "1") {
  Tools::debug(true);
}

// Banco de dados
define('DB_HOST', 'localhost');
define('DB_NAME', 'bdvitor');
define('DB_USER', 'root');
define('DB_PASS', '');
define('CHARSET', 'utf8mb4');
$conexao = Init::conectar();

// Resgata as configurações do site
$confs = new Crud('sistema_conf');
$linha_sys = $confs->SelectSingle('SELECT * FROM sistema_conf');
$linha_conf = $confs->SelectSingle('SELECT * FROM admin_conf');

// Configurações de URL
$url_local = true;
$pasta_painel = 'painel/';
if ($url_local) {
  define('URL', 'http://localhost/vitor/');
} else {
  define('URL', $linha_sys['url_base']);
}
define('URL_APP',   URL . 'app/');
define('URL_PAINEL', URL . $pasta_painel);

// Impede que o projeto seja executado em versões do PHP inferiores a 7.0
if (version_compare(PHP_VERSION, '7.0.0') < 0) {
  die('A versão mínima do PHP para executar este projeto é 7.0.0');
}

// Título do site
define('TITULO_SITE', $linha_conf['titulo_site']);

// Informações de contato e endereço
$telsContato = $linha_conf['telefones'] ? explode(",", $linha_conf['telefones']) : [];
$emailsContato = $linha_conf['email_formulario'] ? explode(",", $linha_conf['email_formulario']) : [];
define('EMAIL_ATENDIMENTO', $linha_conf['email_atendimento']);
define('WHATSAPP', $linha_conf['whatsapp']);
define('WHATS_MSG', $linha_conf['whats_msg']);
define('WHATS_LATERAL', $linha_conf['whats_lateral']);
define('ENDERECO', $linha_conf['endereco']);
define('MAPA', $linha_conf['mapa']);
define('LINK_MAPA', $linha_conf['link_mapa']);
define('HORARIO_FUNCIONAMENTO', $linha_conf['horario_funcionamento']);
define('POPUP_COOKIES', $linha_conf['popup_cookies']);

// Redes Sociais
define('FACEBOOK', $linha_conf['facebook']);
define('INSTAGRAM', $linha_conf['instagram']);
define('TWITTER', $linha_conf['twitter']);
define('YOUTUBE', $linha_conf['youtube']);
define('LINKEDIN', $linha_conf['linkedin']);
define('SKYPE', $linha_conf['skype']);
define('TIKTOK', $linha_conf['tiktok']);

// SEO
define('SEO_TITLE', $linha_conf['seo_title'] ? $linha_conf['seo_title'] : TITULO_SITE);
define('SEO_DESCRIPTION', $linha_conf['seo_description']);

// Recaptcha
define('RECAPTCHA_KEY', $linha_sys['recaptcha_key']);
define('RECAPTCHA_SECRET', $linha_sys['recaptcha_secret']);

// SMTP
define('SMTP_HOST', $linha_sys['smtp_host']);
define('SMTP_USER', $linha_sys['smtp_user']);
define('SMTP_PASS', $linha_sys['smtp_pass']);
define('SMTP_PORT', $linha_sys['smtp_port']);
define('SMTP_FROM', $linha_sys['smtp_from']);
define('EMAIL_AUTENTICADO', $linha_sys['email_autenticado']);
define('SEND_API', $linha_sys['sp_api']);

// Cores Admin
define('COR_PRINCIPAL', $linha_sys['cor_principal']);
define('COR_SECUNDARIA', $linha_sys['cor_secundaria']);
define('COR_SITE', $linha_sys['cor_secundaria']);
define('BTN_PRINCIPAL', $linha_sys['btn_principal']);
define('BTN_SECUNDARIO', $linha_sys['btn_secundario']);
define('COR_ICHECK', $linha_sys['cor_icheck']);

// Versão do cache do site
define('CACHE', $linha_sys['cache']);

// Logotipos
$logo_principal = $confs->SelectSingle("SELECT * FROM admin_logos WHERE local='principal' AND status=1 ORDER BY id DESC LIMIT 1");
$logo_footer=$confs->SelectSingle("SELECT * FROM admin_logos WHERE local='footer' AND status=1 ORDER BY id DESC LIMIT 1");
$logo_email=$confs->SelectSingle("SELECT * FROM admin_logos WHERE local='email' AND status=1 ORDER BY id DESC LIMIT 1");
$logo_painel=$confs->SelectSingle("SELECT * FROM admin_logos WHERE local='icon_admin' AND status=1 ORDER BY id DESC LIMIT 1");
$logo_favicon=$confs->SelectSingle("SELECT * FROM admin_logos WHERE local='favicon' AND status=1 ORDER BY id DESC LIMIT 1");
$logo_share=$confs->SelectSingle("SELECT * FROM admin_logos WHERE local='share' AND status=1 ORDER BY id DESC LIMIT 1");
$logos_path = URL . 'uploads/admin_logos';
define('LOGO_PRINCIPAL', $logos_path.'/'.$logo_principal['id'].'/'.$logo_principal['logo']);
define('LOGO_FOOTER', $logos_path.'/'.$logo_footer['id'].'/'.$logo_footer['logo']);
define('LOGO_EMAIL', $logos_path.'/'.$logo_email['id'].'/'.$logo_email['logo']);
define('LOGO_PAINEL', $logos_path.'/'.$logo_painel['id'].'/'.$logo_painel['logo']);
define('LOGO_SHARE', $logos_path.'/'.$logo_share['id'].'/'.$logo_share['logo']);
define('FAVICONS_PATH', $logos_path.'/'.$logo_favicon['id']);
define('FAVICON', $logos_path.'/'.$logo_favicon['id'].'/thumb-32-32/'.$logo_favicon['logo']);

// Timezone
define('TIMEZONE', $linha_sys['timezone']);
date_default_timezone_set('' . TIMEZONE . '');

$lazyImg = "data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs=";

// SCRIPTS
$resultScripts = $conexao->prepare("SELECT * FROM admin_scripts WHERE status=1 ORDER BY ordem_exibicao ASC");
$resultScripts->execute();
$numScripts = $resultScripts->rowCount();
$customScripts = $resultScripts->fetchAll(PDO::FETCH_ASSOC);
function validCustomPageScript($pagRule, $pagUrl) {
  $pagUrlVerify = $_GET['path'];
  if ($pagRule == "equals" && ($pagUrl === $pagUrlVerify || $pagUrl."/" === $pagUrlVerify)) {
    return true;
  } else if ($pagRule == "contains" && (strpos($pagUrlVerify, $pagUrl) !== FALSE || strpos($pagUrlVerify, $pagUrl."/") !== FALSE)) {
    return true;
  }
  return false;
}

// FORÇAR HTTPS
if (!$url_local && $linha_sys['force_https'] == "1") {
  if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
    $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('Location: ' . $redirect, true, 301);
    exit();
  }
}

// FORÇAR WWW
if (!$url_local && $linha_sys['force_www'] == "1") {
  if (strpos($_SERVER['HTTP_HOST'], 'www.') === false) {
    $redirect = 'https://www.' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('Location: ' . $redirect, true, 301);
    exit();
  }
}
