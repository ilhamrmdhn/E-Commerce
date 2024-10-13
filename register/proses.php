<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'pemograman_web');

$username = $_POST['username'];
$pass = $_POST['password'];
$nama = $_POST['nama_user'];
$role = $_POST['role'];
$created_at = $_POST['created_at'];

$input = mysqli_query($koneksi,"INSERT INTO user VALUES(NULL,'$username','$pass','$nama','$role','$created_at', NULL)");

if($input){
    ?>
    <script>
        alert('Register Berhasil, Silahkan Login!');
        window.location = "../login";
    </script>
    <?php
}else{
    ?>
    <script>
        alert('Register Gagal');
        window.location = "register.php";
    </script>
    <?php
}

?>