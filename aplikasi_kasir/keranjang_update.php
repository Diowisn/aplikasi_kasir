<?php
include 'config.php';
session_start();
include 'authcheck_k.php';

$qty = $_POST['qty'];

foreach ($_SESSION['catr'] as $key => $value) {
    $_SESSION['catr'][$key]['qty'] = $qty[$key];
}
header("location:kasir.php");

?>

