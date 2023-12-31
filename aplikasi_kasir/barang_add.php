<?php
include 'config.php';
// session_start();
// include 'authcheck.php';

if (isset($_POST['simpan'])) {

    $nama = $_POST['nama']; 
    $harga = $_POST['harga']; 
    $jumlah = $_POST['jumlah'];
    
    // menyimpan data
    mysqli_query($dbconnect, "INSERT INTO barang VALUES ('', '$nama', '$harga', '$jumlah')");

    $_SESSION['success'] = 'Berhasil menambahkan barang!';

    // kembali ke list barang 
    header("location: barang.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <h1>Tambah Barang</h1>
        <form method="POST">
            <div class="form-group">
                <label for="">Nama Barang</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Barang">
            </div>
            <div class="form-group">
                <label for="">Harga</label>
                <input type="number" name="harga" class="form-control" placeholder="Harga Barang">
            </div>
            <div class="form-group">
                <label for="">Jumlah Stock</label>
                <input type="number" name="jumlah" class="form-control" placeholder="Jumlah Stock">
            </div>

            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
            <a href="barang.php" class="btn btn-warning">Kembali</a>
        </form>        
    </div>
</body>
</html>