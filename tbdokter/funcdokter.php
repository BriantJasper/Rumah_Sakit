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
    $prev_id = $data["prev_id"];
    $id = $data["id_dokter"];
    $nama_dokter = $data["nama_dokter"];
    $spesialis = $data["spesialis"];
    $alamat = $data["alamat"];
    $no_telp = $data["no_telp"];

    $query = "UPDATE tb_dokter SET 
    id_dokter = '$id',
    nama_dokter = '$nama_dokter',
    spesialis = '$spesialis',
    alamat = '$alamat',
    no_telp = '$no_telp'
    WHERE id_dokter = '$prev_id'
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

        $query = "SELECT * FROM tb_dokter
                    WHERE
                    id_dokter LIKE '%$keyword%' OR
                    nama_dokter LIKE '%$keyword%' OR
                    spesialis LIKE '%$keyword%' OR
                    alamat LIKE '%$keyword%' OR
                    no_telp LIKE '%$keyword%'
                ";

        return query($query);
    }
?>