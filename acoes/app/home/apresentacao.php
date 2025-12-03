<?php

// APRESENTAÇÃO
$resultApresentacao = $conexao->prepare("SELECT * FROM paginas WHERE pagina='apresentacao' ORDER BY id DESC LIMIT 1");
$resultApresentacao->execute();
$numApresentacao = $resultApresentacao->rowCount();
$apresentacao = $resultApresentacao->fetch(PDO::FETCH_ASSOC);

// FORMULÁRIO
$resultFormulario = $conexao->prepare("SELECT * FROM paginas WHERE pagina='formulario' ORDER BY id DESC LIMIT 1");
$resultFormulario->execute();
$numFormulario = $resultFormulario->rowCount();
$formulario = $resultFormulario->fetch(PDO::FETCH_ASSOC);
