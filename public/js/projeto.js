function deleteRegistroPaginacao(rotaUrl, idRegistro) {
  if (confirm("Deseja confirmar a exclusão ?")) {
    //clique OK
    $.ajax({
      url: rotaUrl,
      method: "Delete",
      headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
      data: {
        id: idRegistro,
      },
      beforeSend() {
        $.blockUI({
          message: "Carregando...",
          timeout: 2000,
        });
      },
    })
      .done((data) => {
        $.unblockUI();
        if (data.sucess == true) {
          window.location.reload();
        } else {
          alert("Não foi possível excluir");
        }
      })
      .fail((data) => {
        $.unblockUI();
        alert("Não foi possível buscar os dados");
      });
  }
}

$("#mascara_valor").mask("#.##,00", { reverse: true });

$("#cep").blur(function () {
  var cep = $(this).val().replace(/\D/g, "");
  if (cep != "") {
    var validacep = /^[0-9]{8}$/;
    if (validacep.test(cep)) {
      $("#logradouro").val(" ");
      $("#bairro").val(" ");
      $("#endereco").val(" ");
      $.getJSON(
        "https://viacep.com.br/ws/" + cep + "/json/?callback=?",
        function (dados) {
          if (!("erro" in dados)) {
            $("#logradouro").val(dados.logradouro.toUpperCase());
            $("#bairro").val(dados.bairro.toUpperCase());
            $("#endereco").val(dados.localidade.toUpperCase());
          } else {
            alert(
              "CEP não encontrado de forma automatizado digite manualmente ou tente novamente."
            );
          }
        }
      );
    }
  }
});
