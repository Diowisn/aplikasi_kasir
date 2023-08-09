<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "aplikasi_kasir";

$dbconnect = new mysql ("$host", "$user", "$pass", "$db");

if($dbconnect -> connect_error)
{
    echo "Koneksi gagal -> " $dbconnect->connect_error;
}
?>