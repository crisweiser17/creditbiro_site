<?php
ob_start(); // Buffer output

// Enable error logging to a file for debugging
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/php_errors.log');
ini_set('display_errors', 0); // Do not display errors to output (breaks JSON)
error_reporting(E_ALL);

header('Content-Type: text/html; charset=UTF-8');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Helper to handle redirection with status
function redirectWithStatus($status, $message = '') {
    // URL encode the message to pass it safely
    $message = urlencode($message);
    $url = "contato.php?status=$status&message=$message";
    
    // Clear any previous output
    ob_end_clean();
    header("Location: $url");
    exit;
}

// Check if composer dependencies are installed
if (!file_exists(__DIR__ . '/vendor/autoload.php')) {
    error_log("Vendor autoload not found!");
    redirectWithStatus('error', 'Dependências do servidor não encontradas.');
}

require __DIR__ . '/vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"] ?? ''));
    $email = filter_var(trim($_POST["email"] ?? ''), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["subject"] ?? ''));
    $message = trim($_POST["message"] ?? '');

    if (empty($name) || empty($message) || empty($subject) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        redirectWithStatus('error', 'Por favor, preencha todos os campos corretamente.');
    }

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.resend.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'resend';
        $mail->Password   = 're_UX9DgxwP_NXhUvgcqoSq7JVrogsZZRVxn';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->CharSet    = 'UTF-8';

        //Recipients
        $mail->setFrom('no-reply@app.creditbiro.com.br', 'CreditBiro Site Contact');
        $mail->addAddress('contato@creditbiro.com.br');     
        $mail->addAddress('cris.weiser@gmail.com'); // Adding user email as BCC/copy for testing reliability
        $mail->addReplyTo($email, $name);

        //Content
        $mail->isHTML(true);
        $mail->Subject = "Novo contato pelo site: $subject";
        $mail->Body    = "
            <h2>Novo contato recebido</h2>
            <p><strong>Nome:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Assunto:</strong> $subject</p>
            <p><strong>Mensagem:</strong></p>
            <p>" . nl2br(htmlspecialchars($message)) . "</p>
        ";
        $mail->AltBody = "Nome: $name\nEmail: $email\nAssunto: $subject\nMensagem:\n$message";

        $mail->send();
        
        redirectWithStatus('success', 'Sua mensagem foi enviada com sucesso! Entraremos em contato em breve.');
    } catch (Exception $e) {
        error_log("Mailer Error: {$mail->ErrorInfo}");
        redirectWithStatus('error', 'Houve um erro ao enviar sua mensagem. Tente novamente mais tarde.');
    }
} else {
    redirectWithStatus('error', 'Método de requisição inválido.');
}
