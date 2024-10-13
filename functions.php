<?php
session_start();
$conn = $mysqli = mysqli_connect('localhost', 'root', '', 'pemograman_web');


function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambahUser($data){
    global $conn;
    
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    $nama_user = htmlspecialchars($data["nama_user"]);
    $role = htmlspecialchars($data["role"]);
    $created_at = htmlspecialchars($data["created_at"]);

    $query = "INSERT INTO user VALUES(NULL, '$username', '$password', '$nama_user', '$role', '$created_at', NULL)";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function updateUser($data){
    global $conn;
    
    $id = htmlspecialchars($data["id_user"]);
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    $nama_user = htmlspecialchars($data["nama_user"]);
    $role = htmlspecialchars($data["role"]);
    $created_at = htmlspecialchars($data["created_at"]);
    $update_at = htmlspecialchars($data["update_at"]);

    $query = "UPDATE user SET username='$username', password='$password', nama_user='$nama_user', role='$role', created_at='$created_at', update_at='$update_at' WHERE id_user='$id'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapusUser($id){
    global $conn;
    
    $query = "DELETE FROM user WHERE id_user = '$id'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambahBarang($data){
    global $conn;

    $nama_barang = htmlspecialchars($data["nama_barang"]);
    $foto = $_FILES["foto"]["name"];
    $files = $_FILES["foto"]["tmp_name"];
    $jenis_barang = htmlspecialchars($data["jenis_barang"]);
    $harga_satuan = htmlspecialchars($data["harga_satuan"]);
    $stok_barang = htmlspecialchars($data["stok_barang"]);

    $query = "INSERT INTO barang VALUES(NULL, '$nama_barang', '$foto', '$jenis_barang', '$harga_satuan', '$stok_barang')";

    move_uploaded_file($files, "../assets/image/".$foto);
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function editBarang($data){
    global $conn;

    $id = htmlspecialchars($data["id_barang"]);
    $nama_barang = htmlspecialchars($data["nama_barang"]);
    $foto = $_FILES["foto"]["name"];
    $files = $_FILES["foto"]["tmp_name"];
    $jenis_barang = htmlspecialchars($data["jenis_barang"]);
    $harga_satuan = htmlspecialchars($data["harga_satuan"]);
    $stok_barang = htmlspecialchars($data["stok_barang"]);

    if(empty($foto)){
        $query = "UPDATE barang SET
        nama_barang = '$nama_barang',
        jenis_barang = '$jenis_barang',
        harga_satuan = '$harga_satuan',
        stok_barang = '$stok_barang' WHERE id_barang = '$id'";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }else{
        $query = "UPDATE barang SET
        nama_barang = '$nama_barang',
        foto = '$foto',
        jenis_barang = '$jenis_barang',
        harga_satuan = '$harga_satuan',
        stok_barang = '$stok_barang' WHERE id_barang = '$id'";

        move_uploaded_file($files, "../assets/image/".$foto);

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
}

function hapusBarang($id){
    global $conn;
    
    $query = "DELETE FROM barang WHERE id_barang = '$id'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tolakProduk($id){
    global $conn;
    mysqli_query($conn, "UPDATE transaksi SET status = 'ditolak' WHERE id_transaksi = '$id' ");
}

function terimaProduk($id){
    global $conn;
    mysqli_query($conn, "UPDATE transaksi SET status = 'terverifikasi' WHERE id_transaksi = '$id' ");
}

?>