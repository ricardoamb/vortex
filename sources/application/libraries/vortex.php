<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Vortex {

    protected $vtx;
    public $theme = array();

    public function __construct()
    {
        $this->vtx =& get_instance();
        $this->vtx->load->helper('functions');
        $this->vtx->load->library('MY_Phpmailer');
    }

    public function send_mail($to, $subject, $message)
    {

        $mail = new PHPMailer();

        $mail->isSMTP();
        $mail->SMTPAuth = true;

        $mail->Host = 'mail.sentapuadesign.com';
        $mail->Username = 'ricardo@sentapuadesign.com';
        $mail->Password = 'mR@06102013';
        $mail->setFrom('ricardo@sentapuadesign.com','Ricardo Amb');
        $mail->Port = 587;

        $mail->Subject = $subject;
        $mail->msgHTML($message);

        $mail->AddAddress($to);

        if(!$mail->Send()) {
            return $mail->ErrorInfo;
        } else {
            return true;
        }
    }

}
