<?php

// SOBRE (HOME)
$resultSobreHome = $conexao->prepare("SELECT * FROM paginas WHERE pagina='sobre-home' ORDER BY id DESC LIMIT 1");
$resultSobreHome->execute();
$numSobreHome = $resultSobreHome->rowCount();
$sobreHome = $resultSobreHome->fetch(PDO::FETCH_ASSOC);
