<?php

// CLIENTES
$resultClientes = $conexao->prepare("SELECT * FROM clientes WHERE status=1 ORDER BY ordem_exibicao ASC");
$resultClientes->execute();
$numClientes = $resultClientes->rowCount();
$clientes = $resultClientes->fetchAll(PDO::FETCH_ASSOC);

// Opções
foreach ($clientes as $kCli => $vCli) {
  $clientes[$kCli]['target'] = $vCli['url'] != "" ? "target='_blank'" : "";
  $clientes[$kCli]['url'] = $vCli['url'] != "" ? $vCli['url'] : "#";
}

// TEXTOS
$resultClientesText = $conexao->prepare("SELECT * FROM paginas WHERE pagina='clientes' ORDER BY id DESC LIMIT 1");
$resultClientesText->execute();
$clientesText = $resultClientesText->fetch(PDO::FETCH_ASSOC);
