<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: ../login.php");
    exit;
} 

require 'funcrmobat.php';
require '../appearance/header.php';

// pagination
// konfigurasi
$jumlahDataPerHalaman = 5;
$jumlahData = count(query("SELECT * FROM tb_rm_obat"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = ( isset($_GET["page"] ) ) ? $_GET["page"] : 1;
$awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

$data_rm_obat = query("SELECT tb_rm_obat.id, nama_pasien, jenis_kelamin, keluhan, nama_dokter, spesialis, diagnosa, tgl_periksa, nama_obat, ket_obat
FROM `tb_rm_obat` 
    INNER JOIN tb_rekammedis
    ON tb_rm_obat.id_rm = tb_rekammedis.id_rm
    INNER JOIN tb_pasien
    ON tb_rekammedis.id_pasien = tb_pasien.id_pasien
    INNER JOIN tb_dokter
    ON tb_rekammedis.id_dokter = tb_dokter.id_dokter
	INNER JOIn tb_obat
    ON tb_rm_obat.id_obat = tb_obat.id_obat

    ORDER BY id ASC LIMIT $awalData, $jumlahDataPerHalaman");

$data_obat = query("SELECT nama_obat from tb_obat");
$data_rm = query("SELECT id_rm from tb_rekammedis");

    // tombol cari ditekan
    if( isset($_POST["cari"]) ) {
        $data_rm_obat = cari($_POST);

    }



?>
<head>

<style>
    .text-center{
        text-align: center;
    }
    .br{
        white-space: pre;
        display: block;
        margin: 5px;
    }
</style>
</head>
<body>
 
<div class="container mt-5">
        <h1 class="mx-auto text-center">Medicine Medical Record Data</h1>

    

    <!-- search -->
        <form action="" method="post" class="form-check">
            <div class="form-group">
                <input type="text" name="keyword" autofocus placeholder="Search" autocomplete="off">
                <button style= "margin-bottom: 7px;" type="submit" name="cari" class="btn btn-info">Search!</button>
            
                <div class="br"></div>
                <!-- radio button -->
                    <input type="hidden" name="nama_obat" value="">
                    <?php foreach ($data_obat as $d) : ?>
                        <input type="radio" name="nama_obat" value="<?= $d["nama_obat"] ?>">
                        <label for="nama_obat"><?= $d["nama_obat"] ?></label>
                    <?php endforeach; ?>
                <!-- end of radio button -->
                <div class="br"></div>

                <!-- option search -->
            <div class="form-group" style="width: 150px;">
                <select name="id_rm" class="form-select mb-2 mt-2">
                    <option value="">ID RM Obat</option>
                    <?php foreach ($data_rm as $data) : ?>
                        <option value="<?= $data["id_rm"] ?>"> <?= $data["id_rm"] ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
                <!-- end of option search -->
            
        </form>
    <!-- end of search -->

    <!-- Pagination -->
    <nav>
        <ul class="pagination">
            <?php if( $halamanAktif > 1 ) : ?>
                <li class="page-item"><a class="page-link" href="?page=<?= $halamanAktif - 1; ?>">&laquo;</a></li>
            <?php endif; ?>
            
            <?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                <?php if( $i == $halamanAktif) : ?>
                    <li class="page-item "><a class="page-link" href="?page=<?= $i; ?>" style="font-weight:bold "><?= $i; ?></a></li>
                <?php else : ?>
                    <li class="page-item"><a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a></li>
                <?php endif; ?>
            <?php endfor; ?>
      
        <?php if( $halamanAktif < $jumlahHalaman ) : ?>
            <li class="page-item"><a class="page-link" href="?page=<?= $halamanAktif + 1; ?>">&raquo;</a></li>
        <?php endif; ?>
        </ul>
    </nav>
    <!-- End Of Pagination -->
    <a href="insert.php" class="btn btn-primary mb-2">Add Data</a>
    
        <table class ="table table-hover table-striped table-bordered table-responsive"> 
        <tr>
            <td class="text-center"> <?= "ID"; ?> </td>
            <td class="text-center"> <?= "Patient Name"; ?> </td>
            <td class="text-center"> <?= "Gender"; ?> </td>
            <td class="text-center"> <?= "Complaint"; ?> </td>
            <td class="text-center"> <?= "Doctor Name"; ?> </td>
            <td class="text-center"> <?= "Specialist"; ?> </td>
            <td class="text-center"> <?= "Diagnose"; ?> </td>
            <td class="text-center"> <?= "Medicine Name"; ?> </td>
            <td class="text-center"> <?= "Medicine Description"; ?> </td>
            <td class="text-center"> <?= "Check Date"; ?> </td>
            <td class="text-center"> <?= "Action"; ?> </td>

        </tr>
        <?php $i = 1; ?>
        <?php foreach ($data_rm_obat as $data) : ?> 
            <tr>
                <td class="text-center"> <?= $data["id"]; ?> </td>
                <td class="text-center"> <?= $data["nama_pasien"]; ?> </td>
                <td class="text-center"> <?= $data["jenis_kelamin"]; ?> </td>
                <td class="text-center"> <?= $data["keluhan"]; ?> </td>
                <td class="text-center"> <?= $data["nama_dokter"]; ?> </td>
                <td class="text-center"> <?= $data["spesialis"]; ?> </td>
                <td class="text-center"> <?= $data["diagnosa"]; ?> </td>
                <td class="text-center"> <?= $data["nama_obat"]; ?> </td>
                <td class="text-center"> <?= $data["ket_obat"]; ?> </td>
                <td class="text-center"> <?= $data["tgl_periksa"]; ?> </td>
                <td class="text-center">
                <a class= "btn btn-outline-primary" href="update.php?id=<?= $data["id"];?> ">Update</a>
                <a class="btn btn-outline-danger" href="delete.php?id=<?= $data["id"];?>">Delete</a>
                </td>
            </tr>
            <?php $i++?>
        <?php endforeach; ?>
            
        </table>
</div>
</div>
    <?php require '../appearance/footer.php' ?>
</body>
</html>