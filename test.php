<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Halaman Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">

      <link rel="stylesheet" href="./homepage.css">
</head>
<body>    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
    <a class="navbar-brand ms-3" href="./homepage.php">
    <img src="https://smkimmanuel.sch.id/img/logo.b83e4900.png" width="40px" height="45px" class="me-3">Rumah Sakit YCCA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse kanan me-4" id="navbarSupportedContent" >
    <ul class="navbar-nav me-1 mb-2 mb-lg-0">
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle btn btn-outline-secondary" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    Tables List
    </a>
    <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="./tbdokter/tbdokter.php">Table Dokter</a></li>
    <li><a class="dropdown-item" href="./tbobat/tbobat.php">Table Obat</a></li>
    <li><a class="dropdown-item" href="../tbpasien/tbpasien.php">Table Pasien</a></li>
    <li><a class="dropdown-item" href="./tbpoliklinik/tbpoliklinik.php#">Table Poliklinik</a></li>
    <li><a class="dropdown-item" href="./tbrmmedis/tbrmmedis.php">Table Rekam Medis</a></li>
    <li><a class="dropdown-item" href="./tbrmobat/tbrmobat.php">Table Rekam Obat</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
    </ul>
    </li>
    <li class="nav-item ms-4"> 
      <a class="nav-link btn btn-danger" href="./logout.php">Logout</a> 
    </li>
    </div>
  </ul>
    </div>
</nav>
  </body>
  </html>