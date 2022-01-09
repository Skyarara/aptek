<?php
require_once 'fungsiadmin.php';

    $id_user = $_SESSION['id_user'];
    $date = date("Y-m-d");
    $total = $_POST['total'];
    $note = $_POST['note'];
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO transaksikeluar VALUES('', '$id_user', '$date', '$total', '$note', '$alamat')";
    $query = mysqli_query($conn, $sql);
    
    if(!$query){
        echo mysqli_error($conn);
        exit;
    }
    $id_transaksi = mysqli_insert_id($conn);
    $sql2 = "INSERT INTO detailkeluar VALUES ";
    $data = $_SESSION['products'];

    foreach ($data as $dt) {
        $produk = $dt['id'];
        $qty = $dt['qty'];
        $sql2 .= "('$id_transaksi', '$produk', '$qty'),";
    }
    $a = substr($sql2, 0, strlen($sql2) - 1).";";
    // var_dump($a);
    $query2 = mysqli_query($conn, $a);

    if(!$query2){
        echo mysqli_error($conn);
        exit;
    }

    unset($_SESSION["products"]);
    echo "<script>
            alert('Transaksi Berhasil');
            window.location = 'cart/index.php';
        </script>";