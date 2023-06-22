

$(document).ready(function() {
    $('#cpf').on('blur', function() {
        var cpf = $(this).val();

        // Requisição AJAX para buscar os dados do paciente
        $.ajax({
            url: 'http://localhost/welfare/agenda/buscauser.php',
            type: 'POST',
            dataType: 'json',
            data: { cpf: cpf },
            success: function(data) {
                if (data) {
                    // Atualiza os inputs com os dados do paciente
                    $('#nome').val(data.nome_paciente);
                    $('#contato').val(data.contato_paciente);
                    $('#email').val(data.email);
                } else {
                    // Limpa os inputs caso o paciente não seja encontrado
                    $('#nome').val('');
                    $('#contato').val('');
                    $('#email').val('');
                }
            },
            error: function() {
                console.log('Erro na requisição AJAX');
            }
        });
    });
});





