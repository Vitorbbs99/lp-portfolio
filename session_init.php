<?php
// Definir cookies seguros
session_set_cookie_params([
  'httponly' => true,
  'secure' => isset($_SERVER['HTTPS']),
  'samesite' => 'Strict'
]);
// Inicia a sessão
session_start();
// Regenerar o ID da sessão para evitar fixação de sessão
if (!isset($_SESSION['initiated'])) {
  session_regenerate_id(true);
  $_SESSION['initiated'] = true;
}
// Regenerar o ID da sessão por parametro na URL
if (isset($_GET['rg-session'])) { 
  session_regenerate_id(true);
}
?>
