<?php defined('BASEPATH') OR exit('No direct script access allowed');

switch ($screen)
{
    case 'login':
        echo 'Tela de Login';
        break;
    default:
        echo '<h1>Página não encontrada.</h1>';
        break;
}