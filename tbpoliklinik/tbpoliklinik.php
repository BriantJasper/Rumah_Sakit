<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: ../login.php");
    exit;
} 

require 'funcpoliklinik.php';
require '../appearance/header.php';

// pagination
// konfigurasi
// $jumlahDataPerHalaman = 5;
// $jumlahData = count(query("SELECT * FROM tb_poliklinik"));
// $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
// $halamanAktif = ( isset($_GET["page"] ) ) ? $_GET["page"] : 1;
// $awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

$datapoliklinik = query("SELECT * FROM tb_poliklinik ORDER BY id_poli ASC");

// tombol cari ditekan
// if( isset($_POST["cari"]) ) {
//     $dataujian = cari($_POST);
//     // var_dump($_POST);
// }


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
 
    <div class="container">
        <center><h1>Data Poliklinik</h1></center>
        <a href="insert.php">Add Data</a>
    </div>

    <!-- search -->
    <!-- <div class="container">
        <form action="" method="post" class="form-check">
            <div class="form-group">
                <input type="text" name="keyword" autofocus placeholder="Search" autocomplete="off">
                <button style= "margin-bottom: 7px;" type="submit" name="cari" class="btn btn-info">Cari!</button>
            
                <div class="br"></div> -->
                
                <!-- radio button -->
                    <!-- <input type="hidden" name="namajurusan" value="">
                    </?php // foreach ($jurusan as $j) : ?/>
                        <input type="radio" name="namajurusan" value="</?= // $j["namajurusan"] ?>">
                        <label for="namajurusan"></?= // $j["namajurusan"] ?></label>
                    </?php // endforeach; /?> -->
                <!-- end of radio button -->
                <!-- <div class="br"></div> -->

                <!-- option search -->
                <!-- <label style="margin-bottom:10px ;" for="namamapel">Nama Mapel</label>
                <select name="namamapel">
                    <option value="">-</option> -->
                    <?php //foreach ($mapel as $m) : ?>
                        <!-- <option value="</?= $m["namamapel"] ?>"> </?= $m["namamapel"] ?> </option> -->
                    <?php //endforeach; ?>
                </select>
                <!-- end of option search -->
            </div>
        </form>
        
    <!-- Pagination -->
    <!-- <nav>
        <ul class="pagination">
            </?php if( $halamanAktif > 1 ) : ?>
                <li class="page-item"><a class="page-link" href="?page=</?= $halamanAktif - 1; ?>">&laquo;</a></li>
            </?php endif; ?>
            
            </?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                </?php if( $i == $halamanAktif) : ?>
                    <li class="page-item "><a class="page-link" href="?page=</?= $i; ?>" style="font-weight:bold "></?= $i; ?></a></li>
                </?php else : ?>
                    <li class="page-item"><a class="page-link" href="?page=</?= $i; ?>"></?= $i; ?></a></li>
                </?php endif; ?>
            </?php endfor; ?>
      
        </?php if( $halamanAktif < $jumlahHalaman ) : ?>
            <li class="page-item"><a class="page-link" href="?page=</?= $halamanAktif + 1; ?>">&raquo;</a></li>
        </?php endif; ?>
        </ul>
    </nav> -->
    <!-- End Of Pagination -->
    <div class="container"> 
        <table class ="table table-hover table-striped table-bordered table-responsive"> 
        <tr>
            <td class="text-center"> <?= "Policlinic ID"; ?> </td>
            <td class="text-center"> <?= "Policlinic Name"; ?> </td>
            <td class="text-center"> <?= "Building"; ?> </td>
            <td class="text-center"> <?= "Action"; ?> </td>

        </tr>
        <?php $i = 1; ?>
        <?php foreach ($datapoliklinik as $data) : ?> 
            <tr>
                <td class="text-center"> <?= $data["id_poli"]; ?> </td>
                <td class="text-center"> <?= $data["nama_poli"]; ?> </td>
                <td class="text-center"> <?= $data["gedung"]; ?> </td>
                <td class="text-center">
                <a class= "btn btn-outline-primary" href="update.php?id=<?= $data["id_poli"];?> ">Update</a>
                <a class="btn btn-outline-danger" href="delete.php?id=<?= $data["id_poli"];?>">Delete</a>
                </td>
            </tr>
            <?php $i++?>
        <?php endforeach; ?>
            
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>