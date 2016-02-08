<?php defined('BASEPATH') OR exit('No direct script access allowed');

switch ($screen)
{
    case 'login':
        echo '<h1>Tela de Login</h1>';
        break;
    default:
        echo '<h1>Página não encontrada.</h1>';
        break;
}