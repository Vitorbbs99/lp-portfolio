<?php

// CONTADORES
$resultContadores = $conexao->prepare("SELECT * FROM contadores WHERE status=1 ORDER BY ordem_exibicao ASC");
$resultContadores->execute();
$numContadores = $resultContadores->rowCount();
$contadores = $resultContadores->fetchAll(PDO::FETCH_ASSOC);

// TEXTOS
$resultContadoresText = $conexao->prepare("SELECT * FROM paginas WHERE pagina='contadores' ORDER BY id DESC LIMIT 1");
$resultContadoresText->execute();
$numContadoresText = $resultContadoresText->rowCount();
$contadoresText = $resultContadoresText->fetch(PDO::FETCH_ASSOC);
