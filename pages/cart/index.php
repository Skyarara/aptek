<?php
    require_once '../fungsiadmin.php';
    $sql = "SELECT * FROM produk";
    $query = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
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
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li>
                        <a href="#" class="desktop-link">Category</a>
                        <input type="checkbox" id="show-features">
                        <label for="show-features">Features</label>
                        <ul>
                            <li><a href="#">Obat Sakit Kepala</a></li>
                            <li><a href="#">Obat Sakit Kepala</a></li>
                            <li><a href="#">Obat Sakit Kepala</a></li>
                            <li><a href="#">Obat Sakit Kepala</a></li>
                            <li><a href="#">Obat Sakit Kepala</a></li>
                            <li><a href="#">Obat Sakit Kepala</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="boxContainer">
                    <table class="elementsContainer">
                        <input type="text" placeholder="Search" class="search" onkeyup="search(this)">
                    </table>
                </div>
                <div class="feature">
                    <a href="#">Login/Register</a>
                </div>
            </div>
        </nav>
    </div>

    <section class="container content-section">
        <h2 class="section-header">Obat Sakit Kepala</h2>
        <div class="shop-items" id='shop-items'>
            <?php while($data = mysqli_fetch_assoc($query)): ?>
            <div class="shop-item" data-name='<?= $data['nama'] ?>'>
                <span class="shop-item-title"><?= $data['nama'] ?></span>
                <img class="shop-item-image" src="paracetamol.jpg">
                <div class="shop-item-details">
                    <span class="shop-item-price">Rp. <?= number_format($data['harga']) ?></span>
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
        <div class="cart-items">
        </div>
        <div class="cart-total">
            <strong class="cart-total-title">Total</strong>
            <span class="cart-total-price">Rp0</span>
        </div>
        <button class="btn btn-primary btn-purchase" type="button">PURCHASE</button>
    </section>
</body>

</html>