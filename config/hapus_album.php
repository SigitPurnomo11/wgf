<?php 
    include 'koneksi.php';
    session_start();

    $albumid=$_GET['albumid'];

    $sql = mysqli_query($koneksi, "delete from album where albumid='$albumid'");

    header("Loaction:../config/album.php");
?>