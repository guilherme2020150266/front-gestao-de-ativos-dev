$(document).ready(function () {

    $(".mascara-cpf").mask("999.999.999-99");
    $(".mascara-rg").mask("99.999.999");
    $(".mascara-cnpj").mask("99.999.999/9999-99");
    $(".mascara-telefone").mask("(99) 99999-9999");
    $(".mascara-cep").mask("99.999-999");

    $('button[name="remove_levels"]').on('click', function(e) {
        var $form = $(this).closest('form');
        
        e.preventDefault();

        $('#confirm').modal({
            backdrop: 'static',
            keyboard: false
        }).on('click', '#delete', function(e) {
                $form.trigger('submit');
        });
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
});