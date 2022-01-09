<?php

session_start();
// unset($_SESSION["products"]);

$nama = $_POST['nama'];
$id = $_POST['id'];
$qty = $_POST['qty'];
$harga = $_POST['harga'];
$img = $_POST['img'];

foreach ($_POST['qty'] as $key => $value) {
    $_SESSION['products'][] = [
        'id'    =>  $id[$key],
        'nama'  =>  $nama[$key],
        'qty'   =>  $value,
        'harga' => $harga[$key],
        'img' => $img[$key],
    ];
}

$data = $_SESSION['products'];


// foreach ($data as $dt) {
    // echo $dt['id'].$dt['nama']."<br>";
//     foreach($dt as $key => $value) {
//         echo "<br>$key : $value<br>";
//     }
// }

// unset($_SESSION["products"]);
// exit;
header("Location: ../checkout.php");