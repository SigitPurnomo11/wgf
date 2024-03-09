<?php 
    include 'koneksi.php';
    session_start();

    $fotoid=$_GET['fotoid'];

    $sql = mysqli_query($koneksi, "delete from foto where fotoid='$fotoid'");

    header("Loaction:../config/foto.php");
?>