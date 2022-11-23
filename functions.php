<?php 

$conn = mysqli_connect("localhost", "root", "", "db_rumah_sakit");

function query($query) {
    global $conn;
    $data = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($data) ) {
        $rows[] = $row;
    }
    return $rows;
}




function registrasi($data) {
    global $conn;

    $email = $data["email"];
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM tb_user WHERE username = '$username'");

    if ( mysqli_fetch_assoc($result) ) {
        echo "
            <script>
                alert('Username Is Already Registered!');
            </script>
        ";
        return false;
    }

    //cek konfirmasi password
    if ($password !== $password2) {
        echo"
        <script>
            alert('The Password Confirmation Does Not Match');
        </script>
        ";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO tb_user VALUES('', '$username', '$email', '$password')");
    return mysqli_affected_rows($conn);
}

function sendmail() {
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

}

?>