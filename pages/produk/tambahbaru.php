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

        $filename = $_FILES["gambar"]["name"];
        $tempname = $_FILES["gambar"]["tmp_name"];    
        $folder = "image/".$filename;

        $tambahbaru = "INSERT INTO produk (idProduk, idType, nama, harga, stok, gambar) VALUES('$kodeproduk', '$kodetipe', '$nama', '$harga', '$jumlah', '$filename')";

        $query = mysqli_query($conn, $tambahbaru);

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