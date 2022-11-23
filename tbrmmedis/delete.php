<?php 

session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: ../login.php");
    exit;
} 


require 'funcrmmedis.php';

$id = $_GET["id"];

if( hapus ($id) > 0 ) {
    echo "
        <script>
                alert('Data Successfully Deleted!');
                document.location.href = 'tbrmmedis.php';
        </script>";
} else {
    echo "
        <script>
                alert('Failed To Delete Data!');
                document.location.href = 'tbrmmedis.php';
        </script>"; }

?> 