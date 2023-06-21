document.addEventListener('DOMContentLoaded', function() {
    let selectespecialidade = document.getElementById('especialidade');
    
    selectespecialidade.onchange = () => {
        let selectmedico = document.getElementById('selectmedico');
        let valor = selectespecialidade.value;
        fetch("http://localhost/welfare1.1/agenda/buscaoption.php?especialidade=" + valor)
            .then(response => {
                return response.text();
            })
            .then(content => {
                selectmedico.innerHTML = content;
            });
    }
});


$(document).ready(function() {
    $('#cpf').on('blur', function() {
        var cpf = $(this).val();

        // Requisição AJAX para buscar os dados do paciente
        $.ajax({
            url: 'http://localhost/welfare1.1/agenda/buscauser.php',
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





