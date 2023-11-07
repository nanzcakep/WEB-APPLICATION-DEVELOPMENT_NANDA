<?php
$conn = mysqli_connect('localhost', 'root', '', 'db_toko_bekas');
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Mendeklarasikan variabel $id
$id = $_GET['id'];

// Melakukan query untuk mengambil data barang berdasarkan ID
$query = "SELECT * FROM barang_bekas WHERE id = $id";
$result = mysqli_query($conn, $query);

$barang = mysqli_fetch_assoc($result);
if (isset($_POST['update'])) {
    $nama_barang = $_POST['nama_barang'];
    $deskripsi = $_POST['deskripsi'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $kondisi = $_POST['kondisi'];
    $kontak_penjual = $_POST['kontak_penjual'];
    $gambar_url = $_POST['gambar_url'];

    $updateQuery = "UPDATE barang_bekas SET 
                    nama_barang = '$nama_barang',
                    deskripsi = '$deskripsi',
                    kategori = '$kategori',
                    harga = $harga,
                    kondisi = '$kondisi',
                    kontak_penjual = '$kontak_penjual',
                    gambar_url = '$gambar_url'
                    WHERE id = $id";

    if (mysqli_query($conn, $updateQuery)) {
        echo "
            <script>
                alert('Data berhasil diubah !');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diubah ! silahkan ulangi');
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
    <h1 class="text-center">Update Barang Bekas</h1>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"><?= $barang['deskripsi'] ?></textarea>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="nama_barang">Nama</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $barang['nama_barang'] ?>" required>
                </div>
                <div class="col">
                    <label for="kategori">Kategori</label>
                    <input type="text" class="form-control" id="kategori" name="kategori" value="<?= $barang['kategori'] ?>" required>
                </div>
                <div class="col">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" value="<?= $barang['harga'] ?>" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="kondisi">Kondisi</label>
                    <input type="text" class="form-control" id="kondisi" name="kondisi" value="<?= $barang['kondisi'] ?>" required>
                </div>
                <div class="col">
                    <label for="kontak_penjual">Kontak Penjual</label>
                    <input type="text" class="form-control" id="kontak_penjual" name="kontak_penjual" value="<?= $barang['kontak_penjual'] ?>" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="gambar_url">Gambar URL</label>
            <input type="text" class="form-control" id="gambar_url" name="gambar_url" value="<?= $barang['gambar_url'] ?>">
        </div>
        <button type="submit" name="update" class="btn btn-primary" onclick="return confirm('Apakah Anda yakin ingin mengubah barang ini?')">Update Barang</button>
    </form>
</div>


    
</body>
</html>