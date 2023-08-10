<?php
include 'config.php';
session_start();
include 'authcheck_k.php';

if (isset($_POST['id_barang']))
{
    $id_barang = $_POST['id_barang'];
    $qty = $_POST['qty'];

    $data = mysqli_query($dbconnect, "SELECT * FROM barang WHERE id_barang='$id_barang'");

    $b = mysqli_fetch_assoc($data);

    $barang = [
        'id' => $b['id_barang'],
        'nama' => $b['nama'],
        'harga' => $b['harga'],
        'qty' => $qty
    ];

    $_SESSION['catr'][]=$barang;
    krsort($_SESSION['catr']);

    header("location:kasir.php");
}

?>