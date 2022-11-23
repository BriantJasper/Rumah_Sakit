<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
  header("Location: login.php");
  exit;
}

?>
<head>
  <?php require './appearance/hpheader.php' ?>
  <style>
    .bg-size{
      background-size: cover;
      background-color: aqua;
    }
  </style>
</head>

<body>
  
<div class="container bg-size" >


</div>
  
</body>
  
<?php 
require './appearance/footer.php' 

?>