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


$user = query("SELECT * FROM user WHERE role=2");

?>

<?php require '../layout/sidebar.php'; ?>

<div id="main">
    <?php require '../layout/navbar-admin.php'; ?>
    <div class="content" style="margin-inline: 20px;">
        <h2>Data User</h2>
        <hr>
        <a href="tambah_user.php" class="btn btn-primary">Tambah Data</a><br><br>
        <table class="table" border="1" cellpadding="10" cellspacing="0">
        <thead class="thead-dark">
            <tr>
                <th>No.</th>
                <th>Nama User</th>
                <th>Username</th>
                <th>Created at</th>
                <th>Update at</th>
                <th>Aksi</th>
            </tr>
        </thead>
        
        <?php $i = 1; ?>
        <?php foreach($user as $data) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $data["nama_user"]; ?></td>
                <td><?= $data["username"]; ?></td>
                <td><?= $data["created_at"]; ?></td>
                <td><?= $data["update_at"]; ?></td>
                <td>
                    <a href="edit_user.php?id=<?= $data["id_user"]; ?>" class="btn btn-warning btn-sm">Edit</i></a>
                    <a href="hapus_user.php?id=<?= $data["id_user"]; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data?');">Hapus</a>
                </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<?php require '../layout/footer-admin.php' ?>