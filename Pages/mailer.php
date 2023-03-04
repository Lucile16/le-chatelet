<?php

use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';

$code = rand(100000, 999999);

try {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'lulubeucher@gmail.com';
    $mail->Password = 'jhzizmnbkofesmhx';
    $mail->Port = 587;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->smtp_tls_security_level = 'tls';

    $mail->setFrom('lulubeucher@gmail.com', 'Lucile BEUCHER');
    $mail->addAddress('lulubeucher@orange.fr', 'Moi');
    $mail->Subject = 'Votre code de validation';
    $mail->Body = 'Votre code de validation est : ' . $code;

    // if ($mail->send()) {
    //     echo '<div class="container"><div class="alert alert-success d-flex align-items-center" role="alert">
    //     Un e-mail vient de vous être envoyé !
    //     </div></div>';
    // }
} catch (Exception $e) {
    echo '<div class="container"><div class="alert alert-danger d-flex align-items-center" role="alert">
    Une erreur est survenue lors de l\'envoi du mail !
    </div></div>';
}

if ($mail->send()) {
    // Connecté, redirection vers la page où rentrer le code
    header('Location: http://localhost/le-chatelet/index.php?page=5');
    exit();
}

?>