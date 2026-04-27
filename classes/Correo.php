<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Correo
{
    public $email;
    public $email_alt; // Nueva propiedad
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token, $email_alt = '') // Agregamos parámetro opcional
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
        $this->email_alt = $email_alt;
    }

    private function configurarMailer()
    {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];
        $mail->SMTPSecure = 'tls';
        $mail->setFrom($_ENV['EMAIL_USER'], 'CRECE');
        $mail->CharSet = 'UTF-8';
        $mail->isHTML(TRUE);
        $mail->SMTPDebug = 2;
        $mail->Debugoutput = 'html';

        // Enviamos al principal
        $mail->addAddress($this->email, $this->nombre);

        // Enviamos al alternativo si existe
        if (!empty($this->email_alt)) {
            $mail->addAddress($this->email_alt, $this->nombre);
        }

        return $mail;
    }

    public function enviarConfirmacion()
    {
        $mail = $this->configurarMailer();
        $mail->Subject = 'Confirmación de registro - acción requerida';
        $contenido = "<html>";
        $contenido .= "<p>Estimado/a <strong>" . $this->nombre . "</strong>:</p>";
        $contenido .= "<p>Gracias por registrarse. Para confirmar su correo electrónico y finalizar el proceso, le solicitamos ingresar al enlace de confirmación siguiente:</p>";
        $contenido .= "<p><a href=" . $_ENV['PROJECT_URL'] . "/confirmar-cuenta?token=" . $this->token . ">Confirmar Cuenta</a></p>";
        $contenido .= "<p>Es importante considerar que cuenta con un plazo máximo de <strong>48 horas</strong> para realizar esta confirmación. Una vez transcurrido ese tiempo, los datos proporcionados serán eliminados automáticamente por motivos de seguridad.</p>";
        $contenido .= "<p>Si desea participar y el plazo ha vencido, será necesario iniciar nuevamente el proceso de registro en el siguiente enlace: <a href=" . $_ENV['PROJECT_URL'] . "/crear-cuenta>Crear cuenta</a>.</p>";
        $contenido .= "<p>Para cualquier duda o inconveniente, puede ponerse en contacto con nosotros.</p>";
        $contenido .= "<p>Saludos cordiales,</p>";
        $contenido .= "</html>";
        $mail->Body = $contenido;
        $mail->send();
        if (!$mail->send()) {
            error_log($mail->ErrorInfo);
        }
    }

    public function enviarInstrucciones()
    {
        $mail = $this->configurarMailer();
        $mail->Subject = 'Reestablecer contraseña';
        $contenido = "<html>";
        $contenido .= "<p>Estimado/a <strong>" . $this->nombre . "</strong>:</p>";
        $contenido .= "<p>Hemos recibido una solicitud para recuperar el acceso a tu cuenta. Para reestablecer tu contraseña, te pedimos ingresar al siguiente enlace:</p>";
        $contenido .= "<p><a href=" . $_ENV['PROJECT_URL'] . "/recuperar?token=" . $this->token . ">Reestablecer contraseña</a></p>";
        $contenido .= "<p>Por motivos de seguridad, este enlace estará disponible únicamente durante las próximas <strong>48 horas</strong>. Una vez transcurrido ese tiempo, el enlace se desactivará automáticamente y será necesario generar una nueva solicitud.</p>";
        $contenido .= "<p>Si usted no realizó esta solicitud o presenta algún inconveniente, ponte en contacto con nosotros.</p>";
        $contenido .= "<p>Saludos cordiales,</p>";
        $contenido .= "</html>";
        $mail->Body = $contenido;
        $mail->send();
        if (!$mail->send()) {
            error_log($mail->ErrorInfo);
        }
    }
}
