<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // Carrega o modulo de login
        $this->load->view('dashboard/dashboard_view');
    }

}
