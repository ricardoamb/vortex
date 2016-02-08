<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        initialize();
    }

    public function index()
    {
        set_theme('title','Login');
        set_theme('content', load_module('login','login'));
        set_theme('bodyClass','login bg-login printable');
        set_theme('pluginsJS',load_javascript(array('user-pages','initialize-login')),false);
        load_template();
    }

}
