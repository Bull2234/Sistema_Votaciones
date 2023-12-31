<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

require_once('conexion_be.php');

if (isset($_POST['correo'])) {
    $email = $_POST['correo'];

    // Validar el campo 'email'
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'El correo electrónico no es válido';
        exit;
    }

    $query = "SELECT * FROM administrador where correo = '$email'";
    $result = $conexion->query($query);
    $row = $result->fetch_assoc();

    if ($result->num_rows > 0) {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp-mail.outlook.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'eDemocracia_notificaciones@outlook.com';
            $mail->Password   = 'edemocracia12';
            $mail->Port       = 587;

            $mail->setFrom('eDemocracia_notificaciones@outlook.com', 'eDemocracia [recuperación contraseña]');
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->addAddress('lenkev01@gmail.com', 'mikosexual');
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8'; // Establecer codificación de caracteres
            $mail->Subject = 'Recuperación de contraseña';
            $mail->Body    = 'Hola , este es un correo generado para solicitar tu recuperación de contraseña, por favor, visita la página de <a href="localhost/eDemocracia_src/html/cambiar_contrasena.php?identificacion='.$row['identificacion'].'">Recuperación de contraseña</a>';

            $mail->send();
            header("Location: ../html/olvide_contrasena.html");
        } catch (Exception $e) {
            header("Location: ../html/olvide_contrasena.php?message=error");
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        ?>

        <html>
        <head>
            <title>Formulario de inicio de sesión</title>
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
                @import url('https://fonts.googleapis.com/css2?family=Darumadrop+One&display=swap');
                @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');
    
                * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                    font-family: 'Poppins', sans-serif;
                    background-color: #0C8CE9;
                    color: #E0E0E0;
                }
    
                .main_login {
                    text-align: center;
                    align-items: center;
                    padding: 170px;
                }
    
                button {
                    color: #7EE687;
                    display: inline-block;
                    border-radius: 3px;
                    background-color: #7EE687;
                    border: none;
                    color: #FFFFFF;
                    text-align: center;
                    font-size: 15px;
                    padding: 10px;
                    width: 380px;
                    cursor: pointer;
                    margin: 0.4px;
                }
    
                .main_left {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                }
            </style>
        </head>
        <body>
            <div class="main_left">
                <div class="main_login">
                    <h1>El correo no se encuentra asociado a una cuenta existente </h1>
                    <br>
                    <p>[error]</p>
                    <br>
                    <div class="botoncentro">
                        <button onclick="window.location.href='../html/olvide_contrasena.html'">Regresar</button>
                    </div>
                </div>
            </div>
        </body>
        </html>
    
        <?php
    }
} else {
    header("Location: ../html/olvide_contrasena.php?message=not_found");
    echo 'El campo de correo electrónico no fue enviado';
}
?>