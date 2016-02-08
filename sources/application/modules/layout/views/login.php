<?php defined('BASEPATH') OR exit('No direct script access allowed');

switch ($screen)
{
    case 'login':
        include('pages/login.php');
        break;
    default:
        echo '<h1>Página não encontrada.</h1>';
        break;
}