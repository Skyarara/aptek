<?php

require '../fungsiadmin.php';

?>

<?php
  $msg = "";
  // If upload button is clicked ...
  if (isset($_POST['hapus'])) {
        
    $kodeproduk = $_POST['idProduk'];

    $cekproduk = mysqli_query($conn, "SELECT * FROM produk WHERE idProduk='$kodeproduk'");
    $gambar = mysqli_query($conn, "SELECT gambar FROM produk WHERE idProduk='$kodeproduk'");
    $data = mysqli_fetch_array($gambar);

    $hapusgambar = "image/".$data['gambar'];
    
    $deleteproduk = mysqli_query($conn, "DELETE FROM produk WHERE idProduk='$kodeproduk'");
    

    if ($deleteproduk && unlink($hapusgambar))  {
      echo "<script type='text/javascript'>
      alert('data berhasil ditambah')
      window.location.href= '../dbAdmin.php'
      </script>";
    }else{
        $msg = "gagal.";
        echo mysqli_error($conn);
      exit;
    }
}
?>