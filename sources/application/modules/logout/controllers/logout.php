<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Logout extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        initialize();
    }

    public function index()
    {
        $this->session->unset_userdata(array(
            'user_id'     => '',
            'user_name'   => '',
            'user_login'  => '',
            'user_email'  => '',
            'user_admin'  => '',
            'user_status' => ''
        ));
        $this->session->sess_destroy();
        redirect(base_url());
    }

}