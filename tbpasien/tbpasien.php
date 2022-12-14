<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: ../login.php");
    exit;
} 

require 'funcpasien.php';
require '../appearance/header.php';

// pagination
// konfigurasi
$jumlahDataPerHalaman = 5;
$jumlahData = count(query("SELECT * FROM tb_pasien"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = ( isset($_GET["page"] ) ) ? $_GET["page"] : 1;
$awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

$datapasien = query("SELECT * FROM tb_pasien ORDER BY id_pasien ASC LIMIT $awalData, $jumlahDataPerHalaman");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
    $datapasien = cari($_POST);
    // var_dump($_POST);
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
        <h1 class="mx-auto text-center">Data Pasien</h1>
        <a href="insert.php" class="btn btn-primary mb-2">Add Data</a>


    <!-- search -->

        <form action="" method="post">
            <div class="form-group">
                <input type="text" name="keyword" autofocus placeholder="Search" autocomplete="off">
                <button style= "margin-bottom: 7px;" type="submit" name="cari" class="btn btn-info">Cari!</button>

                <div class="br"></div>
        </form>
            </div>
        </form>
        
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

        <table class ="table table-hover table-striped table-bordered table-responsive"> 
        <tr>
            <td class="text-center"> <?= "Patient ID"; ?> </td>
            <td class="text-center"> <?= "Identity Number"; ?> </td>
            <td class="text-center"> <?= "Patient Name"; ?> </td>
            <td class="text-center"> <?= "Gender"; ?> </td>
            <td class="text-center"> <?= "Address"; ?> </td>
            <td class="text-center"> <?= "Phone Number"; ?> </td>
            <td class="text-center"> <?= "Action"; ?> </td>

        </tr>
        <?php $i = 1; ?>
        <?php foreach ($datapasien as $data) : ?> 
            <tr>
                <td class="text-center"> <?= $data["id_pasien"]; ?> </td>
                <td class="text-center"> <?= $data["nomor_identitas"]; ?> </td>
                <td class="text-center"> <?= $data["nama_pasien"]; ?> </td>
                <td class="text-center"> <?= $data["jenis_kelamin"]; ?> </td>
                <td class="text-center"> <?= $data["alamat"]; ?> </td>
                <td class="text-center"> <?= $data["no_telp"]; ?> </td>
                <td class="text-center">
                <a class= "btn btn-outline-primary" href="update.php?id=<?= $data["id_pasien"];?> ">Update</a>
                <a class="btn btn-outline-danger" href="delete.php?id=<?= $data["id_pasien"];?>">Delete</a>
                </td>
            </tr>
            <?php $i++?>
        <?php endforeach; ?>
            
        </table>
    </div>

    <?php require '../appearance/footer.php' ?>
</div>
</body>
</html>