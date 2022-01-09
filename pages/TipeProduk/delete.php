<?php

require '../fungsiadmin.php';

$id = $_GET['id'];

$sql = "DELETE FROM typeproduk WHERE idType='$id'";
$query = mysqli_query($conn, $sql);

echo   "<script type='text/javascript'>
        alert('data berhasil dihapus')
        window.location.href= 'index.php'
        </script>";