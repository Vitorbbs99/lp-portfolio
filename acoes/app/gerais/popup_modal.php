<?php

// POPUP MODAL
$resultPopupModal = $conexao->prepare("SELECT * FROM paginas WHERE pagina='popup' AND status=1");
$resultPopupModal->execute();
$numPopupModal = $resultPopupModal->rowCount();
$popupModal = $resultPopupModal->fetch(PDO::FETCH_ASSOC);
