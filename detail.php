<?php
    require 'functions.php';
    $id = $_GET["id"];
    $produk = query("SELECT * FROM barang WHERE id_barang = '$id'")[0];
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/btn.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <title>Beranda</title>
  </head>
  <body>


<!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
      <div class="container">
        <a class="navbar-brand" href="index.php">Printer<strong>Zone</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php"><button class="btn" style="color: black"><i class="fa fa-home"></i> Beranda</button></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="keranjang.php"><button class="btn"><i class="fa fa-shopping-cart"></i> Keranjang</button></a>
            </li>
            <?php if (isset($_SESSION["username"])) : ?>
             <li class="nav-item">
              <a class="nav-link" href="checkout.php"><button class="btn"><i class="fa fa-money"></i> Checkout</button></a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="riwayat.php"><button class="btn"><i class="fa fa-history"></i> Riwayat</button></a>
              </li>

              <li class="nav-item dropdown no-arrow" style="margin-left: 480px; padding-top: 10px;">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> <?= $_SESSION["nama_user"] ?></span>
                                
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fa-solid fa-user-pen fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
              <?php else:  ?>
              </li>
              <li >
                <a class="nav-link" href="login" style="margin-left: 775px;"><button class="btn"><i class="fa fa-sign-in"></i> Login</button></a>
              </li>
              <?php endif; ?>
            </ul>
            
        </div>
      </div>
  </nav>

  <br>

  <!-- KONTEN -->
  <div class="card container" style="box-shadow: 0 0 5px #ccc;"><br>
<div class="card-header text-white text-center" style="border-radius: 5px; background: linear-gradient(to right, #0062E6, #012449); margin-bottom: 20px; margin-top: -15px">
  <h3 style="text-align: center; height: 50px; padding-top: 7px;">Detail Produk</h3>
  </div>
    <form action="" method="POST">
      <div class="row d-flex justify-content-center">
        <div class="col-md-4">
            <img src="assets/image/<?= $produk["foto"]; ?>" class="w-100">
          </div>
          <div class="col-md-6">
            <div class="detail-container">
              <h1><?= $produk["nama_barang"]; ?></h1>
              <div><?= $produk["jenis_barang"]; ?></div>
              <h4>Rp. <?= number_format($produk['harga_satuan'], 0, ',', '.'); ?></h4>
              <div class="text-secondary">Tersisa <?= $produk["stok_barang"]; ?> barang</div>
              <div class="mt-3">
                <label for="qty" class="form-label">Masukkan Jumlah Barang Yang Ingin Dibeli:</label>
                <input class="form-control" type="number" name="qty" id="qty" value="1" placeholder="Masukkan Jumlah...">
              </div>
              <div class="my-3"><button class="btn" type="submit" name="beli" style="background: linear-gradient(to right, #0062E6, #012449)"><i class="fa-solid fa-basket-shopping me-2"></i>Masukkan ke keranjang</button></div>
            </div>
          </div>
        </div>
      </div>
    </form>
</div>
  
</body>

</html>

<?php

if (isset($_POST["beli"])) {
  $qty = $_POST["qty"];
  if($qty <= 0){
      echo "
      <script type='text/javascript'>
          alert('Jumlah Pesanan Tidak Valid!');
          window.location= 'index.php'
      </script>
      ";
  } else if($qty > $produk['stok_barang']){
      ?>
      <script type='text/javascript'>
          alert('Jumlah Pesanan Melebihi Batas Stok!');
          window.location= 'index.php'
      </script>
      <?php
  } else {
      $_SESSION["cart"][$id] = $qty;

      echo "
      <script type='text/javascript'>
          alert('Produk Berhasil Ditambahkan Ke Keranjang Belanja!');
          window.location= 'keranjang.php'
      </script>
      ";
  }
}

?>