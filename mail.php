<?php 

$receiver = $_POST["email"];
$subject = "Verify Your Account";
$sender = "briant.002@ski.sch.id";

$body = "You've Registered To Rumah Sakit YCCA, Click Here to Verify http://localhost/git/Rumah_Sakit/login.php";
    
    if (mail($receiver, $subject, $body, $sender)) {
        echo "
        <script>
                alert('Mail Successfully Sent to $receiver');
                document.location.href = 'login.php';
        </script>";

} else {
    echo "
        <script>
                alert('Failed to send email to $receiver!');
                document.location.href = 'login.php';
        </script>";
}



?>