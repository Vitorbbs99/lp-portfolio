<?php

// DEPOIMENTOS
$resultDepoimentos = $conexao->prepare("SELECT * FROM depoimentos WHERE status=1 ORDER BY id DESC");
$resultDepoimentos->execute();
$numDepoimentos = $resultDepoimentos->rowCount();
$depoimentos = $resultDepoimentos->fetchAll(PDO::FETCH_ASSOC);

// TEXTOS
$resultDepoText = $conexao->prepare("SELECT * FROM paginas WHERE pagina='depoimentos' ORDER BY id DESC LIMIT 1");
$resultDepoText->execute();
$depoText = $resultDepoText->fetch(PDO::FETCH_ASSOC);
