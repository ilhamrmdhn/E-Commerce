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
    if(tambahUser($_POST) > 0 ){
        echo "
        <script type='text/javascript'>
            alert('Data user berhasil ditambahkan');
            window.location = 'user.php'
        </script>
    ";
    }else{
        echo "
        <script type='text/javascript'>
            alert('Data user gagal ditambahkan');
            window.location = 'user.php'
        </script>
    ";
    }
}


?>

<?php require '../layout/sidebar.php'; ?>
<div id="main">
<?php require '../layout/navbar-admin.php'; ?>
<div class="content" style="margin-inline: 20px;">
    <div class="box">
        <h2>Tambah Data User</h2><hr>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="nama_lengkap">Nama User</label><br />
            <input type="text" name="nama_user" id="nama_lengkap" class="form-control"><br />

            <label for="username">Username</label><br >
            <input type="text" name="username" id="username" class="form-control"><br />

            <label for="password">Password</label><br />
            <input type="text" name="password" id="password" class="form-control"><br />

            <input type="hidden" name="role" value="2">
            
            <?php date_default_timezone_set('Asia/Jakarta');?>

            <input type="hidden" name="created_at" value="<?= date('Y-m-d h:i:s') ?>">
            <button type="submit" name="submit" class="btn btn-primary">Tambah</button> 
        </form>
    </div>
</div>
</div>
<?php require '../layout/footer-admin.php'; ?>