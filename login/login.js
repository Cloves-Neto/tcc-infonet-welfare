function logarjs(){

var dados = $('#login').serialize(); //serialize id do form
    
    $.ajax({
        method: 'GET',
        url: 'login.php',
        data: dados,

        beforeSend: function () {
            $("h2").html("Aguarde");
        }
    })
    
    .done(function (msg){
        
        $("#retorno").html(msg);
        
        if (msg == 1){

            window.open('../home/home_page.html');
        }
        else{
            alert("email ou senha incorreta");
            
        }
    })
    .fail(function (){
        alert("Algo deu errado, tente novamente");
    })

    return false;
}