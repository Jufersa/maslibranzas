<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['email'])){

  $pagaduria = $_POST["pagaduria"];
  $name = $_POST["name"];
  $lastName = $_POST["lastName"];
  $typeDocument = $_POST["typeDocument"];
  $numDoc = $_POST["numDoc"];
  $codigo = $_POST["codigo"];
  $phone = $_POST["phone"];
  $email = $_POST["email"];
  $robot = $_POST["robot"];

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';



//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host = 'mail.coservintegral.com'; // Cambia esto con la configuración de tu servidor SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'info@coservintegral.com'; // Cambia esto con tu correo electrónico
    $mail->Password = 'h!vt7GB1xS'; // Cambia esto con tu contraseña de correo electrónico                               //SMTP password
    $mail->SMTPSecure = 'ssl';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('info@coservintegral.com', 'Formulario web por: '.$name);
    $mail->addAddress('info@coservintegral.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $name;
    $mail->Body    = "
    <html>
    <head>
      <style>
      body {
        font-family: Arial, Helvetica, sans-serif;
        }
      table {
        font-size: 12px;    
        margin: 45px;     
        width: 600px; 
        text-align: left;    
        border-collapse: collapse; 
      }    
      th {     
        font-size: 13px;     
        font-weight: normal;     
        padding: 15px;     
        background: #0591c7;
        border-top: 4px solid #0591c7;    
        border-bottom: 1px solid #0591c7; 
        color: #039; 
      }
    
      td {    
        font-size: 15px; 
        padding: 15px;     
        background: #fff;     
        border-bottom: 1px solid #fff;
        color: #000; 
        font-weight: bold;   
        border-top: 1px solid transparent; }
    
      tr:hover td{ 
        background: #d0dafd; 
        color: #339; 
      }

      a:hover td{ 
        background: #d0dafd; 
        color: #339; 
      }
      
      </style>
    </head>
    <body>

    <div>
        <div>
          <span><h2 style='color: #1c3b92'><strong>Maslibranzas,</strong></h2></span>

          <p>Ha recibido un mensaje generado y enviado mediante el formulario en la pagina web www.maslibranzas.com con la siguiente Informacion:</p>
          <table>                      
            <tbody style='width: 100%;'> 
                       
              <tr>
                <td style='width: 20%;'><strong>Nombre:</strong></td>
                <td style='width: 80%;'>{$name} {$lastName}</td>
              </tr>              
              <tr>
                <td style='width: 30%;'><strong>Tipo Documento:</strong></td>
                <td style='width: 70%;'>{$typeDocument}</td>
              </tr><tr>
                <td style='width: 20%;'><strong>No. Documento:</strong></td>
                <td style='width: 80%;'>{$numDoc}</td>
              </tr>
              <tr>
                <td style='width: 20%;'><strong>Pagaduria:</strong></td>
                <td style='width: 80%;'>{$pagaduria}</td>
              </tr>
              <tr>
                <td style='width: 20%;'><strong>Telefono:</strong></td>
                <td style='width: 80%;'><a href='https://api.whatsapp.com/send?phone={$codigo}{$phone}' target='_blank'>{$codigo}{$phone}</a></td>
              </tr>
              <tr>
                <td style='width: 20%;'><strong>Mensaje:</strong></td>
                <td style='width: 80%;'>{$email}</td>
              </tr>
            </tbody>
          </table>
        </div>
    </div>
    </body>
    <html>
    ";
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

//    $mail->send();
//    echo 'Message has been sent';
//} catch (Exception $e) {
//    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
//}

    
    if (empty($robot)) {
      $mail->send();
      header('Location:mensaje-de-envio.html');
    }    
         
    } catch (Exception $e) {
        echo 'No se pudo enviar el correo: ', $mail->ErrorInfo;
    }}
    else
    {
    	echo "mensaje no enviado";
    }

    ?>
