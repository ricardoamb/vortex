<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="login-screen">
    <span id="url-enter" data-url="<?php echo base_url('login/enter');?>"></span>
    <div class="panel-login">
        <div class="panel-heading"><!--panel-heading-->
            <img src="<?php echo base_url('assets/img')?>/logo-vortex-white.png" height="40" alt="Vortex" style="margin:25px 0">
        </div><!--panel-heading-->

            <?php include_once('login/login.php'); ?>

            <?php include_once('login/login_forgot_password.php'); ?>

            <?php include_once('login/login_create_account.php'); ?>

    </div><!--.blur-content-->

</div><!--.login-screen-->

<div class="dark">
    <div class="overlay"></div><!--.overlay-->
</div><!--.bg-blur-->

<svg version="1.1" xmlns='http://www.w3.org/2000/svg'>
    <filter id='blur'>
        <feGaussianBlur stdDeviation='7' />
    </filter>
</svg>
<?php
    switch ($this->uri->segment(3))
    {
        case ('logoff'):
            echo '<span id="message" data-status="true" data-msgTitle="Você saiu do sistema!"  data-msg="Você realizou o logoff com sucesso. <br>Esperamos você em breve!" data-type="success"></span>';
    }
?>