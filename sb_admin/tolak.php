<?php
require '../functions.php';
$id = $_GET["id"];
if (tolakProduk($id)) {
    echo "
        <script type='text/javascript'>
        alert('Produk gagal ditolak');
        window.location = 'transaksi_permintaan.php';
        </script>
        ";
} else {
    echo "
        <script type='text/javascript'>
        alert('Produk berhasil ditolak');
        window.location = 'transaksi_permintaan.php';
        </script>
    ";
}
