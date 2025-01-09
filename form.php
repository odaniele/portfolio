<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    $nome = htmlspecialchars(trim($_POST['nome']));
    $email = htmlspecialchars(trim($_POST['email']));
    $telefone = htmlspecialchars(trim($_POST['telefone']));

    
    if (empty($nome) || empty($email) || empty($telefone)) {
        echo "Por favor, preencha todos os campos.";
        exit;
    }

    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Por favor, insira um e-mail válido.";
        exit;
    }

    
    $para = "danniele.oliveiras@gmail.com"; 
    $assunto = "Contato Cliente - Portfólio";
    $corpo = "Nome: $nome\nE-mail: $email\nTelefone: $telefone";

    $cabeca = "From: danniele.oliveiras@gmail.com\r\n";
    $cabeca .= "Reply-To: $email\r\n";
    $cabeca .= "Content-Type: text/plain; charset=UTF-8\r\n";


    if (mail($para, $assunto, $corpo, $cabeca)) {
        echo "E-mail enviado com sucesso!";
    } else {
        echo "Houve um erro ao enviar o e-mail. Por favor, tente novamente.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>
