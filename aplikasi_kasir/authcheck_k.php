<?php
// session_start();

if (isset($_SESSION['userid'])) 
{
    if ($_SESSION['role_id']==1)
    {
        // redirect ke halaman kasir
        header("location:index.php");
    }
}else{
    $_SESSION['error'] = 'Anda harus login dahulu!';
    header("location:login.php");
}

?>