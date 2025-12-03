<?php

// PERGUNTAS FREQUENTES
$resultFaq = $conexao->prepare("SELECT * FROM faq WHERE status=1 ORDER BY ordem_exibicao ASC");
$resultFaq->execute();
$numFaq = $resultFaq->rowCount();
$faqLista = $resultFaq->fetchAll(PDO::FETCH_ASSOC);

// TEXTOS
$resultFaqText = $conexao->prepare("SELECT * FROM paginas WHERE pagina='perguntas-frequentes' ORDER BY id DESC LIMIT 1");
$resultFaqText->execute();
$faqText = $resultFaqText->fetch(PDO::FETCH_ASSOC);
