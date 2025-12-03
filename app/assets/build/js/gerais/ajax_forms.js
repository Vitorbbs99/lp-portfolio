// ------------------------------------
// Formulários AJAX
// ------------------------------------
(function () {
  "use strict";

  const $forms = $(".form-ajax");

  $forms.each(function () {
    // Variáveis
    const $form = $(this);
    const $btn = $form.find('button[type="submit"]');
    const url = $form.attr("action");
    const type = $form.attr("method");
    const btnText = $btn.text();
    const reset = $form.data("reset");
    const acao = $form.data("acao");
    const modal = $form.data("modal");
    let enviando = false;

    // Retorna o formulário ao estado inicial
    function resetForm(clearForm = false) {
      enviando = false;
      $btn.prop("disabled", false).removeClass("btn-loader").text(btnText);
      if (clearForm && reset) {
        $form[0].reset();
        $form.parsley().reset();
      }
    }

    // Ações executadas antes e enquanto o formulário é processado
    function sendingForm() {
      enviando = true;
      $btn.prop("disabled", true).addClass("btn-loader").text("Aguarde...");
    }

    // Sucesso
    function successForm(resp) {
      console.log(resp);
      resp = JSON.parse(resp);
      if (resp.status === "success") {
        // Fecha o modal
        if (modal) {
          closeModal(modal);
        }
        resetForm(reset);
        // Recarrega a página
        if (acao === "reload") {
          location.reload();
        }
        // Redireciona (Retorno no campo)
        else if (acao === "retorno") {
          const retornoUrl = $form.find('input[name="retorno"]').val();
          location.href = retornoUrl;
        }
        // Redireciona (Retorno vindo da ação)
        else if (acao === "retorno-acao" && resp?.return_url) {
          const retornoUrl = resp?.return_url;
          location.href = retornoUrl;
        }
        // Exibe mensagem
        else {
          setTimeout(() => {
            showAlert("Sucesso", resp.message, "success");
          }, 500);
        }
      } else {
        resetForm();
        showAlert("Erro", resp.message, "error");
      }
    }

    // Erro
    function errorForm(xhr, status, exception) {
      console.log(exception);
      resetForm();
      showAlert("Erro", "Não foi possível realizar esta operação.", "error");
    }

    // Envia o formulário
    $form.on("submit", function (ev) {
      ev.preventDefault();
      if (!enviando) {
        // Verifica se tem recaptcha e adiciona o token
        if (
          $form.hasClass("enable-recaptcha") &&
          typeof grecaptcha !== "undefined" &&
          typeof recaptchaKey !== "undefined"
        ) {
          recaptchaGenerateToken(
            $form,
            function () {
              sendingForm();
              const dados = new FormData($form[0]);
              $.ajax({
                url: url,
                type: type,
                data: dados,
                contentType: false,
                cache: false,
                processData: false,
              })
                .done(successForm)
                .fail(errorForm);
            },
            resetForm
          );
          return;
        }

        // Envio sem recaptcha
        sendingForm();
        const dados = new FormData($form[0]);
        $.ajax({
          url: url,
          type: type,
          data: dados,
          contentType: false,
          cache: false,
          processData: false,
        })
          .done(successForm)
          .fail(errorForm);
      }
    });
  });
})();

// ------------------------------------
// Recaptcha
// ------------------------------------

// Variáveis
const recaptchaKey = $("#infos").data("recaptchakey");

// Carrega o Recaptcha (Caso algum form seja encontrado)
if (
  $("form.enable-recaptcha").length > 0 &&
  typeof recaptchaKey !== "undefined"
) {
  $('form.enable-recaptcha [type="submit"]').each(function () {
    $(this).prop("disabled", true);
  });
  setTimeout(() => {
    loadScript(
      `https://www.google.com/recaptcha/api.js?render=${recaptchaKey}`,
      function () {
        $('form.enable-recaptcha [type="submit"]').each(function () {
          $(this).prop("disabled", false);
        });
      }
    );
  }, 1500);
}

// Gera token de envio do recaptcha
function recaptchaGenerateToken($form, cbSuccess, cbFail = false) {
  if ($form.length === 0) {
    return false;
  }
  grecaptcha.ready(function () {
    grecaptcha
      .execute(recaptchaKey, { action: "submit" })
      .then(function (token) {
        if (token) {
          if (!$form.find('input[name="g-recaptcha-response"]').length) {
            $form.append(
              `<input type="hidden" name="g-recaptcha-response" value="${token}">`
            );
            $form.append(
              `<input type="hidden" name="enable-recaptcha" value="1">`
            );
          } else {
            $form.find('input[name="g-recaptcha-response"]').val(token);
            $form.find('input[name="enable-recaptcha"]').val(1);
          }
          cbSuccess();
        } else {
          console.log("Não foi possível gerar o token do recaptcha.", token);
          if (cbFail !== false) {
            cbFail();
          }
        }
      });
  });
}
