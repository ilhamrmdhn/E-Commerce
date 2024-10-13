<?php

include '../functions.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");

$cek = mysqli_num_rows($query);

if($cek > 0){
    $data = mysqli_fetch_array($query);

    if ($data['role'] == 1){
        session_start();

        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['nama_user'] = $data['nama_user'];
        $_SESSION['role'] = $data['role'];
        header('location: ../sb_admin/index.php');
    }else if($data['role'] == 2){
        session_start();

        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['nama_user'] = $data['nama_user'];
        $_SESSION['role'] = $data['role'];
        header('location: ../index.php');
    }
}else{
    echo "
        <script type='text/javascript'>
            alert('Username atau Password Salah!');
            window.location = '../login/index.php'
        </script>
    ";
}
?>