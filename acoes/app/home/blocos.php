<?php

// BLOCOS
$resultBlocosDest = $conexao->prepare("SELECT * FROM blocos_home WHERE status=1 ORDER BY ordem_exibicao ASC");
$resultBlocosDest->execute();
$numBlocosDest = $resultBlocosDest->rowCount();
$blocosDest = $resultBlocosDest->fetchAll(PDO::FETCH_ASSOC);

// Opções
foreach ($blocosDest as $kBloco => $vBloco) {
  $link = $vBloco['url'] != "" ? $vBloco['url'] : "#";
  $target = $vBloco['tipo_link'] == "externo" ? "target='_blank'" : "";
  $blocosDest[$kBloco]['target'] = $target;
  $blocosDest[$kBloco]['url'] = $link;
}

// TEXTOS
$resultBlocosText = $conexao->prepare("SELECT * FROM paginas WHERE pagina='blocos-destaques' ORDER BY id DESC LIMIT 1");
$resultBlocosText->execute();
$blocosText = $resultBlocosText->fetch(PDO::FETCH_ASSOC);
