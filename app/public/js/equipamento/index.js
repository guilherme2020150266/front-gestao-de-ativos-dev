$(document).ready(function() {
    $('#btn-aguarde-equipamento').hide();
    $('button[name="add-tipo-equipamento"]').on('click', function(e) {
        $('#btn-salvar-equipamento').hide();
        $('#btn-aguarde-equipamento').show();
        var tipoEquipamento = $('#novo-tipo-equipamento').val();

        $.ajax({
            type: "POST",
            url: "/api/tipo_equipamento",
            data: {'nome':tipoEquipamento},
            dataType: "JSON",
            success: function (response) {
                $('#lista-tipo-equipamentos').append(
                    " <form action='/equipamentos' class='mt-3' method='GET'>" +
                        "<button class='btn text-dark border-dark mr-3 text-uppercase' type='submit' name='tipo_equipamento' value='" + response.data.id + "'>" + response.data.nome + "</button>" +   
                    "</form>");
                $('#tipo-equipamento-modal').modal('hide');
                $('#btn-salvar-equipamento').show();
                $('#btn-aguarde-equipamento').hide();
                $('#form-equipamento').each(function() {
                    this.reset();
                })
            }
        });
    });


    var equipamentoId;

    $('.btn-equipamento').on('click', function() {
        equipamentoId = $(this).data('id');
    })

    $('#deletar-solicitacao').on('click', function() {
        $.ajax({
            type: "POST",
            url: "/cancelar_solicitacao",
            data: {'equipamento_id':equipamentoId},
            dataType: "JSON",
            success: function (response) {
                // table td
                $('#colunas .status-' + equipamentoId).html("disponivel")
                $('#colunas .status-' + equipamentoId).removeClass("text-danger")
                $('#colunas .status-' + equipamentoId).addClass("text-success")
                // button
                $('#colunas .button-' + equipamentoId).removeClass("btn-secondary")
                $('#colunas .button-' + equipamentoId).addClass("btn-success")
                $('#colunas .button-' + equipamentoId).attr("data-target", "#solicitar-equipamento")
                $('#cancelar-solicitacao').modal('hide');
            }
        });
    })

    $('button[name="btn-solicitar-equipamento"]').on('click', function(e) {
        var funcionarioId = $('#select-solicitar-equipamento').val();
        
        $.ajax({
            type: "POST",
            url: "/solicitar",
            data: {'equipamento_id':equipamentoId, 'funcionario_id':funcionarioId},
            dataType: "JSON",
            success: function (response) {
                $('#colunas .status-' + equipamentoId).html("indisponivel")
                $('#colunas .status-' + equipamentoId).removeClass("text-success")
                $('#colunas .status-' + equipamentoId).addClass("text-danger")
                $('#colunas .button-' + equipamentoId).removeClass("btn-success")
                $('#colunas .button-' + equipamentoId).addClass("btn-secondary")
                $('#colunas .button-' + equipamentoId).attr("data-target", "#cancelar-solicitacao")
                $('#solicitar-equipamento').modal('hide');
                console.log(response);
            }
        });
    });

});