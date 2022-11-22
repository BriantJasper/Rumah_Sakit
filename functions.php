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

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if ( mysqli_fetch_assoc($result) ) {
        echo "
            <script>
                alert('Username Sudah Terdaftar!');
            </script>
        ";
        return false;
    }

    //cek konfirmasi password
    if ($password !== $password2) {
        echo"
        <script>
            alert('Password tidak sesuai dengan Password Konfirmasi!');
        </script>
        ";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");
    return mysqli_affected_rows($conn);
}





?>