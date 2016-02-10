<?php defined('BASEPATH') OR exit('No direct script access allowed');

include_once('includes/header.php');

if(is_logged(false)) include_once('includes/dashboard-upper.php');

echo '{content}';

echo '</div>' . PHP_EOL . '<!-- END CONTENT -->';

if(is_logged(false)) include_once('includes/dashboard-down.php');

include_once('includes/footer.php');