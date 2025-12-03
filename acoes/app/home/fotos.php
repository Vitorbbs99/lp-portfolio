<?php

// TEXTOS
$resultFotosText = $conexao->prepare("SELECT * FROM paginas WHERE pagina='galeria' ORDER BY id DESC LIMIT 1");
$resultFotosText->execute();
$fotosText = $resultFotosText->fetch(PDO::FETCH_ASSOC);

// FOTOS
$resultFotos = $conexao->prepare("SELECT * FROM paginas_fotos WHERE item_id=".$fotosText['id']." ORDER BY ordem_exibicao ASC, id ASC");
$resultFotos->execute();
$numFotos = $resultFotos->rowCount();
$fotosLista = $resultFotos->fetchAll(PDO::FETCH_ASSOC);
