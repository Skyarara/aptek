<?php
    session_start();
    $data = $_SESSION['products'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="../csscheckout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body class="bg-light">
    <!-- As a link -->
    <div class="wrapper">
        <nav>
            <input type="checkbox" id="show-search">
            <input type="checkbox" id="show-menu">
            <label for="show-menu" class="menu-icon">
                <i class="fas fa-bars"></i>
            </label>
            <div class="content">
                <div class="logo mb-1">
                    <a href="#"><img src="../../logo_hewodoc.png" alt=""></a>
                </div>
                <ul class="links mt-3">
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#" class="desktop-link">Category</a>
                        <input type="checkbox" id="show-features">
                        <label for="show-features">Features</label>
                        <ul>
                            <li>
                                <a href="#">Obat Sakit Kepala</a>
                            </li>
                            <li>
                                <a href="#">Obat Sakit Kepala</a>
                            </li>
                            <li>
                                <a href="#">Obat Sakit Kepala</a>
                            </li>
                            <li>
                                <a href="#">Obat Sakit Kepala</a>
                            </li>
                            <li>
                                <a href="#">Obat Sakit Kepala</a>
                            </li>
                            <li>
                                <a href="#">Obat Sakit Kepala</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="boxContainer">
                    <table class="elementsContainer">
                        <input type="text" placeholder="Search" class="search">
                    </table>
                </div>
                <div class="feature">
                    <a href="#" style="color: #f2f2f2;">Login/Register</a>
                </div>
            </div>

        </nav>
    </div>

    <div class="container mt-5">
        <form action="aksiCheckout.php" method='POST'>
            <div class="row">
                <div class="col-7 align-self-start mr-5 py-2 bg-white rounded">
                    <div>
                        <h1>Checkout</h1>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Alamat Tujuan Pengiriman</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="alamat"
                            placeholder="Kota, Kecamatan, Jalan, Nomor Rumah" required="required">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Catatan</label>
                        <textarea class="form-control" id="exampleFormControlInput1" placeholder="Kirim sebelum hari"
                            name="catatan"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Metode Pembayaran</label>
                        <select class="form-control" id="exampleFormControlSelect1" disabled="disabled">
                            <option>Tunai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Metode Pengiriman</label>
                        <select class="form-control" id="exampleFormControlSelect1" disabled="disabled">
                            <option>COD</option>
                        </select>
                    </div>

                </div>
                <div id="cart" class="col align-self-center bg-white text-dark  rounded">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="h6 pt-3">Ringkasan Pembelian</div>
                    </div>
                    <?php 
                        $total = 0;
                        foreach ($data as $dt) :
                    ?>
                    <div class="d-flex jusitfy-content-between align-items-center pt-3 pb-2 border-bottom">
                        <div class="item pr-2">
                            <img src="<?= $dt['img'] ?>" alt="" width="80" height="80">
                        </div>
                        <div class="d-flex flex-column px-3">
                            <b class="h5"><?= $dt['nama'] ?></b>
                            <!-- <a href="#" class="h5 text-info">Kategori obat</a> -->
                        </div>
                        <div class="ml-auto">
                            <b class="h5"><?= $dt['qty'] ?>x</b>
                        </div>
                    </div>
                    <?php 
                        $total += (INT)$dt['harga'] * (INT)$dt['qty'];
                        endforeach; 
                    ?>
                    <div class="d-flex align-items-center py-2">
                        <div class="display-5">Harga Total</div>
                        <div class="ml-auto d-flex">
                            <div class="font-weight-bold">Rp. <?= number_format($total) ?></div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-lg btn-block mb-3">Konfirmasi Pesanan</button>
                </div>
        </form>
    </div>
    </div>

</body>

</html>