/* =================== COMPLETA ENDEREÇO =================== */
$(function () {
  $(".cep_completa").on("change", function () {
    var input = $(this);
    var cep = $(this).val();
    var url = $(this).data("url");
    var loading = input.prev(".campo-loading");

    $.ajax({
      url: url,
      type: "POST",
      data: {
        cep: cep,
      },
      beforeSend: function () {
        loading.fadeIn();
        input.prop("disabled", true);
      },
      success: function (data) {
        console.log(data);
        loading.fadeOut();
        input.prop("disabled", false);
        try {
          var endereco = JSON.parse(data);

          $("#logradouro").val(endereco.logradouro);
          $("#bairro").val(endereco.bairro);
          $("#cidade").val(endereco.cidade);
          $("#estado").val(endereco.uf);
          $("#numero").focus();

          $("#logradouro").parsley().validate();
          $("#bairro").parsley().validate();
          $("#cidade").parsley().validate();
          $("#estado").parsley().validate();
        } catch (e) {
          return false;
        }
      },
      error: function (xhr, type, exception) {
        loading.fadeOut();
        input.prop("disabled", false);
        console.log("ajax error response type " + type);
      },
    });
  });
});
