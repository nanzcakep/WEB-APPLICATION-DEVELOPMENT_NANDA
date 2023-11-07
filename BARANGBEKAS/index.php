<?php
$conn = mysqli_connect('localhost','root','','db_toko_bekas');
$result = mysqli_query($conn,'SELECT * FROM barang_bekas');

if(isset($_POST['tambah'])){
    $nama_barang = $_POST['nama_barang'];
    $deskripsi = $_POST['deskripsi'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $kondisi = $_POST['kondisi'];
    $gambar_url = $_POST['gambar_url'];
    $kontak_penjual = $_POST['kontak_penjual'];

    // Selanjutnya, Anda dapat memasukkan data ini ke dalam database menggunakan query SQL
    // Pastikan Anda sudah membuat koneksi ke database sebelumnya
    $sql = "INSERT INTO barang_bekas (nama_barang, deskripsi, kategori, harga, kondisi, gambar_url, kontak_penjual) 
            VALUES ('$nama_barang', '$deskripsi', '$kategori', $harga, '$kondisi', '$gambar_url', '$kontak_penjual')";

    // Lakukan eksekusi query dan periksa apakah berhasil atau tidak
    if (mysqli_query($conn, $sql)) {
        echo "
            <script>
                alert('Data berhasil ditambahkan !');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambahkan ! Silahkan coba lagi.');
                document.location.href = 'index.php';
            </script>
        ";
    }

}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $deleteQuery = mysqli_query($conn, "DELETE FROM barang_bekas WHERE id = $id");
    if ($deleteQuery) {
        echo "
            <script>
                alert('Data berhasil dihapus!');
                window.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal dihapus. Silakan ulangi.');
                window.location.href = 'index.php';
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang bekas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<div class="container mt-4">
    <h1 class="text-center">Unggah Barang Bekas</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"></textarea>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="nama_barang">Nama</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
                </div>
                <div class="col">
                    <label for="kategori">Kategori</label>
                    <input type="text" class="form-control" id="kategori" name="kategori" required>
                </div>
                <div class="col">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="kondisi">Kondisi</label>
                    <input type="text" class="form-control" id="kondisi" name="kondisi" required>
                </div>
                <div class="col">
                    <label for="kontak_penjual">Kontak Penjual</label>
                    <input type="text" class="form-control" id="kontak_penjual" name="kontak_penjual" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="gambar_url">URL Gambar</label>
            <input type="text" class="form-control" id="gambar_url" name="gambar_url">
        </div>
        <button type="submit" name="tambah" class="btn btn-primary" onclick="return confirm('Apakah Anda yakin ingin mengunggah barang ini?')">Unggah Barang</button>
    </form>
</div>


<div class="container mt-4">
    <h1 class="text-center">Daftar Barang Bekas</h1>

    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="col-md-4">
                <div class="card">
                    <img src="<?php echo $row['gambar']; ?>" class="card-img-top" alt="Barang">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['nama_barang']; ?></h5>
                        <p class="card-text"><?php echo $row['deskripsi']; ?></p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Kategori: <?php echo $row['kategori']; ?></li>
                            <li class="list-group-item">Harga: Rp <?php echo $row['harga']; ?></li>
                            <li class="list-group-item">Kondisi: <?php echo $row['kondisi']; ?></li>
                            <li class="list-group-item">
                                <a href="update.php?id=<?= $row['id']; ?>" class="btn btn-primary">Update</a>
                                <a href="index.php?delete=<?= $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus postingan ini?')">Delete</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        Penjual: <?php echo $row['penjual']; ?> (<?php echo $row['kontak_penjual']; ?>)
                        Posting: <?php echo $row['penjual']; ?> <?php echo $row['tgl_posting']; ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.2/dist/js/bootstrap.min.js"></script>
</body>
</html>