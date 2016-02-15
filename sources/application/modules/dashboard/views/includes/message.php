<?php

if(isset($_SESSION['message']))
{
    if($_SESSION['message'] == true)
    {
        echo '<span id="message"></span>';
    }
}