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


$id = $_GET["id"];
$user = query("SELECT * FROM user WHERE id_user = '$id'")[0];

if(isset($_POST["submit"])){
    if(updateUser($_POST) > 0 ){
        echo "
        <script type='text/javascript'>
            alert('Data berhasil diedit');
            window.location = 'user.php'
        </script>
    ";
    }else{
        echo "
        <script type='text/javascript'>
            alert('Data gagal diedit');
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
        <h2>Edit Data User</h2><hr>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_user" value="<?= $user["id_user"]; ?>">
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" name="nama_user" class="form-control" id="nama_lengkap" 
            value="<?= $user['nama_user']; ?>"><br>

            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" id="username" value="<?= $user
            ["username"]; ?>"><br>

            <label for="password">Password</label>
            <input type="text" name="password" class="form-control" id="password" value="<?= $user["password"]; ?>"><br />

            <input type="hidden" name="role" value="<?= $user["role"]; ?>"> 

            <?php date_default_timezone_set('Asia/Jakarta');?>

            <input type="hidden" name="created_at" value="<?= $user["created_at"]; ?>">
            <input type="hidden" name="update_at" value="<?= date('Y-m-d h:i:s') ?>">
            <button type="submit" name="submit" class="btn btn-primary">Edit</button> 
        </form>
    </div>
</div>
</div>
<?php require '../layout/footer-admin.php'; ?>