<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Call the module inside modules of the system
function load_module($module=null, $screen=null, $folder='layout')
{
    $vtx =& get_instance();
    if($module != null)
    {
        return $vtx->load->view("$folder/$module",array('screen'=>$screen),true);
    }else{
        return false;
    }
}

function set_theme($prop,$value,$replace=true)
{
    $vtx =& get_instance();
    $vtx->load->library('vortex');
    if($replace)
    {
        $vtx->vortex->theme[$prop] = $value;
    }
    else
    {
        if(!isset($vtx->vortex->theme[$prop])) $vtx->vortex->theme[$prop] = '';
        $vtx->vortex->theme[$prop] .= $value;
    }
}

// Return values on the theme array on vortex class
function get_theme()
{
    $vtx =& get_instance();
    $vtx->load->library('vortex');
    // Function return
    return $vtx->vortex->theme;
}
function initialize($instance='dashboard')
{
    $vtx =& get_instance();
    switch ($instance)
    {
        case 'dashboard':
            //
            // Init Dashboard
            //
            $vtx->load->library(array('vortex','session','form_validation','parser'));
            $vtx->load->helper(array('form','url','array','text'));
            // $vtx->load->model(array(''));
            set_theme('defaultTitle','Vortex');
            set_theme('defaultFooter','');
            set_theme('template','dashboard/dashboard');
            // Style
            set_theme('coreCSS',load_style(array('admin','elements')), false);
            set_theme('pluginsCSS',load_style(array('plugins')), false);
            // Javascript
            set_theme('modernizr',load_javascript(array('modernizr.min')), true);
            // Icons
            set_theme('favicon',load_icon());
            set_theme('apple-touch-icon',load_icon('apple-touch-icon','apple-touch-icon','png'));
            break;

        case 'frontend':
            //
            // Init FrontEnd
            //
            break;
        case 'system':
            //
            // Init Vortex System
            //
            break;
    }
}

// Load a template
function load_template()
{
    $vtx =& get_instance();
    $vtx->load->library('vortex');
    $vtx->parser->parse($vtx->vortex->theme['template'], get_theme());
}

function load_style($file=null,$folder='assets/css',$media='all')
{
    if($file!=null)
    {
        $vtx =& get_instance();
        $vtx->load->helper('url');
        $result = PHP_EOL;
        if(is_array($file))
        {
            foreach($file as $styleFile)
            {
                $result .= '<link rel="stylesheet" type="text/css" href="'.base_url("$folder/$styleFile.css").'" media="'.$media.'" />' . PHP_EOL;
            }
        }
        else
        {
            $result .= '<link rel="stylesheet" type="text/css" href="'.base_url("$folder/$file.css").'" media="'.$media.'" />' . PHP_EOL;
        }
    }
    return $result;
}

function load_javascript($file=null,$folder='assets/js',$remote=false)
{
    if($file!=null)
    {
        $vtx =& get_instance();
        $vtx->load->helper('url');
        $result = PHP_EOL;
        if(is_array($file))
        {
            foreach($file as $jsFile)
            {
                if($remote)
                {
                    $result .= '<script type="text/javascript" src="'.$jsFile.'" ></script>' . PHP_EOL;
                }
                else
                {
                    $result .= '<script type="text/javascript" src="'.base_url("$folder/$jsFile.js").'" ></script>' . PHP_EOL;
                }
            }
        }
        else
        {
            if($remote)
            {
                $result .= '<script type="text/javascript" src="'.$file.'" ></script>' . PHP_EOL;
            }
            else
            {
                $result .= '<script type="text/javascript" src="'.base_url("$folder/$file.js").'" ></script>' . PHP_EOL;
            }
        }
    }
    return $result;
}

function load_icon($rel='shortcut icon',$file='favicon',$extension='ico',$folder='assets/img/icons')
{
    return '<link rel="'.$rel.'" href="'.base_url("$folder/$file.$extension").'">';
}