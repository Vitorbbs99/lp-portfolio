<? include(ACOES_APP_PATH."/gerais/popup_modal.php"); ?>
<? if ($numPopupModal > 0) { ?>
  <div class="modal modal-popup" id="modal-popup">
    <div class="modal-wrap">
      <span class="modal-btn-close modal-close" data-modal="modal-popup"></span>
      <div class="modal-body">
        <? if ($popupModal['foto']) { ?>
          <img src="<?=URL?>uploads/paginas/<?=$popupModal['id']?>/thumb-800-0/<?=$popupModal['foto']?>" alt="<?=$popupModal['titulo']?>">
        <? } else if (trim($popupModal['texto']) != "") { ?>
          <div class="modal-popup-content">
            <div class="modal-popup-tit"><?=$popupModal['titulo']?></div>
            <div class="texto modal-popup-txt"><?=$popupModal['texto']?></div>
          </div>
        <? } ?>
      </div>
    </div>
  </div>
  <script>
    // Verifica se o modal já foi exibido nesta sessão
    if (!window.sessionStorage.getItem('modal_popup')) {
      setTimeout(() => {
        document.querySelector('#modal-popup').classList.add('open');
      }, 2000);
      window.sessionStorage.setItem('modal_popup', '1');
    }
  </script>
<? } ?>
