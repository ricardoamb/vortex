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
<meta name="description" content="" />
<meta name="author" content="" />
<meta name="viewport" content="width=device-width; initial-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

<?php if(isset($coreCSS)): ?><!-- BEGIN CORE CSS -->{coreCSS}<!-- END CORE CSS --><?php echo PHP_EOL; endif;  ?>
<?php if(isset($pluginsCSS)): ?><!-- BEGIN PLUGINS CSS -->{pluginsCSS}<!-- END PLUGINS CSS --><?php echo PHP_EOL; endif;  ?>
<?php if(isset($shortcutIcon)): ?><!-- BEGIN SHORTCUT ICON -->{shortcutIcon}<!-- END SHORTCUT AND TOUCH ICONS --><?php echo PHP_EOL; endif;  ?>
<?php if(isset($touchIcon)): ?><!-- BEGIN SHORTCUT ICON -->{touchIcon}<!-- END SHORTCUT AND TOUCH ICONS --><?php echo PHP_EOL; endif; ?>
<?php if(isset($headerIncludes)): ?><!-- BEGIN HEADER INCLUDES -->{headerIncludes}<!-- END HEADER INCLUDES --><?php echo PHP_EOL; endif; ?>
<?php if(isset($modernizr)): ?><!-- MODERNIZR JS -->{modernizr}<!-- MODERNIZR JS --><?php echo PHP_EOL; endif; ?>

</head>

<?php if(isset($bodyClass)){ ?><body class="{bodyClass}"><?php }else{ ?><body><?php } ?>


<!-- CONTENT -->

