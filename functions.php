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

function tambah($data) {
    global $conn;
    $mapel = test_input($data["namamapel"]);
    $namajurusan = test_input($data["namajurusan"]);
    $kelas = test_input($data["kelas"]);
    $tgl = test_input($data["tanggal_ujian"]);
    $durasi = test_input($data["durasi_ujian"]);

    $query = "INSERT INTO tbujian VALUES ('', '$mapel','$namajurusan','$kelas','$tgl','$durasi')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tbujian WHERE idujian = $id");
    return mysqli_affected_rows($conn);
}
 
function ubah($data) {
    global $conn;
    $id = $data["idujian"];
    $mapel = $data["namamapel"];
    $namajurusan = $data["namajurusan"];
    $kelas = $data["kelas"];
    $tgl = $data["tanggal_ujian"];
    $durasi = $data["durasi_ujian"];

    $query = "UPDATE tbujian SET 
    namamapel = '$mapel',
    namajurusan = '$namajurusan',
    kelas = '$kelas',
    tanggal_ujian = '$tgl',
    durasi_ujian = '$durasi'
    WHERE idujian = $id
    ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

    function test_input($data) {
        global $conn;
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = mysqli_real_escape_string($conn, $data);
        return $data;
    }

    function cari($data) {
        $keyword = $data["keyword"];
        $namamapel = $data["namamapel"];
        $namajurusan = $data["namajurusan"];

        if ( $namamapel == NULL && $namajurusan == NULL) {
        $query = "SELECT * FROM tbujian
                    WHERE
                    namamapel LIKE '%$keyword%' OR
                    namajurusan LIKE '%$keyword%' OR
                    kelas LIKE '%$keyword%' OR
                    tanggal_ujian LIKE '%$keyword%' OR
                    durasi_ujian LIKE '%$keyword%'
                ";
        } else {
        $query = "SELECT * FROM tbujian
                    WHERE
                    namajurusan = '$namajurusan' OR
                    namamapel = '$namamapel'
                ";
        }

        return query($query);
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