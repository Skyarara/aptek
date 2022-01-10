<?php
    require_once '../fungsiadmin.php';
    
    // // Tidak ada kategori
    // if(isset($_GET['jenis']) == NULL){
        $sql = "SELECT * FROM produk";
    // // Sakit kepala
    // }else if($_GET['jenis'] == 0){
    //     $sql = "SELECT * FROM produk WHERE idType = 'K01'";
    // // Batuk pilek
    // }else if($_GET['jenis'] == 1){
    //     $sql = "SELECT * FROM produk WHERE idType = 'K02'";            
    // // Sakit Perut
    // }else if($_GET['jenis'] == 2){
    //     $sql = "SELECT * FROM produk WHERE idType = 'K03'";
    // // Obat Oles
    // }else if($_GET['jenis'] == 3){
    //     $sql = "SELECT * FROM produk WHERE idType = 'K04'";
    // // Obat anak anak
    // }else if($_GET['jenis'] == 4){
    //     $sql = "SELECT * FROM produk WHERE idType = 'K05'";
    // //Pereda rasa sakit
    // }else if($_GET['jenis'] == 5){
    //     $sql = "SELECT * FROM produk WHERE idType = 'K06'";
    // }
    $query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
    <link rel="stylesheet" href="cart(2).css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="cart.css">
    <script src="cart.js" async></script>
</head>

<body>
    <div class="wrapper">
        <nav>
            <input type="checkbox" id="show-search">
            <input type="checkbox" id="show-menu">
            <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
            <div class="content">
                <div class="logo"><a href="#"><img src="../../logo_hewodoc.png" alt=""></a></div>
                <ul class="links">
                    <li><a href="../../landing_page.php">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li>
                        <a href="#" class="desktop-link">Category</a>
                        <input type="checkbox" id="show-features">
                        <label for="show-features">Features</label>
                        <ul>
                            <!-- <li><a href="index.php?jenis=0">Obat Sakit Kepala</a></li>
                            <li><a href="index.php?jenis=1">Obat Batuk Pilek</a></li>
                            <li><a href="index.php?jenis=2">Obat Sakit Perut</a></li>
                            <li><a href="index.php?jenis=3">Obat Oles</a></li>
                            <li><a href="index.php?jenis=4">Obat Anak - Anak</a></li>
                            <li><a href="index.php?jenis=5">Obat Pereda rasa sakit</a></li> -->
                            <li onclick="kategori('K01')"><a>Obat Sakit Kepala</a></li>
                            <li onclick="kategori('K02')"><a>Obat Batuk Pilek</a></li>
                            <li onclick="kategori('K03')"><a>Obat Sakit Perut</a></li>
                            <li onclick="kategori('K04')"><a>Obat Oles</a></li>
                            <li onclick="kategori('K05')"><a>Obat Anak - Anak</a></li>
                            <li onclick="kategori('K06')"><a>Obat Pereda rasa sakit</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="boxContainer">
                    <table class="elementsContainer">
                        <input type="text" placeholder="Search" class="search" onkeyup="search(this)">
                    </table>
                </div>
                <div class="feature">
                    <a href="../logout.php">Logout</a>
                </div>
            </div>
        </nav>
    </div>
    <?php 
        $id = $_GET['jenis'];
    ?>
    <section class="container content-section">
        <?php if(!isset($_GET['jenis'])){ ?>
        <h2 class="section-header">Daftar Obat</h2>
        <?php } else if($id == 0) { ?>
        <h2 class="section-header">Obat Sakit Kepala</h2>
        <?php } else if($id == 1) { ?>
        <h2 class="section-header">Obat Batuk Pilek</h2>
        <?php } else if($id == 2) { ?>
        <h2 class="section-header">Obat Sakit Perut</h2>
        <?php } else if($id == 3) { ?>
        <h2 class="section-header">Obat Oles</h2>
        <?php } else if($id == 4) { ?>
        <h2 class="section-header">Obat Anak - Anak</h2>
        <?php } else if($id == 5) { ?>
        <h2 class="section-header">Obat Pereda Rasa Sakit</h2>
        <?php } ?>
        <div class="shop-items" id='shop-items'>
            <?php while($data = mysqli_fetch_assoc($query)): ?>
            <div class="shop-item" data-name='<?= $data['nama'] ?>' data-kategori='<?= $data['idType'] ?>'>
                <span class="shop-item-title"><?= $data['nama'] ?></span>
                <a class="shop-item-id" hidden><?= $data['idProduk'] ?></a>
                <img class="shop-item-image" src="../produk/image/<?= $data['gambar']?>">
                <div class="shop-item-details">
                    <span class="shop-item-price">Rp<?= $data['harga'] ?></span>
                    <a class="shop-item-real_price" hidden><?= $data['harga'] ?></a>
                    <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </section>
    <section class="container content-section">
        <h2 class="section-header">CART</h2>
        <div class="cart-row">
            <span class="cart-item cart-header cart-column">ITEM</span>
            <span class="cart-price cart-header cart-column">PRICE</span>
            <span class="cart-quantity cart-header cart-column">QUANTITY</span>
        </div>
        <form action="aksiCheckout.php" method="POST">
            <div class="cart-items">

            </div>
            <div class="cart-total">
                <strong class="cart-total-title">Total</strong>
                <span class="cart-total-price">Rp0</span>
            </div>
            <button class="btn btn-primary btn-purchase" type="submit">PURCHASE</button>
        </form>
    </section>
</body>

</html>