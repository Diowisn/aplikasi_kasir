<?php
include 'config.php';
session_start();
include 'authcheck_k.php';

$id = $_GET['id'];

$catr = $_SESSION['catr'];

// mengambil data secara spesifik
$k = array_filter($catr, function ($var) use ($id){
    return ($var['id']==$id);
});

foreach ($k as $key => $value) {
    unset($_SESSION['catr'][$key]);
}

// untuk mengembalikan urutan dari data
$_SESSION['catr'] = array_values($_SESSION['catr']);
header("location:kasir.php");

?>