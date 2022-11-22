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
    $id_rm = test_input($data["id_rm"]);
    $nama_obat = test_input($data["nama_obat"]);


    $id_obat = query("SELECT id_obat FROM tb_obat WHERE nama_obat ='$nama_obat'")[0]['id_obat'];

    $query = "INSERT INTO tb_rm_obat VALUES ('','$id_rm','$id_obat')";


    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_rm_obat WHERE id = '$id'");
    return mysqli_affected_rows($conn);
}
 
function ubah($data) {
    global $conn;
    $id = $data["id"];
    $id_rm = $data["id_rm"];
    $nama_obat = $data["nama_obat"];

    $id_obat = query("SELECT id_obat FROM tb_obat WHERE nama_obat ='$nama_obat'")[0]['id_obat'];

    $query = "UPDATE tb_rm_obat SET 
    id_rm = '$id_rm',
    id_obat = '$id_obat'
    WHERE id = '$id'
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
        $nama_obat = $data["nama_obat"];
        $id_rm = $data["id_rm"];


        
        if ( $nama_obat == NULL && $id_rm == NULL) {

        $query = "SELECT tb_rm_obat.id, nama_pasien, jenis_kelamin, keluhan, nama_dokter, spesialis, diagnosa, tgl_periksa, nama_obat, ket_obat 
        FROM tb_rm_obat
            INNER JOIN tb_rekammedis
            ON tb_rm_obat.id_rm = tb_rekammedis.id_rm
            INNER JOIN tb_pasien
            ON tb_rekammedis.id_pasien = tb_pasien.id_pasien
            INNER JOIN tb_dokter
            ON tb_rekammedis.id_dokter = tb_dokter.id_dokter
            INNER JOIn tb_obat
            ON tb_rm_obat.id_obat = tb_obat.id_obat
            WHERE
            tb_rekammedis.id_rm LIKE '%$keyword%' OR
            tb_pasien.nama_pasien LIKE '%$keyword%' OR
            tb_pasien.jenis_kelamin LIKE '%$keyword%' OR
            tb_rekammedis.keluhan LIKE '%$keyword%' OR
            tb_dokter.nama_dokter LIKE '%$keyword%' OR
            spesialis LIKE '%$keyword%' OR
            tb_rekammedis.diagnosa LIKE '%$keyword%' OR
            tb_obat.nama_obat LIKE '%$keyword%' OR
            tb_obat.ket_obat LIKE '%$keyword%' OR
            tb_rekammedis.tgl_periksa LIKE '%$keyword%'
            ORDER BY id ASC
        ";

        } else {

        $query = "SELECT tb_rm_obat.id, nama_pasien, jenis_kelamin, keluhan, nama_dokter, spesialis, diagnosa, tgl_periksa, nama_obat, ket_obat
        FROM `tb_rm_obat` 
            INNER JOIN tb_rekammedis
            ON tb_rm_obat.id_rm = tb_rekammedis.id_rm
            INNER JOIN tb_pasien
            ON tb_rekammedis.id_pasien = tb_pasien.id_pasien
            INNER JOIN tb_dokter
            ON tb_rekammedis.id_dokter = tb_dokter.id_dokter
            INNER JOIN tb_obat
            ON tb_rm_obat.id_obat = tb_obat.id_obat
            WHERE
            tb_rekammedis.id_rm = '$id_rm' OR
            nama_obat = '$nama_obat'
            ORDER BY id ASC
        ";
        }

        return query($query);
    }
?>