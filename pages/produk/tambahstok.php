<?php

require '../fungsiadmin.php';

?>

<?php
  $msg = "";
  // If upload button is clicked ...
    if (isset($_POST['tambah'])) {
        
        $kodeproduk = $_POST['idProduk'];
        $jumlah = $_POST['stok'];

        $cekstok = mysqli_query($conn, "SELECT stok FROM produk WHERE idProduk='$kodeproduk'");
        $ambil = mysqli_fetch_array($cekstok);

        $stoksekarang = $ambil['stok'];
        $tambahstok = $stoksekarang + $jumlah;

        $supplier = $_POST['supplier'];
        $idAdmin = $_SESSION['id'];

        $updatestok = mysqli_query($conn, "UPDATE produk SET stok='$tambahstok' WHERE idProduk='$kodeproduk'");
        if(!isset($_SESSION['idtransaksi'])){
          $transmasuk = mysqli_query($conn,"INSERT INTO transaksimasuk (idTransaksiMasuk, idSupplier, idAdmin) VALUES('','$supplier','$idAdmin' )");
          $idmasuk = mysqli_insert_id($conn);
          $_SESSION['idtransaksi'] = $idmasuk;
        }
        
        $idmasuk = $_SESSION['idtransaksi'];
        
        $detailmasuk = mysqli_query($conn,"INSERT INTO detailmasuk (idTransaksiMasuk, idProduk, jumlahBarang) VALUES('$idmasuk', '$kodeproduk','$jumlah')");



        if ($detailmasuk)  {
          echo "<script type='text/javascript'>
          alert('data berhasil ditambah')
          window.location.href= '../dbAdmin.php'
          </script>";
        }else{
            $msg = "Failed to upload image";
            echo mysqli_error($conn);
          exit;
        }
    }
?>