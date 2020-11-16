<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Server/app/PHPMailer/Exception.php';
require 'Server/app/PHPMailer/PHPMailer.php';
require 'Server/app/PHPMailer/SMTP.php';

class SendMails
{
    private $Error;
    private $Type;
    function getErrorMail()
    {
        return $this->Error;
    }

    function setErrorMail($err)
    {
        $this->Error = $err;
    }

    function getTypeMail()
    {
        return $this->Type;
    }

    function setTypeMail($type)
    {
        $this->Type = $type;
    }


    public function send_new_password ($user_mail,$new_password){
        $mail = new PHPMailer(true);
        try {
            
            $app_mail = "ivansopena.garbajosa@gmail.com";
            //Server settings 
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = $app_mail;
            $mail->Password   = $GLOBALS['security']-> decrypt("T1JjTkR3a2FGUWtCRWdCWFZnPT0=",$app_mail);                               
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
            $mail->Port       = 587;                   

            //Recipients
            $mail->setFrom("notreply@streammovies.com",'notreply@streammovies.com'); // origen $app_mail, 
            $mail->addAddress($user_mail);     // destino Add a recipient
    
            // Content
            $mail->isHTML(true);                                  
            $mail->Subject = "Don't Reply StreaminMovies Team";
            $mail->Body    = 'Estimado usuario su nueva CONTRASEÑA es :Temporal1';
        
            $mail->send();
            
            $this->setErrorMail("Su nueva contraseña esta en camino, revise su correo");
            $this->setTypeMail("info");
        } catch (Exception $e) {
            $this->setErrorMail("Error al generar su nueva contraseña, pongase en contacto con nuestro servicio tecnico en el telefono 900123456");
            $this->setTypeMail("error");
        }
    }



}