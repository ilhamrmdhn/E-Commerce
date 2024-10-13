<?php
require '../functions.php';

if (!isset($_SESSION["username"])) {
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu')
        window.location = '../login/index.php';
    </script>
    ";
}

if ($_SESSION["role"] != 1) {
    echo "
    <script type='text/javascript'>
        alert('Mohon maaf anda bukan admin, enggak bisa masuk kesini!')
        window.location = '../login/index.php';
    </script>
    ";
}


$transaksi = query("SELECT * FROM transaksi WHERE status = 'proses'");
$tolak = query("SELECT * FROM transaksi WHERE status = 'ditolak'");
$verifikasi = query("SELECT * FROM transaksi WHERE status = 'terverifikasi'");

?>

<?php require '../layout/sidebar.php'; ?>
<div id="main">
<?php require '../layout/navbar-admin.php'; ?>
    <div class="content" style="margin-inline: 20px;">
        <h2>Data Transaksi</h2>
        <hr>
        <h4>Barang Request</h4>
        <table class="table table-hover"  border="1" cellpadding="10" cellspacing="0">
            <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>Tanggal Transaksi</th>
                    <th>Alamat</th>
                    <th>ID User</th>
                    <th>ID Barang</th>
                    <th>Jumlah Barang</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
                
            <?php $i = 1; ?>
        <?php foreach ($transaksi as $data) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $data["tgl_transaksi"]; ?></td>
                <td><?= $data["alamat"]; ?></td>
                <td><?= $data["id_user"]; ?></td>
                <td><?= $data["id_barang"]; ?></td>
                <td><?= $data["jmlh_barang"]; ?></td>
                <td>Rp. <?= number_format($data["total_harga"], 0, ',', '.'); ?></td>
                <td><?= $data["status"]; ?></td>
                <td>
                    <a href="verifikasi.php?id=<?= $data["id_transaksi"]; ?>" onclick="return confirm('Apakah anda yakin ingin verivikasi pesanan?');" class="btn btn-success fa-solid fa-check me-2"></a>
                    <a href="tolak.php?id=<?= $data["id_transaksi"]; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menolak pesanan?');"><i class="fa-solid fa-xmark"></i></a>
                </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>

        <h4>Barang Selesai - Terverifikasi</h4>
        <table class="table table-hover" border="1" cellpadding="10" cellspacing="0">
        <thead class="thead-dark">
            <tr>
            <th>No.</th>
            <th>Tanggal Transaksi</th>
            <th>Alamat</th>
            <th>ID User</th>
            <th>ID Barang</th>
            <th>Jumlah Barang</th>
            <th>Total Harga</th>
            <th>Status</th>
        </tr>
        </thead>
        
        <?php $i = 1; ?>
        <?php foreach ($verifikasi as $data) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $data["tgl_transaksi"]; ?></td>
                <td><?= $data["alamat"]; ?></td>
                <td><?= $data["id_user"]; ?></td>
                <td><?= $data["id_barang"]; ?></td>
                <td><?= $data["jmlh_barang"]; ?></td>
                <td>Rp. <?= number_format($data["total_harga"], 0, ',', '.'); ?></td>
                <td>
                <i class="btn btn-success btn-sm">terverifikasi</i></a>
                </td>
            </tr>

            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
        <h4>Barang Selesai - DiTolak</h4>
        <table class="table table-hover" border="1" cellpadding="10" cellspacing="0">
        <thead class="thead-dark">
            <tr>
                <th>No.</th>
                <th>Tanggal Transaksi</th>
                <th>Alamat</th>
                <th>ID User</th>
                <th>ID Barang</th>
                <th>Jumlah Barang</th>
                <th>Total Harga</th>
                <th>Status</th>
            </tr>
        </thead>
            
            <?php $i = 1; ?>
            <?php foreach ($tolak as $data) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $data["tgl_transaksi"]; ?></td>
                <td><?= $data["alamat"]; ?></td>
                <td><?= $data["id_user"]; ?></td>
                <td><?= $data["id_barang"]; ?></td>
                <td><?= $data["jmlh_barang"]; ?></td>
                <td>Rp. <?= number_format($data["total_harga"], 0, ',', '.'); ?></td>
                <td>               
                    <i class="btn btn-danger btn-sm">ditolak</i></a>
                </td>
            </tr>

            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    
    </div>
</div>
<?php require '../layout/footer-admin.php'; ?>