<?php 
require '../functions.php';
$id = $_GET["id"];

if(hapusBarang($id) > 0){
    echo "
        <script type='text/javascript'>
            alert('Data barang berhasil dihapus');
            window.location = 'barang.php'
        </script>
    ";
}else{
    echo "
    <script type='text/javascript'>
        alert('Data barang gagal dihapus');
        window.location = 'barang.php'
    </script>
";
}
?>