<?php
include 'config.php';
session_start();
include 'authcheck-k.php';

// menghilangkankan Rp. pada nominal 
$bayar = preg_replace('/\D/', '', $_POST['bayar']);

$tanggal_waktu = date('Y-m-d H:i:s');
$nomor = rand(111111,999999);
$total = $_POST['total'];
$kembali = $bayar - $total;

// insert ke tabel transaksi
mysqli_query($dbconnect, "insert into transaksi (
    id_transaksi, tanggal_waktu, nomor, total, nama, bayar, kembali) values (null, '$tanggal_waktu', '$nomor', '$total', '$kembali')");

// mendapatkan id transaksi baru
$id_transaksi = mysqli_insert_id($dbconnect);

// insert ke detail transsaksi
foreach ($_SESSION['cart'] as $key => $value) {
    
    $id_barang = $value['id'];
    $harga = $value['harga'];
    $qty = $value['qty'];
    $tot = $harga*$qty;

    mysqli_query($dbconnect, "insert into transaksi_detail (
        id_transaksi_detail, id_transaksi, id_barang, harga, qty, total) values (null, '$id_transaksi', '$id_barang', $harga', '$qty', '$tot')");

}

header("location:transaksi_selesai.php?idtrx=".$id_transaksi);

?>