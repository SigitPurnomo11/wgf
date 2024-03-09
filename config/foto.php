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
            <div class="collapse navbar-collapse mt-2" id="navbarNav">
                <div class="navbar-nav me-auto">
                    <a href="home.php" class="btn btn-outline-primary m-1">Home</a>
                    <a href="foto.php" class="btn btn-outline-primary m-1">Foto</a>
                    <a href="album.php" class="btn btn-outline-primary m-1">Album</a>
                </div>
                <a href="../config/logout.php" class="btn btn-outline-danger m-1">Keluar</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mt-2">
                    <div class="card-header">Tambah Foto</div>
                    <div class="card-body">
                        <form action="../config/aksi_foto.php" method="POST" enctype="multipart/form-data">
                            <label class="form-label">Judul Foto</label>
                            <input type="text" name="judulfoto" class="form-control" required>
                            <label class="form-label">Deskripsi</label>
                            <input type="text" name="deskripsifoto" class="form-control" required>
                            <label class="form-label">Lokasi File</label>
                            <input type="file" name="lokasifile" class="form-control" required>

                            <label class="form-label">Album</label>
                            <select class="form-control" name="albumid">
                                <?php
                                include 'koneksi.php';
                                $userid = $_SESSION['userid'];
                                $sql = mysqli_query($koneksi, "SELECT * FROM album ");
                                while ($data = mysqli_fetch_array($sql)) {
                                ?>
                                    <option value="<?= $data['albumid'] ?>"><?= $data['namaalbum'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <input type="submit" class="btn btn-primary mt-2" name="tambah">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mt-2">
                    <div class="card-header">Data Foto</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Foto</th>
                                    <th>File</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                include 'koneksi.php';
                                $sql = mysqli_query($koneksi, "SELECT * FROM foto");
                                while ($data = mysqli_fetch_array($sql)) {
                                ?>
                                    <tr>
                                        <th><?php echo $no++ ?></th>
                                        <th><?php echo $data['judulfoto'] ?></th>
                                        <th><img src="../config/img/<?php echo $data['lokasifile'] ?>" width="200px"> </th>
                                        <th><?php echo $data['deskripsifoto'] ?></th>
                                        <th><?php echo $data['tanggalunggah'] ?></th>
                                        <td>
                                            <a href="hapus_foto.php?fotoid=<?= $data['fotoid'] ?>" class="btn btn-outline-danger m-1">Hapus</a>

                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
            <footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
                <p>&copy; UKK RPL 2024 | Ahmad Sigit Purnomo </p>
            </footer>
</body>

</html>