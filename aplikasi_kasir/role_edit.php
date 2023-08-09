<?php

include 'config.php';
session_start();
include 'authcheck.php';

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama']; 
    
    // menyimpan data
    mysqli_query($dbconnect, "update role set nama='$nama where id_barang='$id'");

    $_SESSION['success'] = 'Berhasil memperbaharui data!';

    // kembali ke list barang 
    header("location: role.php");

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
        <h1>Perbaruhi Barang</h1>
        <form action="post">
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
            <a href="/barang.php" class="btn btn-warning">Kembali</a>
        </form>        
    </div>
</body>
</html>