<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Vortex {

    protected $vtx;
    public $theme = array();

    public function __construct()
    {
        $this->vtx =& get_instance();
        $this->vtx->load->helper('functions');
    }

}
