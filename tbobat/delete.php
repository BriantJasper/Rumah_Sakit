<?php 

session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: ../login.php");
    exit;
} 


require 'funcobat.php';

$id = $_GET["id"];

if( hapus ($id) > 0 ) {
    echo "
        <script>
                alert('Data Successfully Deleted!');
                document.location.href = 'tbobat.php';
        </script>";
} else {
    echo "
        <script>
                alert('Failed To Delete Data!');
                document.location.href = 'tbobat.php';
        </script>"; }

?> 