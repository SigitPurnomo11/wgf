<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);
$email = $_POST['email'];
$namalengkap = $_POST['namalengkap'];
$alamat = $_POST['alamat'];
$level = 'peminjam';

$sql = mysqli_query($koneksi, "INSERT INTO user VALUES ('', '$username', '$password', '$email', '$namalengkap', '$alamat', '$level')");

if ($sql) {
    echo "<script>
    alert('Pendaftaran akun berhasil');
    location.href='../index.php';
    </script>";
} else {
    echo "<script>
    alert('Pendaftaran akun tidak berhasil');
    location.href='../register.php';
    </script>";
}
