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
    $id_pasien = test_input($data["id_pasien"]);
    $nomor_identitas = test_input($data["nomor_identitas"]);
    $nama_pasien = test_input($data["nama_pasien"]);
    $jenis_kelamin = test_input($data["jenis_kelamin"]);
    $alamat = test_input($data["alamat"]);
    $no_telp = test_input($data["no_telp"]);

    $query = "INSERT INTO tb_pasien VALUES ('$id_pasien','$nomor_identitas','$nama_pasien','$jenis_kelamin','$alamat','$no_telp')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_pasien WHERE id_pasien = '$id'");
    return mysqli_affected_rows($conn);
}
 
function ubah($data) {
    global $conn;
    $prev_id = $data["prev_id"];
    $id = $data["id_pasien"];
    $nomor_identitas = $data["nomor_identitas"];
    $nama_pasien = $data["nama_pasien"];
    $jenis_kelamin = $data["jenis_kelamin"];
    $alamat = $data["alamat"];
    $no_telp = $data["no_telp"];

    $query = "UPDATE tb_pasien SET 
    id_pasien = '$id',
    nomor_identitas = '$nomor_identitas',
    nama_pasien = '$nama_pasien',
    jenis_kelamin = '$jenis_kelamin',
    alamat = '$alamat',
    no_telp = '$no_telp'
    WHERE id_pasien = '$prev_id'
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
 
        $query = "SELECT * FROM tb_pasien
                    WHERE
                    id_pasien LIKE '%$keyword%' OR
                    nama_pasien LIKE '%$keyword%' OR
                    jenis_kelamin LIKE '%$keyword%' OR
                    alamat LIKE '%$keyword%' OR
                    no_telp LIKE '%$keyword%'
                ";
        return query($query);
    }
?>