<?php
session_start();
include 'koneksi.php';

if (isset($_POST['tambah'])) {
    $judulfoto =  $_POST['judulfoto'];
    $deskripsifoto = $_POST['deskripsifoto'];
    $tanggalunggah = date('Y-m-d');
    $albumid = $_POST['albumid'];
    $userid = $_SESSION['userid'];
    $foto = $_FILES['lokasifile'] ['name'];
    $tmp = $_FILES['lokasifile']['tmp_name'];
    $lokasi = '../config/img/';
    $namafoto = rand(). '-'.$foto;

    move_uploaded_file($tmp, $lokasi.$namafoto);

   $sql = mysqli_query($koneksi, "INSERT INTO foto VALUES('','$judulfoto','$deskripsifoto','$tanggalunggah','$namafoto','$albumid','userid')");

   echo "<script>
   alert('Data berhasil ditambah');
   location.href='../config/foto.php';
   </script>";

}
?>
