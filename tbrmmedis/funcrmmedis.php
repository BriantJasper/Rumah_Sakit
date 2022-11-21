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
    $nama_pasien = test_input($data["nama_pasien"]);
    $keluhan = test_input($data["keluhan"]);
    $nama_dokter = test_input($data["nama_dokter"]);
    $diagnosa = test_input($data["diagnosa"]);
    $nama_poli = test_input($data["nama_poli"]);
    $tgl_periksa = test_input($data["tgl_periksa"]);


    $id_pasien = query("SELECT id_pasien FROM tb_pasien WHERE nama_pasien ='$nama_pasien'")[0]['id_pasien'];
    $id_dokter = query("SELECT id_dokter FROM tb_dokter WHERE nama_dokter ='$nama_dokter'")[0]['id_dokter'];
    $id_poli = query("SELECT id_poli FROM tb_poliklinik WHERE nama_poli ='$nama_poli'")[0]['id_poli'];

    $query = "INSERT INTO tb_rekammedis VALUES ('$id_rm','$id_pasien','$keluhan','$id_dokter','$diagnosa','$id_poli','$tgl_periksa')";


    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_rekammedis WHERE id_rm = '$id'");
    return mysqli_affected_rows($conn);
}
 
function ubah($data) {
    global $conn;
    $prev_id = $data["prev_id"];
    $id_rm = $data["id_rm"];
    $nama_pasien = $data["nama_pasien"];
    $keluhan = $data["keluhan"];
    $nama_dokter = $data["nama_dokter"];
    $diagnosa = $data["diagnosa"];
    $nama_poli = $data["nama_poli"];
    $tgl_periksa = $data["tgl_periksa"];

    $id_pasien = query("SELECT id_pasien FROM tb_pasien WHERE nama_pasien ='$nama_pasien'")[0]['id_pasien'];
    $id_dokter = query("SELECT id_dokter FROM tb_dokter WHERE nama_dokter ='$nama_dokter'")[0]['id_dokter'];
    $id_poli = query("SELECT id_poli FROM tb_poliklinik WHERE nama_poli ='$nama_poli'")[0]['id_poli'];

    $query = "UPDATE tb_rekammedis SET 
    id_rm = '$id_rm',
    id_pasien = '$id_pasien',
    keluhan = '$keluhan',
    id_dokter = '$id_dokter',
    diagnosa = '$diagnosa',
    id_poli = '$id_poli',
    tgl_periksa = '$tgl_periksa'
    WHERE id_rm = '$prev_id'
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
?>