<?php

// CHAMADA
$resultChamadaHome = $conexao->prepare("SELECT * FROM paginas WHERE pagina='chamada' ORDER BY id DESC LIMIT 1");
$resultChamadaHome->execute();
$numChamadaHome = $resultChamadaHome->rowCount();
$chamadaHome = $resultChamadaHome->fetch(PDO::FETCH_ASSOC);
