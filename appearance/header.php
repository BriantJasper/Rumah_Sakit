<?php 
echo "
<!DOCTYPE html>
<html lang='en'>
    <head>
        <title>Halaman Admin</title>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' rel='stylesheet'>
        <link href='https://getbootstrap.com/docs/5.2/assets/css/docs.css' rel='stylesheet'>
    <style>
    .kanan{
      justify-content: right;
    }
    </style>

</head>
<body>
        <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
            <div class='container-fluid'>
            <a class='navbar-brand ms-3' href='../homepage.php'>
            <img src='../appearance/yccanav.png' width='120px' height='65px' class='me-3 display-1'><b>Rumah Sakit YCCA</b></a>
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse kanan me-4' id='navbarSupportedContent' >
            <ul class='navbar-nav me-5 mb-2 mb-lg-0'>
            <li class='nav-item dropdown'>
              <a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                Tables List
              </a>
              <ul class='dropdown-menu'>
                <li><a class='dropdown-item' href='../tbdokter/tbdokter.php'>Table Dokter</a></li>
                <li><a class='dropdown-item' href='../tbobat/tbobat.php'>Table Obat</a></li>
                <li><a class='dropdown-item' href='../tbpasien/tbpasien.php'>Table Pasien</a></li>
                <li><a class='dropdown-item' href='../tbpoliklinik/tbpoliklinik.php#'>Table Poliklinik</a></li>
                <li><a class='dropdown-item' href='../tbrmmedis/tbrmmedis.php'>Table Rekam Medis</a></li>
                <li><a class='dropdown-item' href='../tbrmobat/tbrmobat.php'>Table Rekam Obat</a></li>
                <li><hr class='dropdown-divider'></li>
                <li><a class='dropdown-item' href='#'>Something else here</a></li>
              </ul>
            </li>
          </ul>
            </div>
        </nav>
</body>
";
?>