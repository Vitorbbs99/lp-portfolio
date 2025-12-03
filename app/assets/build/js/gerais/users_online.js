// Usuários online
(function () {
  "use strict";

  // Variáveis
  const urlApi = url_base + "acoes/api/users_online.php";
  let isLoading = false;

  // Envia as informações do usuário
  function sendUserOnline() {
    if (!isLoading && idleTime < 2) {
      $.ajax({
        url: urlApi,
        type: "POST",
        data: {
          acao: "users_online",
          page: window.location.pathname,
          //page: window.location.origin + window.location.pathname,
        },
        beforeSend: function () {
          isLoading = true;
        },
      })
        .done(function (result) {
          isLoading = false;
          //console.log(result);
        })
        .fail(function (jqXHR, textStatus, error) {
          isLoading = false;
          console.log(error);
        });
    }
  }

  // Carrega a primeira vez quando a página é carregada
  $(window).on("load", function () {
    setTimeout(sendUserOnline, 500);
    const userOnlineInterval = setInterval(() => {
      sendUserOnline();
    }, 30000);
  });

  // Calcula o tempo de inatividade (Minutos)
  let idleTime = 0;
  const idleInterval = setInterval(() => {
    idleTime = idleTime + 0.5;
  }, 30000);
  $(document).on(
    "mousemove keypress scroll touchstart",
    debounce(function () {
      idleTime = 0;
    }, 100)
  );
})();
