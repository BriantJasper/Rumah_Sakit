<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: ../login.php");
    exit;
} 

require 'funcdokter.php';
require '../appearance/header.php';

// pagination
// konfigurasi
$jumlahDataPerHalaman = 5;
$jumlahData = count(query("SELECT * FROM tb_dokter"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = ( isset($_GET["page"] ) ) ? $_GET["page"] : 1;
$awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

$datadokter = query("SELECT * FROM tb_dokter ORDER BY id_dokter ASC LIMIT $awalData, $jumlahDataPerHalaman");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
    $datadokter = cari($_POST);
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
        <h1 class="mx-auto text-center">Data Dokter</h1>
        <a href="insert.php" class="btn btn-primary mb-2">Add Data</a>


     <!-- search -->

     <form action="" method="post">
            <div class="form-group">
                <input type="text" name="keyword" autofocus placeholder="Search" autocomplete="off">
                <button style= "margin-bottom: 7px;" type="submit" name="cari" class="btn btn-info">Cari!</button>
            </div>
                <div class="br"></div>
                </select>
            
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
</div>
    <!-- End Of Pagination -->


    <div class="container"> 
        <table class ="table table-hover table-striped table-bordered table-responsive"> 
        <tr>
            <td class="text-center"> <?= "Doctor ID"; ?> </td>
            <td class="text-center"> <?= "Doctor Name"; ?> </td>
            <td class="text-center"> <?= "Specialist"; ?> </td>
            <td class="text-center"> <?= "Address"; ?> </td>
            <td class="text-center"> <?= "Phone Number"; ?> </td>
            <td class="text-center"> <?= "Action"; ?> </td>

        </tr>
        <?php $i = 1; ?>
        <?php foreach ($datadokter as $data) : ?> 
            <tr>
                <td class="text-center"> <?= $data["id_dokter"]; ?> </td>
                <td class="text-center"> <?= $data["nama_dokter"]; ?> </td>
                <td class="text-center"> <?= $data["spesialis"]; ?> </td>
                <td class="text-center"> <?= $data["alamat"]; ?> </td>
                <td class="text-center"> <?= $data["no_telp"]; ?> </td>
                <td class="text-center">
                <a class= "btn btn-outline-primary" href="update.php?id=<?= $data["id_dokter"];?> ">Update</a>
                <a class="btn btn-outline-danger" href="delete.php?id=<?= $data["id_dokter"];?>">Delete</a>
                </td>
            </tr>
            <?php $i++?>
        <?php endforeach; ?>
            
        </table>
    </div>

    <?php require '../appearance/footer.php' ?>

</body>
</html>