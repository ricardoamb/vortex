<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Vortex {

    protected $vtx;
    public $theme = array();

    public function __construct()
    {
        $this->vtx =& get_instance();
        $this->vtx->load->helper('functions');
    }

    public function send_mail($to, $subject, $message, $format='html')
    {
        $this->vtx->load->library('email');
        $config['mailtype'] = $format;
        $this->vtx->email->initialize($config);
        $this->vtx->email->from('adm@vortex.com','Administração Vortex');
        $this->vtx->email->to($to);
        $this->vtx->email->subject($subject);
        $this->vtx->email->message($message);
        if($this->vtx->email->send())
        {
            return true;
        }
        else
        {
            return $this->vtx->email->print_debugger();
        }
    }

}
