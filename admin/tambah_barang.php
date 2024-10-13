<?php 
require '../functions.php';

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
    if(tambahBarang($_POST) > 0){
        echo "
            <script type='text/javascript'>
                alert('Data barang berhasil ditambahkan');
                window.location = 'barang.php';
            </script>
        ";
    }else{
        echo "
        <script type='text/javascript'>
            alert('Data barang gagal ditambahkan');
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

    <h2>Tambah Data Barang</h2><hr>

    <form action="" method="POST" enctype="multipart/form-data">
        <label for="nama_barang">Merek</label><br />
        <input type="text" name="nama_barang" id="nama_barang" class="form-control"><br />

        <label for="jenis_barang">Jenis</label><br />
        <input type="text" name="jenis_barang" id="jenis_barang" class="form-control"><br />


        <label for="harga_satuan">Harga</label><br />
        <input type="number" name="harga_satuan" id="harga_satuan" class="form-control"><br />

        <label for="stok_barang">Stok</label><br />
        <input type="number" name="stok_barang" id="stok_barang" class="form-control"><br />

        <label for="foto">Foto</label><br />
        <input type="file" name="foto" id="foto" class="form-control"><br />
        
        <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
    </form>
   </div>
</div>
<?php require '../layout/footer-admin.php'; ?>