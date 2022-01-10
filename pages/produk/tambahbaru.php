<?php

require '../fungsiadmin.php';

?>
<?php
  $msg = "";
  // If upload button is clicked ...
    if (isset($_POST['tambah'])) {

        $kodeproduk = $_POST['idProduk'];
        $kodetipe = $_POST['idType'];
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $jumlah = $_POST['stok'];
        $supplier = $_POST['supplier'];

        $filename = $_FILES["gambar"]["name"];
        $tempname = $_FILES["gambar"]["tmp_name"];    
        $folder = "image/".$filename;

        $idAdmin = $_SESSION['id'];

        $tambahbaru = "INSERT INTO produk (idProduk, idType, nama, harga, stok, gambar) VALUES('$kodeproduk', '$kodetipe', '$nama', '$harga', '$jumlah', '$filename')";
        $query = mysqli_query($conn, $tambahbaru);

        if(!isset($_SESSION['idtransaksi'])){
          $transmasuk = mysqli_query($conn,"INSERT INTO transaksimasuk (idTransaksiMasuk, idSupplier, idAdmin) VALUES('','$supplier','$idAdmin' )");
          $idmasuk = mysqli_insert_id($conn);
          $_SESSION['idtransaksi'] = $idmasuk;
        }

        $idmasuk = $_SESSION['idtransaksi'];

        $detailmasuk = mysqli_query($conn,"INSERT INTO detailmasuk (idTransaksiMasuk, idProduk, jumlahBarang) VALUES('$idmasuk', '$kodeproduk','$jumlah')");

        

        if (move_uploaded_file($tempname, $folder))  {
          $msg = "Image uploaded successfully";
          header('location: ../dbAdmin.php');
        }else{
            $msg = "Failed to upload image";
            echo mysqli_error($conn);
          exit;
        }
    }
?>