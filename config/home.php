<?php
session_start();
include '../config/koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Web Galeri Foto</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="#">Web Galeri Foto</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
        <div class="navbar-nav me-auto">
          <a href="home.php" class="btn btn-outline-primary m-1">Home</a>
          <a href="foto.php" class="btn btn-outline-primary m-1">Foto</a>
          <a href="album.php" class="btn btn-outline-primary m-1">Album</a>
        </div>
        <a href="../config/logout.php" class="btn btn-outline-danger m-1">Keluar</a>
      </div>
    </div>
  </nav>

  <div class="card mt-3" style="width: 18rem;">
  <div class="row">
    <?php
    $no = 1;
    include 'koneksi.php';
    $sql = mysqli_query($koneksi, "SELECT * FROM foto");
    while ($data = mysqli_fetch_array($sql)) {
      ?>
      <img src="../config/img/<?php echo $data['lokasifile']?>" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?php echo $data['judulfoto'] ?></h5>
        <p class="card-text"><?php echo $data['deskripsifoto'] ?></p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
      <?php } ?>
    </div>
  </div>

  <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>

<footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
  <p>&copy; UKK RPL 2024 | Ahmad Sigit Purnomo </p>
</footer>

</html>