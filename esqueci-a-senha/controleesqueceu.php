<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../mail_lib/vendor/autoload.php';
    require '../conexao.php';

    function gerarToken($tamanho = 6) {
        $bytes = random_bytes($tamanho);
        return bin2hex($bytes);
    }
    
    // Exemplo de uso
    $token = gerarToken();
    
    
    try{
        $email = $_POST['email_funcionario'];

         // Consulta o banco de dados para obter o nome e a foto do funcionário com base no email
        $query = "SELECT * FROM funcionario WHERE email_funcionario = :email";
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

    
        $dados_funcionario = $stmt->fetch(PDO::FETCH_ASSOC);
        $address = $dados_funcionario["email_funcionario"];

        if(!empty($email) && !empty($address)){

                $link = 'http://localhost/welfare/esqueci-a-senha/redefinir.php?token='.$token.'&id='.$dados_funcionario['id_funcionario'];
                $phpmailer = new PHPMailer(TRUE);
            
                // Configuração
                $phpmailer->isSMTP();
                $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
                $phpmailer->SMTPAuth = true;
                $phpmailer->Port = 2525;
                $phpmailer->Username = 'ab915ed4bf7e52';
                $phpmailer->Password = '91f9e259052fed';
                $phpmailer->CharSet = 'UTF-8';
            
                //Recebedor
                $phpmailer->setFrom('tccwelfare1.1@gmail.com', 'Welfare Admin');
                $phpmailer->addAddress("$email");  
                
                //Conteudo
                $phpmailer->isHTML(true);                                  
                $phpmailer->Subject = 'Redefinição de senha';
                $phpmailer->Body    = "Você solicitou a redefinição de senha, para redifinir sua senha <b><a href='".$link."'>clique aqui<a></b>.
                <br>Caso não tenha solicitado a redefinição de senha ignore este e-mail.";
                
                $phpmailer->send();
            
                echo'<script>
                        alert("Email foi enviado com sucesso, verifique sua caixa de entrada ou sua caixa de spam!");
            
                        setTimeout( ()=>{
                            window.location.href= "http://localhost/welfare/index.php";
                        }, 1000);
                </script>';

        }else{
            echo'<script>
                    alert("Email não encontrado");
        
                    setTimeout( ()=>{
                        window.location.href= "http://localhost/welfare/esqueci-a-senha/esqueci.php";
                    }, 1000);
            </script>';
        }

    }catch(Exception){
        echo'<script>
                    alert("Email não encontrado");

                    setTimeout( ()=>{
                        window.location.href= "http://localhost/welfare/esqueci-a-senha/esqueci.php";
                    }, 1000);
            </script>';
    }


    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\SMTP;
    // use PHPMailer\PHPMailer\Exception;

    // require '../mail_lib/vendor/autoload.php';

    // $email = $_POST['email_funcionario'];
    // $phpmailer = new PHPMailer(true);

    // try{
    //     $phpmailer->isSMTP();
    //     $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
    //     $phpmailer->SMTPAuth = true;
    //     $phpmailer->Port = 2525;
    //     $phpmailer->Username = 'ab915ed4bf7e52';
    //     $phpmailer->Password = '91f9e259052fed';
    //     $phpmailer->CharSet = 'UTF-8';
    //     //Recipients
    //     $phpmailer->setFrom('tccwelfare1.1@gmail.com', 'Welfare Admin');
    //     $phpmailer->addAddress($email);               

    //     //Content
    //     $phpmailer->isHTML(true);                                  
    //     $phpmailer->Subject = 'Redefinição de senha';

    //     $phpmailer->Body    = "Você solicitou a redefinição de senha, o código para seguir e redefinir a senha é: <b>A1B2C3</b>.
    //     <br>Caso não tenha solicitado a redefinição de senha ignore este e-mail.";
        
    //     $phpmailer->send();
    //     echo '
    //     <script>
    //         alert("Email foi enviado com sucesso, verifique sua caixa de entrada ou sua caixa de spam!");

    //         setTimeout( ()=>{
    //             window.location.href= "http://localhost/welfare/esqueci-a-senha/redefinir.php";
    //         }, 1000);
    //     </script>';
        
    // }catch(Exception $e){
    //     echo'Email não enviado. Erro PHPMAILER: {$mail-ErrorInfo}';
    // }




    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\SMTP;
    // use PHPMailer\PHPMailer\Exception;

    // require '../mail_lib/vendor/autoload.php';
    // require '../conexao.php';

    // $email = $_POST['email_funcionario'];

    //  // Consulta o banco de dados para obter o nome e a foto do funcionário com base no email
    // $query = "SELECT * FROM funcionario WHERE email_funcionario = :email";
    // $stmt = $conexao->prepare($query);
    // $stmt->bindValue(':email', $email);
    // $stmt->execute();

    // $dados_funcionario = $stmt->fetch(PDO::FETCH_ASSOC);
    // $address = $dados_funcionario["email_funcionario"];
    
    // try{
    
    // $phpmailer = new PHPMailer(true);

    // // Configuração
    // $phpmailer->isSMTP();
    // $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
    // $phpmailer->SMTPAuth = true;
    // $phpmailer->Port = 2525;
    // $phpmailer->Username = 'ab915ed4bf7e52';
    // $phpmailer->Password = '91f9e259052fed';
    // $phpmailer->CharSet = 'UTF-8';

    // //Recebedor
    // $phpmailer->setFrom('tccwelfare1.1@gmail.com', 'Welfare Admin');
    // $phpmailer->addAddress("$address");               
    
    // //Conteudo
    // $phpmailer->isHTML(true);                                  
    // $phpmailer->Subject = 'Redefinição de senha';
    // $phpmailer->Body    = "Você solicitou a redefinição de senha, o código para seguir e redefinir a senha é: <b>A1B2C3</b>.
    // <br>Caso não tenha solicitado a redefinição de senha ignore este e-mail.";
    
    // $phpmailer->send();

    // echo '
    // <script>
    //     alert("Email foi enviado com sucesso, verifique sua caixa de entrada ou sua caixa de spam!");

    //     setTimeout( ()=>{
    //         window.location.href= "http://localhost/welfare/esqueci-a-senha/redefinir.php";
    //     }, 1000);
    // </>';

    // }catch(Exception $e){
    //     echo'erro';
    // }
?>

