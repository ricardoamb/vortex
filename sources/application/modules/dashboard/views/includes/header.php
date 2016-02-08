<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pt-BR"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="pt-BR"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="pt-BR"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-BR"> <!--<![endif]-->

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title><?php if(isset($defaultTitle)): ?>{defaultTitle} | <?php endif; ?>{title}</title>

<meta name="description" content="Admin Dashboard for Vortex System Website">
<meta name="author" content="">

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

<!-- BEGIN CORE CSS -->{coreCSS}<!-- END CORE CSS -->

<!-- BEGIN PLUGINS CSS -->{pluginsCSS}<!-- END PLUGINS CSS -->

<!-- BEGIN SHORTCUT AND TOUCH ICONS -->
{favicon}
{apple-touch-icon}
<!-- END SHORTCUT AND TOUCH ICONS -->

<!-- MODERNIZR JS -->{modernizr}<!-- MODERNIZR JS -->


</head>
<body>