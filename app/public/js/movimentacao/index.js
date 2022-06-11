$(document).ready(function() {
    
    $('button[name="add-tipo-equipamento"]').on('click', function(e) {
        var tipoEquipamento = $('#nova-movimentacao').val();

        $.ajax({
            type: "POST",
            url: "/api/nova-movimentacao",
            data: {'nome':tipoEquipamento},
            dataType: "JSON",
            success: function (response) {

                $('#lista-tipo-equipamentos').append(
                    " <form action='/equipamentos' class='mt-3' method='GET'>" +
                        "<button class='btn text-dark border-dark mr-3 text-uppercase' type='submit' name='tipo_equipamento' value='" + response.data.id + "'>" + response.data.nome + "</button>" +   
                    "</form>")
            }
        });
    });

});