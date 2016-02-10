<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        initialize();
    }

    public function index()
    {
        if(is_logged(false))
        {
            set_theme('title','Dashboard');
            set_theme('content', '<h1>Painel Principal</h1>');
            set_theme('pluginsJS',load_javascript(array('initialize')),false);
            load_template();
        }
        else
        {
            redirect('login');
        }
    }

}
