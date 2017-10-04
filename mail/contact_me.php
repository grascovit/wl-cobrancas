<?php
    // Check for empty fields
    if (empty($_POST['name']) || empty($_POST['email']) ||
        empty($_POST['phone']) || empty($_POST['message']) || 
        !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    return false;
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Create the email and send the message
    $to = 'contato@wlcobrancas.com.br';
    $email_subject = "Contato WL Cobranças: $name";
    $email_body = "Email enviado através do site da WL Cobranças:\n\nNome: $name\nEmail: $email\nTelefone: $phone\nMensagem:\n$message";
    $headers = "Content-Type: text/plain; charset=UTF-8\n";
    $headers .= "From: $email\n";
    $headers .= "Reply-To: $email";

    mail($to, '=?utf-8?B?'.base64_encode($email_subject).'?=', $email_body, $headers);
    return true;
?>