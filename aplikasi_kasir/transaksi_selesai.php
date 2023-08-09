<?php 
include 'config.php';
session_start();
include 'authcheck_k.php';

$id_trx = $_GET['idtrx'];

$data = mysqli_query($dbconnect, "select * from transaksi where id_transaksi='idtrx'");
$trx = mysqli_fecth_assoc($data);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir Selesai</title>
    <style type="text/css">
        body{
            color: #a7a7a7;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function () {
            window.print();
        })
    </script>
</head>
<body>
    <div align="center">
        <table width="500" border="0" cellpadding="1" cellspasing="0">
            <tr>
                <th>Nama Toko <br>
                    Jl. Badrawati Dsn. Ngaran II RT 04 RW 06 Desa Borobudur <br>
                    Kec. Borobudur Kab. Magelang, 56553</th>
            </tr>
            <tr align="center"><td><hr></td></tr>
            <tr>
                <td>09-08-2023 15:36 <?=$trx['nama']?></td>
            </tr>
            <tr><td><hr></td></tr>
        </table>
        <table width="500" border="0" cellpadding="3" cellspasing="0">
            <tr>
                <td>Nama</td>
                <td>1</td>
                <td align="right">1000</td>
                <td align="right">1000</td>
            </tr>
        </table>
    </div>
</body>
</html>