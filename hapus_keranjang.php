<?php
session_start();
$id = $_GET["id"];
unset($_SESSION["cart"][$id]);
echo"
<script type='text/javascript'>
        alert('Keranjang berhasil dihapus!')
        window.location = 'keranjang.php';
    </script>
    ";?>