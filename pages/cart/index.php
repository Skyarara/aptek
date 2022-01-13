<?php
    require_once '../fungsiadmin.php';
    if(isset($_SESSION['products']) && isset($_GET['reset'])){
        unset($_SESSION["products"]);
        echo '<script>window.location.href = "index.php"</script>';
    }elseif(isset($_GET['reset'])){
        echo '<script>window.location.href = "index.php"</script>';
    }elseif(isset($_SESSION['products'])){
        echo'
            <script>
                if (confirm("Produk dalam keranjang akan terhapus") == true){
                    document.location.search = "reset=yes";
                }else{ 
                    window.location.href = "../checkout.php";
                }
            </script> ';
    }
    $sql = "SELECT * FROM produk";
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
                    <li><a href="index.php">Beranda</a></li>
                    <li>
                        <a href="#" class="desktop-link">Kategori</a>
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
                        <input type="text" placeholder="Cari" class="search" onkeyup="search(this)">
                    </table>
                </div>
                <div class="feature">
                    <a href="../logout.php" style="color: #f2f2f2;">Logout</a>
                </div>
            </div>
        </nav>
    </div>

    <section class="container content-section">
        <h2 class="section-header" style="font-family: 'Poppins', sans-serif; font-weight: 600;">Daftar Obat</h2>
        <div class="shop-items" id='shop-items'>
            <?php while($data = mysqli_fetch_assoc($query)): ?>
            <div class="shop-item" data-name='<?= $data['nama'] ?>' data-kategori='<?= $data['idType'] ?>'>
                <span class="shop-item-title"><?= $data['nama'] ?></span>
                <a class="shop-item-id" hidden><?= $data['idProduk'] ?></a>
                <img class="shop-item-image" src="../produk/image/<?= $data['gambar']?>">
                <div class="shop-item-details">
                    <span class="shop-item-price">Rp<?= $data['harga'] ?></span>
                    <a class="shop-item-real_price" hidden><?= $data['harga'] ?></a>
                    <button class="btn btn-primary shop-item-button" type="button">TAMBAH</button>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </section>
    <section class="container content-section">
        <h2 class="section-header" style="font-family: 'Poppins', sans-serif; font-weight: 600;">KERANJANG</h2>
        <div class="cart-row">
            <span class="cart-item cart-header cart-column">BARANG</span>
            <span class="cart-price cart-header cart-column">HARGA</span>
            <span class="cart-quantity cart-header cart-column">JUMLAH</span>
        </div>
        <form action="aksiCheckout.php" method="POST">
            <div class="cart-items">

            </div>
            <div class="cart-total">
                <strong class="cart-total-title">Total</strong>
                <span class="cart-total-price">Rp0</span>
            </div>
            <button class="btn btn-primary btn-purchase" type="submit">CHECKOUT</button>
        </form>
    </section>
</body>

</html> 