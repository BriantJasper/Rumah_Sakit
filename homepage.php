<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
  header("Location: login.php");
  exit;
}

?>
<head>
  <?php require './appearance/hpheader.php' ?>
  <link rel="stylesheet" href="homepage.css">
</head>

<body>
  

    <div class="column-1 mx-auto">
      <img src="./PLSBISA.png" alt="img" class="my-auto"style="background-size: cover; width: 100%; height: 84.5%;" >
    </div>


</body>
<?php 
require './appearance/footer.php' 

?>