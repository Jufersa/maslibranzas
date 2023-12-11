<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['email'])) {
    $pagaduria = $_POST["pagaduria"];
    $name = $_POST["name"];
    $lastName = $_POST["lastName"];
    $typeDocument = $_POST["typeDocument"];
    $numDoc = $_POST["numDoc"];
    $codigo = $_POST["codigo"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $checkDefault = $_POST["checkDefault"];

    // Configurar PHPMailer
    $mail = new PHPMailer;

    $mail->isSMTP();
    $mail->Host = 'mail.coservintegral.com'; // Cambia esto con la configuración de tu servidor SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'info@coservintegral.com'; // Cambia esto con tu correo electrónico
    $mail->Password = 'h!vt7GB1xS'; // Cambia esto con tu contraseña de correo electrónico
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('info@coservintegral.com', 'Pagina Web');
    $mail->addAddress('info@coservintegral.com', 'Pagina Web');

    $mail->isHTML(true);

    $mail->Subject = 'Nuevo formulario de vinculación';
    $mail->Body    = "
      <p>Pagaduria: $pagaduria</p>
      <p>Nombre: $name</p>
      <p>Apellido: $lastName</p>
      <p>$typeDocument: $numDoc</p>
      <p>Telefono: $codigo $phone</p>
      <p>Correo: $email</p> 
    ";

    if (!$mail->send()) {
        echo 'Error al enviar el correo electrónico: ' . $mail->ErrorInfo;
    } else {
        echo 'Correo electrónico enviado con éxito';
    }
}
?>
