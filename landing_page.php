<?php
session_start();
    if (isset($_SESSION['nama'])) 
    {
        echo "";  
    }
    else if (!isset ($_SESSION['nama'])){
        header ("Location: pages/sign-in.php");
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="landing_page.css">
</head>
<body>
    <div class="category">
        <div class="slide-img">
            <img src="../FinproDatabase/assets/img/pusing.png" alt="paracetamol">
            <div class="overlay">
                <a href="pages/cart/index.php?jenis=0" class="explore-btn">Telusuri</a>
            </div>
        </div>

        <div class="detail-box">
            <div class="type">
                <a href="#">Obat Sakit Kepala</a>
            </div>
        </div>
    </div>

    <div class="category-b">
        <div class="slide-img">
            <img src="../FinproDatabase/assets/img/batuk.jpg" alt="paracetamol">
            <div class="overlay">
                <a href="pages/cart/index.php?jenis=1" class="explore-btn">Telusuri</a>
            </div>
        </div>  

        <div class="detail-box">
            <div class="type">
                <a href="#">Obat Batuk Pilek</a>
            </div>
        </div>
    </div>

    <div class="category-c">
        <div class="slide-img">
            <img src="../FinproDatabase/assets/img/perut.png" alt="paracetamol">
            <div class="overlay">
                <a href="pages/cart/index.php?jenis=2" class="explore-btn">Telusuri</a>
            </div>
        </div>

        <div class="detail-box">
            <div class="type">
                <a href="#">Obat Sakit Perut</a>
            </div>
        </div>
    </div>

    <div class="category-d">
        <div class="slide-img">
            <img src="../FinproDatabase/assets/img/oles.jpg" alt="paracetamol">
            <div class="overlay">
                <a href="pages/cart/index.php?jenis=3" class="explore-btn">Telusuri</a>
            </div>
        </div>

        <div class="detail-box">
            <div class="type">
                <a href="#">Obat Oles</a>
            </div>
        </div>
    </div>
    
    <div class="category-e">
        <div class="slide-img">
            <img src="../FinproDatabase/assets/img/anak.png" alt="paracetamol">
            <div class="overlay">
                <a href="pages/cart/index.php?jenis=4" class="explore-btn">Telusuri</a>
            </div>
        </div>

        <div class="detail-box">
            <div class="type">
                <a href="#">Obat Anak Anak</a>
            </div>
        </div>
    </div>

    <div class="category-f">
        <div class="slide-img">
            <img src="../FinproDatabase/assets/img/saki.png" alt="paracetamol">
            <div class="overlay">
                <a href="pages/cart/index.php?jenis=5" class="explore-btn">Telusuri</a>
            </div>
        </div>

        <div class="detail-box">
            <div class="type">
                <a href="#">Obat Pereda rasa sakit</a>
            </div>
        </div>
    </div>
</body>
</html>