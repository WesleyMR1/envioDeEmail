<?php

    include('conexao.php');
    include('conexaoEmail.php');
    $pdo = conectar();

    if (isset($_POST['email'])) {
        $erro = [];

        
        $email = $_POST['email'];
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            array_push($erro, "email invalido!");
        }

        //verificar se email existe no banco
        $res = $pdo->prepare("select * from login where email = :email limit 1");
        $res->bindValue(':email', $email);
        $res->execute();
        $cadastroExistente = $res->fetch(PDO::FETCH_ASSOC);
        //se não existir retornar mensagem
        if (!isset($cadastroExistente['email'])) {
           echo "Não existe";
        }else{
            if (count($erro) == 0) {
                $novasenha = substr(md5(time()), 0, 8);
                $nscriptografada = password_hash($novasenha, PASSWORD_DEFAULT);
    
    
                if (
                    enviarEmail("testandoophpmaile@gmail.com", "Enviando novo email", "Sua senha foi alterada para: $novasenha")
                ) {
                    // $sql = "Update login set senha = '$nscriptografada' where email = '$email' ";
                    try {
                        $pdo->query("UPDATE login set senha = '$nscriptografada' where email ='$email' ");
                    } catch (Exception $e) {
                        echo $e->getMessage();
                    }
                    
                }
    
                
    
            }
        }

       

        


    }
    