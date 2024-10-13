<?php 
require '../functions.php';
$id = $_GET["id"];

if(hapusUser($id) > 0){
    echo "
        <script type='text/javascript'>
            alert('Data user berhasil dihapus');
            window.location = 'data_user.php'
        </script>
    ";
}else{
    echo "
    <script type='text/javascript'>
        alert('Data user gagal dihapus');
        window.location = 'data_user.php'
    </script>
";
}
?>