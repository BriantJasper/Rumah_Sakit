<?php 
$receiver = "briantjasper5@gmail.com";
$subject = "Email Test via PHP using Localhost";
$body = "Hi, there... This is a test email sent from Localhost.";
$sender = "briant.002@ski.sch.id";

if (mail($receiver, $subject, $body, $sender)) {
    echo "Email sent succesfully to $receiver";
} else {
    echo "Sorry, failed while sending mail!";
}






?>