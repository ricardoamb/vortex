<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Vortex {

    protected $ci;
    public $theme = array();

    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->helper('functions');
    }

}
