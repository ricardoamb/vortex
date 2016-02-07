<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Função para carregamento do modulo do sistema devolvendo a tela solicitada.
function load_module($module=null,$screen=null,$folder='template')
{
    $ci =& get_instance();
    if($module=!null)
    {
        return $ci->load->view("$folder/$module",array('screen'=>$screen),true);
    }
}