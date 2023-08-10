<?php
include 'config.php';
// session_start();
include 'authcheck.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Kasir</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
    <div>
        <h1>SELAMAT DATANG</h1>
        <a href="barang.php">Barang</a> | 
        <a href="role.php">Role</a> | 
        <a href="user.php">User</a> | 
        <a href="logout.php">Log out</a> | 
    </div>
</body>
</html>