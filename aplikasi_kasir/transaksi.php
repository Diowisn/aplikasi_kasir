<?php
include 'config.php';
session_start();
// include 'authcheck_k.php';

// menghilangkankan Rp. pada nominal 
$bayar = preg_replace('/\D/', '', $_POST['uang']);

$tanggal_waktu = date('Y-m-d H:i:s');
$nomor = rand(111111,999999);
$total = $_POST['total'];
$kembali = $bayar-$total;

// INSERT ke tabel transaksi
mysqli_query($dbconnect, "INSERT into transaksi (
    id_transaksi, tanggal_waktu, nomor, total, nama, uang, kembali) values (null, '$tanggal_waktu', '$nomor', '$total', '$kembali')");

// mendapatkan id transaksi baru
$id_transaksi = mysqli_INSERT_id($dbconnect);

// INSERT ke detail transsaksi
foreach ($_SESSION['catr'] as $key => $value) {
    
    $id_barang = $value['id'];
    $harga = $value['harga'];
    $qty = $value['qty'];
    $tot = $harga*$qty;

    mysqli_query($dbconnect, "INSERT into transaksi_detail (
        id_transaksi_detail, id_transaksi, id_barang, harga, qty, total) values (null, '$id_transaksi', '$id_barang', $harga', '$qty', '$tot')");

}

header("location:transaksi_selesai.php?idtrx=".$id_transaksi);

?>