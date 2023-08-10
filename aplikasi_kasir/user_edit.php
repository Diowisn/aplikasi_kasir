<?php

include 'config.php';
// session_start();
// include 'authcheck.php';

$role = mysqli_query($dbconnect, "SELECT * FROM jabatan");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // menampilkan data berdasarkan id 
    $data = mysqli_query($dbconnect, "SELECT * FROM user WHERE id_user= '$id'");
    $data = mysqli_fetch_assoc($data);
}

if (isset($_POST['UPDATE'])) {

    $id = $_GET['id'];

    $nama = $_POST['nama']; 
    $username = $_POST['username']; 
    $password = $_POST['sandi'];
    $role_id = $_POST['role_id'];
    
    // menyimpan data
    mysqli_query($dbconnect, "UPDATE user SET nama='$nama', username='$username', sandi='$password', role_id='$role_id' WHERE id_user='$id'");

    $_SESSION['success'] = 'Berhasil memperbaharui data!';

    // kembali ke list barang 
    header("location: user.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <h1>Tambah User</h1>
        <form method="post">
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?=$data['nama']?>">
            </div>
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Username" value="<?=$data['username']?>">
            </div>
            <div class="form-group">
                <label for="">password</label>
                <input type="text" name="sandi" class="form-control" placeholder="password" value="<?=$data['sandi']?>">
            </div>
            <div class="form-group">
                <label for="">Role Akses</label>
                <select name="role_id" class="form-control">
                    <option value="">Pilih Role Akses</option>

                    <?php while ($row = mysqli_fetch_array($role)) {?>
                        <option value="<?=$row['id_role']?>"> <?=$row['id_role']==$data['role_id']?'selected':''?><?=$row['nama']?></option>
                        <?php
                    } ?>

                </select>
            </div>

            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
            <a href="user.php" class="btn btn-warning">Kembali</a>
        </form>        
    </div>
</body>
</html>