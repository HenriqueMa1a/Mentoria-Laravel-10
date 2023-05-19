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
