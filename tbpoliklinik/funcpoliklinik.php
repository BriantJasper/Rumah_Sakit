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
    $id_poli = test_input($data["id_poli"]);
    $nama_poli = test_input($data["nama_poli"]);
    $gedung = test_input($data["gedung"]);

    $query = "INSERT INTO tb_poliklinik VALUES ('$id_poli','$nama_poli','$gedung')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_poliklinik WHERE id_poli = '$id'");
    return mysqli_affected_rows($conn);
}
 
function ubah($data) {
    global $conn;
    $prev_id = $data["prev_id"];
    $id = $data["id_poli"];
    $nama_poli = $data["nama_poli"];
    $gedung = $data["gedung"];

    $query = "UPDATE tb_poliklinik SET 
    id_poli = '$id',
    nama_poli = '$nama_poli',
    gedung = '$gedung'
    WHERE id_poli = '$prev_id'
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
        
        $query = "SELECT id_poli, nama_poli, gedung
        FROM tb_poliklinik
                WHERE
                tb_poliklinik.id_poli LIKE '%$keyword%' OR
                tb_poliklinik.nama_poli LIKE '%$keyword%' OR
                tb_poliklinik.gedung LIKE '%$keyword%'
                ORDER BY id_poli ASC
            ";
        return query($query);
    }
    
?>