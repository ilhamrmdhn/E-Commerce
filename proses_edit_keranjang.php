<?php 
require 'functions.php';

$id = $_POST["id_barang"];
$produk = query("SELECT * FROM barang WHERE id_barang = '$id'")[0];
$qty = $_POST["qty"];

if($qty <= 0){
    echo "
    <script type='text/javascript'>
        alert('Jumlah Pesanan Tidak Valid!');
        window.location= 'keranjang.php'
    </script>
    ";
} else if($qty > $produk['stok_barang']){
    ?>
    <script type='text/javascript'>
        alert('Jumlah Pesanan Melebihi Batas Stok!');
        window.location= 'keranjang.php'
    </script>
    <?php
} else {
    $_SESSION["cart"][$id] = $qty;

    echo "
    <script type='text/javascript'>
        alert('Produk Berhasil Ditambahkan Ke Keranjang Belanja!');
        window.location= 'keranjang.php'
    </script>
    ";
}

?>