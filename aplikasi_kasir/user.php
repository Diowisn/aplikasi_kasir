<?php

include 'config.php';
session_start();
include 'authcheck.php';

$view = $dbconnect->query("select u.*, r.nama as nama_role from user as u inner join role as r on u.role_id = r.id_role");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List User</title>
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

        <h1>List User</h1>
        <a href="/user_add.php" claass="btn btn-primary">Tambah Data</a>
        <table class="table table-bordered">
            <tr>
                <th>ID User</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Password</th>
                <th>Role Akses</th>
                <th>Aksi</th>
            </tr>
            <?php

            while ($row = $view->fecth_array()) { ?>
            
            <tr>
                <td> <?= $row['id_user'] ?> </td>
                <td> <?= $row['nama'] ?> </td>
                <td> <?= $row['username'] ?> </td>
                <td> <?= $row['password'] ?> </td>
                <td> <?= $row['nama_role'] ?> </td>
                <td>
                    <a href="/user_edit.php?id=<?=$row['id_user']?>">Edit</a> | 
                    <a href="/user_hapus.php?id=<?=$row['id_user']?>" onclick="return confirm('Apakah anda yakin untuk menghapus?')">Hapus</a>
                </td>
            </tr>

            <?php
            }
            ?>

        </table>
    </div>
</body>
</html>