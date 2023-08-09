<?php
include 'config.php';
session_start();
include 'authcheck_k.php';

$id = $_GET['id'];

$cart = $_SESSION['cart'];

// mengambil data secara spesifik
$k = array_filter($cart, function ($var) use ($id){
    return ($var['id']==$id);
});

foreach ($k as key => $value) {
    unset($_SESSION['cart'][$key]);
}

// untuk mengembalikan urutan dari data
$_SESSION['cart'] = array_values($_SESSION['cart']);
header("location:kasir.php");

?>