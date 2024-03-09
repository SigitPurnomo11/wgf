<?php
session_start();
include 'koneksi.php';

$fotoid = $_GET['fotoid'];

$sql = mysqli_query($koneksi, "DELETE FROM foto WHERE fotoid='$fotoid'");

header("Location:../config/foto.php")
?>