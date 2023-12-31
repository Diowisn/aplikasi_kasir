<?php
include 'config.php';
session_start();
// include 'authcheck.php';

$view = $dbconnect->query("SELECT * FROM barang");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
    <div class="container">

        <?php if (isset($_SESSION['success']) && $_SESSION['success'] !='') {?>

            <div class="alert alert-success" role="alert">
                <?=$_SESSION['success']?>
            </div>

        <?php
            } 
            $_SESSION['success'] = '';
        ?>

        <h1>List Barang</h1>
        <a href="barang_add.php" class="btn btn-primary">Tambah Data</a>
        <table class="table table-bordered">
            <tr>
                <th>ID Barang</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
            <?php

            while ($row = $view->fetch_array()) { ?>

                <tr>
                    <td> <?= $row['id_barang'] ?> </td>
                    <td> <?= $row['nama'] ?> </td>
                    <td> <?= $row['harga'] ?> </td>
                    <td> <?= $row['jumlah'] ?> </td>
                    <td>
                        <a href="barang_edit.php?id=<?=$row['id_barang']?>">Edit</a> | 
                        <a href="barang_hapus.php?id=<?=$row['id_barang']?>" onclick="return confirm('Apakah anda yakin untuk menghapus?')">Hapus</a>
                    </td>
                </tr>
            <?php }
            ?>
            <a href="index.php"><button class="btn btn-primary">Kembali</button></a>
        </table>
    </div>
</body>
</html>