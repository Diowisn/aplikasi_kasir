<?php

include 'config.php';
session_start();
include 'authcheck.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    mysqli_query($dbconnect, "delete from 'barang' where id_barang='$id'");

    header("location:barang.php");
}
?>