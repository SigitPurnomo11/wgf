<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Foto</title>
</head>

<body>
    <form action="update_foto" method="POST" enctype="multipart/form-data">
        <?php
        include 'koneksi.php';
        $fotoid = $_GET['$fotoid'];
        $sql = mysqli_query($koneksi, "SELECT * FROM foto WHERE fotoid='$fotoid'");
        while ($data = mysqli_fetch_array($sql)) {
        }
        ?>
        <input type="text" name="fotoid" value="<?= $data['fotoid'] ?>" hidden>
        <div class="card-body">
            <form action="../config/aksi_foto.php" method="POST" enctype="multipart/form-data">
                <label class="form-label">Judul Foto</label>
                <input type="text" name="judulfoto" class="form-control" required>
                <label class="form-label">Deskripsi</label>
                <input type="text" name="deskripsifoto" class="form-control" required>
                <label class="form-label">Lokasi File</label>
                <input type="file" name="lokasifile" class="form-control" required>

                <label class="form-label">Album</label>
                <input type="submit" class="btn btn-primary mt-2" name="ubah">
            </form>
        </div>
    </form>
</body>

</html>