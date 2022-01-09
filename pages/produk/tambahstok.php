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

        $updatestok = mysqli_query($conn, "UPDATE produk SET stok='$tambahstok' WHERE idProduk='$kodeproduk'");

        if ($updatestok)  {
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