<?php

// FOOTER
$resultFooter = $conexao->prepare("SELECT * FROM paginas WHERE pagina='footer'");
$resultFooter->execute();
$numFooter = $resultFooter->rowCount();
$footer = $resultFooter->fetch(PDO::FETCH_ASSOC);
