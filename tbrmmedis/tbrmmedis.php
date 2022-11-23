<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: ../login.php");
    exit;
} 

require 'funcrmmedis.php';
require '../appearance/header.php';

// pagination
// konfigurasi
$jumlahDataPerHalaman = 5;
$jumlahData = count(query("SELECT * FROM tb_rekammedis"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = ( isset($_GET["page"] ) ) ? $_GET["page"] : 1;
$awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

$datarekammedis = query("SELECT id_rm, nama_pasien, jenis_kelamin, keluhan, nama_dokter, spesialis, diagnosa, nama_poli, gedung, tgl_periksa
    FROM tb_rekammedis
    INNER JOIN tb_pasien
    ON tb_rekammedis.id_pasien = tb_pasien.id_pasien
    INNER JOIN tb_dokter
    ON tb_rekammedis.id_dokter = tb_dokter.id_dokter
    INNER JOIN tb_poliklinik
    ON tb_rekammedis.id_poli = tb_poliklinik.id_poli
    ORDER BY id_rm ASC LIMIT $awalData, $jumlahDataPerHalaman");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
    $datarekammedis = cari($_POST);
    // var_dump($_POST);
}

$datapoli = query("SELECT nama_poli FROM tb_poliklinik");

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
    .form-option {
        width: 100px;
        height: auto;
    }
</style>
</head>
<body>
    <div class="container mt-5"> 
    <h1 class="mx-auto text-center">Data RM Medis</h1>

    <!-- search -->
        <form action="" method="post" class="form-check">
            <div class="form-group">
                <input type="text" name="keyword" autofocus placeholder="Search..." autocomplete="off">
                <button style= "margin-bottom: 7px;" type="submit" name="cari" class="btn btn-info">Search!</button>
            
                <div class="br"></div>
                <!-- radio button -->
                    <input type="hidden" name="nama_poli" value="">
                    <?php foreach ($datapoli as $d) : ?>
                        <input type="radio" name="nama_poli" value="<?= $d["nama_poli"] ?>">
                        <label for="nama_poli"><?= $d["nama_poli"] ?></label>
                    <?php endforeach; ?>
                <!-- end of radio button -->
                <div class="br"></div>

                <!-- option search -->
            <div class="form-group form-option">
                <select name="id_rm" class="form-select mb-2 mt-2">
                    <option value="">ID RM</option>
                    <?php foreach ($datarekammedis as $data) : ?>
                        <option value="<?= $data["id_rm"] ?>"> <?= $data["id_rm"] ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
                <!-- end of option search -->
        </form>
    <!-- end of search -->
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
    
    <a href="insert.php" class="btn btn-primary mb-2">Add Data</a>

        <table class ="table table-hover table-striped table-bordered table-responsive"> 
        <tr>
            <td class="text-center"> <?= "Medical Record ID"; ?> </td>
            <td class="text-center"> <?= "Patient Name"; ?> </td>
            <td class="text-center"> <?= "Gender"; ?> </td>
            <td class="text-center"> <?= "Complaint"; ?> </td>
            <td class="text-center"> <?= "Doctor Name"; ?> </td>
            <td class="text-center"> <?= "Specialist"; ?> </td>
            <td class="text-center"> <?= "Diagnose"; ?> </td>
            <td class="text-center"> <?= "Policlinic Name"; ?> </td>
            <td class="text-center"> <?= "Building"; ?> </td>
            <td class="text-center"> <?= "Check Date"; ?> </td>
            <td class="text-center"> <?= "Action"; ?> </td>

        </tr>
        <?php $i = 1; ?>
        <?php foreach ($datarekammedis as $data) : ?> 
            <tr>
                <td class="text-center"> <?= $data["id_rm"]; ?> </td>
                <td class="text-center"> <?= $data["nama_pasien"]; ?> </td>
                <td class="text-center"> <?= $data["jenis_kelamin"]; ?> </td>
                <td class="text-center"> <?= $data["keluhan"]; ?> </td>
                <td class="text-center"> <?= $data["nama_dokter"]; ?> </td>
                <td class="text-center"> <?= $data["spesialis"]; ?> </td>
                <td class="text-center"> <?= $data["diagnosa"]; ?> </td>
                <td class="text-center"> <?= $data["nama_poli"]; ?> </td>
                <td class="text-center"> <?= $data["gedung"]; ?> </td>
                <td class="text-center"> <?= $data["tgl_periksa"]; ?> </td>
                <td class="text-center">
                <a class= "btn btn-outline-primary" href="update.php?id=<?= $data["id_rm"];?> ">Update</a>
                <a class="btn btn-outline-danger" href="delete.php?id=<?= $data["id_rm"];?>">Delete</a>
                </td>
            </tr>
            <?php $i++?>
        <?php endforeach; ?>
            
        </table>
    </div>

    <?php require '../appearance/footer.php' ?>

</body>
</html>