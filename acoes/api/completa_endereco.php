<?php
include ("../../session_init.php");
include ("../../paths.php");
include (SRC_PATH."/Conexao.class.php");
include (SRC_PATH."/Init.class.php");
include (SRC_PATH."/Tools.class.php");
include (SRC_PATH."/Crud.class.php");
include (CONF_PATH."/conf.php");
include (SRC_PATH."/CompletaEndereco.class.php");

if (isset($_POST['cep']) && $_POST['cep'] != "") {
  $cep = Tools::somenteNumeros($_POST['cep']);
  $cep = Tools::protege($cep);
  if ($cep != "") {
    $endereco = CompletaEndereco::getEndereco($cep);
    echo $endereco;
  } else {
    echo "Informe um CEP.";
  }
}
