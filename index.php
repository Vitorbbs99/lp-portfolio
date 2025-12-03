<?php
header("Set-Cookie: name=value; httpOnly");
include ("session_init.php");
include ("paths.php");
include (SRC_PATH."/Conexao.class.php");
include (SRC_PATH."/Init.class.php");
include (SRC_PATH."/Tools.class.php");
include (SRC_PATH."/Crud.class.php");
include (CONF_PATH."/conf.php");
include (CONF_PATH."/whitelist.php");
include (ACOES_APP_PATH."/gerais/trackers.php");

// Partes da URL (Separadas por '/')
$pagsPath = isset($_GET['path']) ? $_GET['path'] : "";
$pagsArray = explode("/", $pagsPath);
$pagsTotal = count($pagsArray);
for ($i=0, $paramIndex=0; $i<$pagsTotal; $i++) {
  $paramIndex++;
  ${"param".$paramIndex} = Tools::protege($pagsArray[$i]);
}

// Verificação da página de detalhe
$isHome = false;
$isServ = false;
$isProd = false;

// Site em manutenção
if ($linha_sys['manutencao'] == '1') {
  include('app/manutencao.php');
}

// Exibe somente a Home (Descomentar para sites em desenvolvimento)
// include('app/home.php');
// exit();

// Conteúdo principal (Serviço, Produto ou Blog)
if ($param1 != "" && !in_array($param1, $whitelistPags)) {
  include('app/servico.php');
}

// Páginas área restrita
else if ($param1 == "minha-conta") {
  include('app/minha-conta/'.$param2.'.php');
}

// Páginas do site
else if (file_exists('app/'.$param1.'.php') && in_array($param1, $whitelistPags)) {
  include('app/'.$param1.'.php');
} 

// Página não encontrada
else if ($param1 != "") {
  include('app/nao-encontrado.php');
} 

// Home
else {
  $isHome = true;
  include('app/home.php');
}
