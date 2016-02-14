<?php

$email = "ricardoamb83@gmail.com";
$to = "ricardoamb.dev@gmail.com";
$subject = "Hi!";
$body = "Hi,How are you?";
$headers = 'From: ' .$email . "\r\n".'Reply-To: ' . $email. "\r\n".'X-Mailer: PHP/' . phpversion();
if (mail($to, $subject, $body, $headers)) echo("<p>Email successfully sent</p>");
else echo("<p>Email delivery failed</p>");

?>