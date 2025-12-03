<?php
include ("../../session_init.php");
include ("../../paths.php");
include (SRC_PATH."/Conexao.class.php");
include (SRC_PATH."/Init.class.php");
include (SRC_PATH."/Tools.class.php");
include (SRC_PATH."/Crud.class.php");
include (CONF_PATH."/conf.php");
include (SRC_PATH."/Email.class.php");

$dados_email = array(
  'titulo' => 'E-mail de Teste',
  'texto' => 'Este é apenas um e-mail de teste.'
);

$assunto = "E-mail teste";
$destinatarios = isset($_GET['dest']) && $_GET['dest'] != "" ? [$_GET['dest']] : $emailsContato;
$responderParaNome = TITULO_SITE;
$responderParaEmail = SMTP_FROM;
$anexos = array();
$email = new Email($dados_email, $assunto, $destinatarios, $responderParaNome, $responderParaEmail, $anexos, true);

echo $email->getPrev();

echo "<br><br>";

echo "<style>
  * {
    font-family: sans-serif;
  }
  .box {
    position: fixed; 
    left: 0; 
    right: 0; 
    bottom: 20px; 
    margin: 0 auto; 
    width: 100%;
    text-align: center; 
    background: #fff;
    padding: 10px 20px;
    border-radius: 8px;
    font-size: 1.1em;
    font-weight: bold;
    color: white;
  }
  .success {
    background: green;
    max-width: 300px;
  }
  .error {
    background: red;
    max-width: 600px;
  }
</style>";

if ($email->enviar()) {
  $apiInfo = SEND_API ? '<br> (Via API Sendpulse)' : '';
  echo '<div class="box success">E-mail enviado com sucesso!'.$apiInfo.'</div>';
} else {
  echo '<div class="box error">'.$email->getErro().'</div>';
}
