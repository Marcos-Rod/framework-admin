<?php

namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class MailController{
    protected $mail;
    public $destinatario;
    public $body;
    protected $smtp_port = SMTP_PORT;
        
    public function __construct()
    {
        $this->mail = new PHPMailer();
    }

    public function sendMail($datos){
        /* $this->mail->SMTPDebug = SMTP::DEBUG_SERVER; */                         // Mostrar salida (Desactivar en producción)
        $this->mail->isSMTP();                                               // Activar envio SMTP
        $this->mail->Host = SMTP_HOTS;                     // Servidor SMTP
        $this->mail->SMTPAuth = true;                                       // Identificacion SMTP
        $this->mail->Username = SMTP_USERNAME;                  // Usuario SMTP
        $this->mail->Password = SMTP_PASSWORD;              // Contraseña SMTP
        $this->mail->SMTPSecure = SMTP_SECURE;
        $this->mail->Port  = $this->smtp_port;
        $this->mail->setFrom($datos['mail'], mb_convert_encoding($datos['name'], 'UTF-8'));
        $this->mail->addAddress($this->destinatario, 'Destinatario');

        $this->mail->isHTML(true);
        $this->mail->Subject = mb_convert_encoding($datos['subject'], 'UTF-8');
        $this->mail->Body  = $this->body;
        $this->mail->AltBody = 'Los datos que dejó fueron los siguientes. Nombre: ' . $datos['name'] . ', Correo: ' . $datos['mail'];

        if (!$this->mail->send())
            return false;

        return true;
    }
}