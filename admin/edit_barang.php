<?php 
require '../functions.php';

$id = $_GET["id"];
$produk = query("SELECT * FROM barang WHERE id_barang = '$id'")[0];

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu')
        window.location = '../login/index.php';
    </script>
    ";
}

if($_SESSION["role"] != 1){
    echo "
    <script type='text/javascript'>
        alert('Mohon maaf anda bukan admin, enggak bisa masuk kesini!')
        window.location = '../login/index.php';
    </script>
    ";
}

if(isset($_POST["submit"])){
    if(editBarang($_POST) > 0){
        echo "
            <script type='text/javascript'>
                alert('Data barang berhasil diubah');
                window.location = 'barang.php';
            </script>
        ";
    }else{
        echo "
        <script type='text/javascript'>
            alert('Data barang gagal diubah');
            window.location = 'barang.php';
        </script>
    ";
    }
}


?>

<?php require '../layout/sidebar.php'?>

<div id="main">
<?php require '../layout/navbar-admin.php'; ?>
   <div class="box" style="margin-inline: 20px;">
    <h2>Edit Data Produk</h2><hr>
    <form action="" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="id_barang" class="form-control" value="<?= $produk["id_barang"]; ?>">

        <label for="nama_barang">Merek</label>
        <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="<?= $produk["nama_barang"]; ?>"><br>

        <label for="jenis_barang">Jenis</label>
        <input type="text" name="jenis_barang" id="jenis_barang" class="form-control" value="<?= $produk["jenis_barang"] ?>"><br>


        <label for="harga_satuan">Harga</label>
        <input type="number" name="harga_satuan" id="harga_satuan" class="form-control" value="<?= $produk["harga_satuan"] ?>"><br>

        <label for="stok_barang">Stok</label>
        <input type="number" name="stok_barang" id="stok_barang" class="form-control" value="<?= $produk["stok_barang"] ?>"><br>

        <label for="foto">Foto</label>
        <input type="file" name="foto" id="foto" class="form-control"><br>

        
        <button type="submit" name="submit" class="btn btn-primary">Edit</button>
    </form>
    
   </div>
</div>
<?php require '../layout/footer-admin.php'; ?>