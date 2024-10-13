<?php
require 'functions.php';

    // Memasukkan data transaksi ke database
    foreach ($_SESSION['cart'] as $product_id => $kuantitas) {
        $barang = query("SELECT * FROM barang WHERE id_barang = '$product_id'")[0];
        $totalHarga = $kuantitas * $barang["harga_satuan"];
        $tgl_transaksi = $_POST['tgl_transaksi'];
        $alamat = $_POST['alamat'];
        $nomor_whatsapp = $_POST['nomor_whatsapp'];
        $nama_penerima = $_POST['nama_penerima'];
        $nama_barang = $barang['nama_barang'];
        $foto = $barang["foto"];
        $id_user = $_POST['id_user'];
        $id_barang = $product_id;
        $jmlh_barang = $kuantitas;
        $total_harga = $totalHarga;
        $status = 'proses';

        $query_transaksi = "INSERT INTO transaksi VALUES (NULL, '$tgl_transaksi', '$alamat', '$nomor_whatsapp', '$nama_penerima', '$nama_barang', '$foto', '$id_user', '$id_barang', '$jmlh_barang', '$total_harga', '$status')";
        $result_transaksi = mysqli_query($conn, $query_transaksi);

        if ($result_transaksi) {
            echo "
            <script type = 'text/javascript'>
                alert('Barang berhasil dicheckout! Silahkan tunggu konfirmasi 1x24 jam');
                window.location='index.php';
            </script>
            ";
        }else{
            echo "
            <script type = 'text/javascript'>
                alert('Checkout Gagal!');
                window.location='index.php';
            </script>
            ";
        }
    }

    // Mengurangi stok barang
    foreach ($_SESSION["cart"] as $product_id => $kuantitas) {
        $query_update_stok = "UPDATE barang SET stok_barang = stok_barang - $kuantitas WHERE id_barang = '$product_id'";
        $result_update_stok = mysqli_query($conn, $query_update_stok);

        if (!$result_update_stok) {
            die("Gagal mengurangi stok barang. Error: " . mysqli_error($conn));
        }
    }

    // Menghapus data keranjang
    unset($_SESSION["cart"]);

    // Redirect ke halaman sukses checkout


?>