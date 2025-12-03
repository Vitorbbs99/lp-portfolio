<?php

// TEXTOS
$resultVideosText = $conexao->prepare("SELECT * FROM paginas WHERE pagina='videos' ORDER BY id DESC LIMIT 1");
$resultVideosText->execute();
$videosText = $resultVideosText->fetch(PDO::FETCH_ASSOC);

// VÍDEOS
$videos = new Crud("videos");
$videosLista = $videos->SelectMultiple("SELECT * FROM videos WHERE status=1 ORDER BY ordem_exibicao ASC", false, 0);
$numVideos = $videos->totalRegistros();
