<?php

require '../fungsiadmin.php';

$kode = $_POST['kode'];
$nama = $_POST['nama'];

$sql = "INSERT INTO typeproduk VALUES('$kode', '$nama')";
$query = mysqli_query($conn, $sql);

header("Location: index.php");