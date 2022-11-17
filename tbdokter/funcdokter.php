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
    $id_dokter = test_input($data["id_dokter"]);
    $nama_dokter = test_input($data["nama_dokter"]);
    $spesialis = test_input($data["spesialis"]);
    $alamat = test_input($data["alamat"]);
    $no_telp = test_input($data["no_telp"]);

    $query = "INSERT INTO tb_dokter VALUES ('$id_dokter','$nama_dokter','$spesialis','$alamat','$no_telp')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_dokter WHERE id_dokter = $id");
    return mysqli_affected_rows($conn);
}
 
function ubah($data) {
    global $conn;
    $id = $data["id_dokter"];
    $nama_dokter = $data["nama_dokter"];
    $spesialis = $data["spesialis"];
    $alamat = $data["alamat"];
    $no_telp = $data["no_telp"];

    $query = "UPDATE tb_dokter SET 
    nama_dokter = '$nama_dokter',
    spesialis = '$spesialis',
    alamat = '$alamat',
    no_telp = '$no_telp'
    WHERE id_dokter = $id
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

        $email = strtolower(stripslashes($data["email"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);

        //cek username sudah ada atau belum
        $result = mysqli_query($conn, "SELECT email FROM tb_user WHERE email = '$email'");

        if ( mysqli_fetch_assoc($result) ) {
            echo "
                <script>
                    alert('Email Sudah Terdaftar!');
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
        mysqli_query($conn, "INSERT INTO user VALUES('', '$email', '$password')");
        return mysqli_affected_rows($conn);
    }

?>