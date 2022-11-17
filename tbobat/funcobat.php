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
    $id_obat = test_input($data["id_obat"]);
    $nama_obat = test_input($data["nama_obat"]);
    $ket_obat = test_input($data["ket_obat"]);

    $query = "INSERT INTO tb_obat VALUES ('$id_obat','$nama_obat','$ket_obat')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_obat WHERE id_obat = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;
    $id = $data["id_obat"];
    $nama_obat = $data["nama_obat"];
    $ket_obat = $data["ket_obat"];

    $query = "UPDATE tb_obat SET 
    id_obat = '$id',
    nama_obat = '$nama_obat',
    ket_obat = '$ket_obat'
    WHERE id_obat = $id
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
        $query = "SELECT * FROM tb_obat
                    WHERE
                    namamapel LIKE '%$keyword%' OR
                    namajurusan LIKE '%$keyword%' OR
                    kelas LIKE '%$keyword%' OR
                    tanggal_ujian LIKE '%$keyword%' OR
                    durasi_ujian LIKE '%$keyword%'
                ";
        } else {
        $query = "SELECT * FROM tb_obat
                    WHERE
                    namajurusan = '$namajurusan' OR
                    namamapel = '$namamapel'
                ";
        }

        return query($query);
    }

?>