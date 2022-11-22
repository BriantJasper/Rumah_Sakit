<?php 

session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;

// require 'functions.php';
// require 'header.php';
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bootstrap 5 Side Bar Navigation</title>
    <!-- fontawesome icons -->
    <script src="https://kit.fontawesome.com/b5572efd23.js" crossorigin="anonymous"></script>
    <!-- bootstrap 5 css -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
      crossorigin="anonymous"
    />
    <!-- BOX ICONS CSS-->
    <link
      href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css"
      rel="stylesheet"
    />
    <!-- custom css -->
    <link rel="stylesheet" href="style.css" />
    <style>
      .mtt {
        margin-top: 4px;
      }
    </style>
  </head>

  <body>
    <!-- Side-Nav -->
    <div
      class="side-navbar active-nav d-flex justify-content-between flex-wrap flex-column" id="sidebar" width ="50%">
      <ul class="nav flex-column text-white w-100">
        <a href="#" class="nav-link h3 text-white my-2">
          Responsive </br>SideBar Nav
        </a>
        <!-- Home -->
        <li href="#" class="nav-link">
          <i class="bx bxs-dashboard"></i>
          <span class="mx-2">Home</span>
        </li>
        <!-- Profile -->
        <li href="#" class="nav-link">
          <i class="bx bx-user-check"></i>
          <span class="mx-2">Profile</span>
        </li>
        <!-- Contact -->
        <li href="#" class="nav-link">
          <i class="bx bx-conversation"></i>
          <span class="mx-2">Contact</span>
        </li>
        <!-- Table Collapsible -->
        <ul class="list-unstyled ps-0">
        <li href="#" class="mb-1">
          <button class="nav-link btn btn-toggle collapsed text-white" data-bs-toggle="collapse" data-bs-target="#table-collapse" aria-expanded="false">
            <i class="fa-solid fa-table-cells-large"></i>
            <span class="mx-2">Tables</span> 
          </button>

          <div class="collapse" id="table-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal ml-auto" style="margin-top: 5px;">
              <div class="ml-auto">
                <li><a href="/tbdokter/tbdokter.php" class="link-light"><span class="mx-2">Table Dokter</span></a></li>
                <li><a href="/tbobat/tbobat.php" class="link-light"><span class="mx-2">Table Obat</span></a></li>
                <li><a href="/tbpasien/tbpasien.php" class="link-light"><span class="mx-2">Table Pasien</span></a></li>
                <li><a href="/tbpoliklinik/tbpoliklinik.php" class="link-light"><span class="mx-2">Table Poliklinik</span></a></li>
                <li><a href="/tbrmmedis/tbrmmedis.php" class="link-light"><span class="mx-2">Table Rekam Medis</span></a></li>
                <li><a href="/tbrmobat/tbrmobat.php" class="link-light"><span class="mx-2">Table RM Obat</span></a></li>
              </div>
            </ul>
          </div>
        </li>
      </ul>
        </ul>
      <span href="#" class="nav-link h4 w-100 mb-5">
        <a href="https://www.instagram.com/"><i class="bx bxl-instagram-alt text-white"></i></a>
        <a href="https://www.twitter.com"><i class="bx bxl-twitter px-2 text-white"></i></a>
        <a href="https://www.facebook.com"><i class="bx bxl-facebook text-white"></i></a>
      </span>

      <div class="dropdown container mb-auto">
        <a href="#" class="d-flex align-items-center link-light text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-user" width="32" height="32" class="rounded-circle" style="margin-right: 10px;"></i>
          <strong>Username</strong>
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2" style="margin: 0px;">
          <li><a class="dropdown-item" href="#">New project...</a></li>
          <li><a class="dropdown-item" href="#">Settings</a></li>
          <li><a class="dropdown-item" href="#">Profile</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
        </ul>
      </div>
    </div>

    <!-- Main Wrapper -->
    <div class="p-1 my-container active-cont">
      <!-- Top Nav -->
      <nav class="navbar top-navbar navbar-light bg-light px-5">
        <a class="btn border-0" id="menu-btn"><i class="bx bx-menu"></i></a>
      </nav>
      <!--End Top Nav -->
      <h3 class="text-dark p-3">RESPONSIVE SIDEBAR NAV 💻 📱 
      </h3>
      <p class="px-3">Responsive navigation sidebar built using <a class="text-dark" href="https://getbootstrap.com/">Bootstrap 5</a>.</p>
    </div>

    <!-- bootstrap js -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
      crossorigin="anonymous"
    ></script>
    <!-- custom js -->
    <script>
      var menu_btn = document.querySelector("#menu-btn");
      var sidebar = document.querySelector("#sidebar");
      var container = document.querySelector(".my-container");
      menu_btn.addEventListener("click", () => {
        sidebar.classList.toggle("active-nav");
        container.classList.toggle("active-cont");
      });
    </script>
    <!-- Script Lagi -->
    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>