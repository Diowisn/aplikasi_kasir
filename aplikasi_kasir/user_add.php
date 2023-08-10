<?php

include 'config.php';
// session_start();
// include 'authcheck.php';

$role = mysqli_query($dbconnect, "SELECT * FROM jabatan");

if (isset($_POST['simpan'])) {

    $nama = $_POST['nama']; 
    $username = $_POST['username']; 
    $password = $_POST['sandi'];
    $role_id = $_POST['role_id'];
    
    // menyimpan data
    mysqli_query($dbconnect, "INSERT INTO user VALUES ('', '$nama', '$username', '$password', '$role_id')");

    $_SESSION['success'] = 'Berhasil menambahkan data!';

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
                <input type="text" name="nama" class="form-control" placeholder="Nama">
            </div>
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="">password</label>
                <input type="text" name="password" class="form-control" placeholder="password">
            </div>
            <div class="form-group">
                <label for="">Role Akses</label>
                <select name="role_id" class="form-control">
                    <option value="">Pilih Role Akses</option>

                <?php while ($row = mysqli_fetch_array($role)) {?>
                    <option value="<?=$row['id_role']?>"><?=$row['nama']?></option>
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