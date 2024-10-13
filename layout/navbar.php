<?php
require 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Printer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="sub-navbar">
                <a href="">Toko Printer GUEH</a>
                <div>
                    <ul class="menu">
                        <li><a href="index.php">Beranda</a></li>
                        <li><a href="produk.php">Produk</a></li>
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="keranjang.php">Keranjang Belanja</a></li>
                    </ul>
                </div>
                <?php if (isset($_SESSION["username"])) : ?>
                <div class="atuh">
                    <a href="#"><?= $_SESSION["nama_lengkap"];?></a>
                    <a href="logout.php">logout</a>
                </div>
                <?php endif; ?>
                <?php if (!isset($_SESSION["username"])) : ?>
                <div class="atuh">
                    <a href="login/index.php">Login</a>
                </div>
                <?php endif; ?>
            </div>
        </nav>
    </header>
</body>
</html>