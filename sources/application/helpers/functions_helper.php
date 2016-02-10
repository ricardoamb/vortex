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
            $vtx->load->model('login_mdl');
            set_theme('defaultTitle','Vortex');
            set_theme('defaultFooter','');
            set_theme('bodyClass','theme-grey',false);
            set_theme('template','dashboard/dashboard');
            // Style
            set_theme('headerIncludes',load_style(array('bootstrap.min','font-awesome.min','ionicons.min','perfect-scrollbar.min','main')),false);
            set_theme('coreCSS',load_style(array('admin','elements')),false);
            set_theme('pluginsCSS',load_style(array('plugins','lobibox','animate')),false);
            set_theme('shortcutIcon',load_icon());
            set_theme('touchIcon',load_icon('apple-touch-icon','apple-touch-icon','png'));
            // javascript
            set_theme('modernizr',load_javascript(array('modernizr.min')),false);
            set_theme('footerIncludes',load_javascript(array('jquery-1.12.0.min','bootstrap.min')),false);
            set_theme('globalVendors',load_javascript(array('global-vendors')),false);
            set_theme('vortex',load_javascript(array('pleasure','layout','lobibox.min','perfect-scrollbar.jquery.min')),false);
            set_theme('defaultIncludes',load_javascript(array('main')),false);
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
    $result = '<link rel="'.$rel.'" href="'.base_url("$folder/$file.$extension").'">';
    return $result;
}

// Verify the login in the system
function is_logged($redirect=true)
{
    $vtx =& get_instance();
    $vtx->load->library('session');
    $user_status = $vtx->session->userdata('user_status');
    if(!isset($user_status) || $user_status != 'logged')
    {
        if($redirect)
        {
            redirect('login');
        }
        else{
            return false;
        }
    }
    else
    {
        return true;
    }
}

function set_message($id='msg',$title=null, $msg=null,$type='info')
{
    $vtx =& get_instance();
    $vtx->load->library('session');
    switch($type)
    {
        case 'success':
            $vtx->session->set_flashdata($id,'<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button><strong>'.$title.'</strong> '.$msg.'</div>');
            break;
        case 'info':
            $vtx->session->set_flashdata($id,'<div class="alert alert-info" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button><strong>'.$title.'</strong> '.$msg.'</div>');
            break;
        case 'warning':
            $vtx->session->set_flashdata($id,'<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button><strong>'.$title.'</strong> '.$msg.'</div>');
            break;
        case 'error':
            $vtx->session->set_flashdata($id,'<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button><strong>'.$title.'</strong> '.$msg.'</div>');
            break;
        default:
            $vtx->session->set_flashdata($id,'<div class="alert alert-info" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button><strong>'.$title.'</strong> '.$msg.'</div>');
            break;
    }
}

function get_message($id, $print=true)
{
    $vtx =& get_instance();
    $vtx->load->library('session');
    if($print){
        echo $vtx->session->flashdata($id);
    }else{
        return $vtx->session->flashdata($id);
    }
}