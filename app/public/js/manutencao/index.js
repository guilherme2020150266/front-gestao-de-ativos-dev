$(document).ready(function() {
    $('#btn-aguarde').hide();
    $('#sucess-manutencao').hide();
    $('#error-manutencao').hide();
    $('#btn-salvar').on('click', function(e) {
        $('#btn-aguarde').show();
        $('#btn-salvar').hide();
        const patrimonio = $('#valor-patrimonio').val();
        const matricula = $('#matricula-funcionario').val();
        const nomeTecnico = $('#nome-tecnico').val();

        $.ajax({
            type: "POST",
            url: "/manutencao",
            data: {
                'patrimonio':patrimonio,
                'matricula':matricula,
                'tecnicoNome':nomeTecnico
            },
            dataType: "JSON",
            success: function (response) {
                if(response.data === 'error') {
                    $('#nova-manutencao').modal('hide');
                    $('#btn-aguarde').hide();
                    $('#btn-salvar').show();
                    $('#error-manutencao').show();
                    return
                }

                $('#nova-manutencao').modal('hide');
                $('#btn-aguarde').hide();
                $('#btn-salvar').show();
                $('#form-manu').each(function() {
                    this.reset();
                })
                /* setTimeout(function() {
                    $('#sucess-manutencao').show();
                }, 40000); */
                $('#sucess-manutencao').show();
            }
        });
    });

});