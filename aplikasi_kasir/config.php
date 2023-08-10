<?php
$localhost = "localhost";
$username = "root";
$pass = "";
$database = "aplikasi_kasir";

$dbconnect = new mysqli ("$localhost", "$username", "$pass", "$database");

if(mysqli_connect_errno()) {

    echo "Koneksi gagal -> " . mysqli_connect_errno();
}

?>