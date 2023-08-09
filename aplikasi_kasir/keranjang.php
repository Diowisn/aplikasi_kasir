<?php
include 'config.php';
session_start();
include 'authcheck_k.php';

if (isset($_POST['id_barang']))
{
    $id_barang = $_POST['id_barang'];
    $qty = $_POST['qty'];

    $data = mysqli_query($dbconnect, "select * from barang where id_barang='$id_barang'");

    $b = mysqli_fecth_assoc($data);

    $barang = [
        'id' => $b['id_barang'],
        'nama' => $b['nama'],
        'harga' => $b['harga'],
        'qty' => $qty
    ];

    $_SESSION['cart'][]=$barang;
    krsort($_SESSION['cart']);

    header("location:kasir.php");
}

?>