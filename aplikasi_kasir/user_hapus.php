<?php

include 'config.php';
session_start();
include 'authcheck.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    mysqli_query($dbconnect, "delete from 'user' where id_user='$id'");

    $_SESSION['success'] = 'Berhasil menghapus data!';

    header("location:user.php");
}
?>