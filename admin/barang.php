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


$produk = query("SELECT * FROM barang");

?>

<?php require '../layout/sidebar.php'; ?>

<div id="main">
    <?php require '../layout/navbar-admin.php'; ?>
    <div class="content" style="margin-inline: 20px;">
        <h2>Data Barang</h2>
        <hr>
        <a href="tambah_barang.php" class="btn btn-primary">Tambah Data</a><br><br>
        <table class="table" border="1" cellpadding="10" cellspacing="0">
        <thead class="thead-dark">
            <tr>
                <th>No.</th>
                <th>Merek</th>
                <th>Foto</th>
                <th>Jenis</th>
                <th>Harga Satuan</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
            
            <?php $i = 1; ?>
            <?php foreach($produk as $data) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $data["nama_barang"]; ?></td>
                <td><img src="../assets/image/<?= $data["foto"]; ?>" width="100"></td>
                <td><?= $data["jenis_barang"]; ?></td>
                <td>Rp. <?= number_format($data["harga_satuan"], 0, ',', '.'); ?></td>
                <td><?= $data["stok_barang"]; ?></td>
                <td>
                    <a href="edit_barang.php?id=<?= $data["id_barang"]; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapus_barang.php?id=<?= $data["id_barang"]; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data?');">Hapus</a>
                </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<?php require '../layout/footer-admin.php'; ?>