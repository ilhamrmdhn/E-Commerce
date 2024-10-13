<?php
require 'functions.php';

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
            <li>
              <a class="nav-link" href="login" style="margin-left: 775px;"><button class="btn"><i class="fas fa-sign-in-alt"></i> Login</button></a>
            </li>
          <?php endif; ?>
        </ul>

      </div>
    </div>
  </nav>

  <br>

  <!-- KONTEN -->
  <div id="home" class="produk container">
    <div id="carouselHome" class="mt-3 carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="2000">
          <img src="assets/image/promosi1.jpg" class="d-block w-100" alt="Foto 1" style="border-radius: 10px;">
        </div>
        <div class="carousel-item" data-bs-interval="2000">
          <img src="assets/image/promosi2.jpg" class="d-block w-100" alt="Foto 2" style="border-radius: 10px;">
        </div>
        <div class="carousel-item" data-bs-interval="2000">
          <img src="assets/image/promosi3.jpg" class="d-block w-100" alt="Foto 2" style="border-radius: 10px;">
        </div>
      </div>
    </div>

    <div class="d-flex justify-content-between mb-3">
      <h2 class="my-4">Produk Terbaru</h2>
      <form class="form-inline" method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="input-group my-4">
          <input type="text" class="form-control" name="keyword" placeholder="Cari produk...">
          <div class="input-group-append">
            <button type="submit" name="search" class="btn btn-primary" style="height: 100%; display: flex; align-items: center; justify-content: center;">
              <i class="fa-solid fa-magnifying-glass"></i>
            </button>
          </div>
        </div>

      </form>
    </div>



    <div class="row">
      <?php
      // Cek apakah tombol search telah ditekan
      if (isset($_GET['search'])) {
        // Ambil keyword dari input
        $keyword = $_GET['keyword'];

        // Lakukan proses pencarian
        $produk = query("SELECT * FROM barang WHERE nama_barang LIKE '%$keyword%'");
      } else {
        // Tampilkan semua produk
        $produk = query("SELECT * FROM barang");
      }

      // Tampilkan produk yang sesuai dengan hasil pencarian
      foreach ($produk as $data) : ?>
        <div class="col-md-3 mb-3">
          <div class="card" style="box-shadow: 0 0 5px #ccc;">
            <img src="assets/image/<?= $data["foto"]; ?>" class="card-img-top">
            <div class="card-body" style="background: #e9ecef;">
              <h5 class="card-title"><?= $data["nama_barang"]; ?></h5>
              <p class="card-text"><?= $data["jenis_barang"]; ?></p>
              <hr>
              <h6 class="card-text">Rp. <?= number_format($data["harga_satuan"], 0, ',', '.'); ?></h6>
              <p class="text-secondary">
                <?php if ($data["stok_barang"] == 0) : ?>
                <?php else : ?>
              <p class="text-secondary">Tersisa <?= $data["stok_barang"]; ?> barang</p>
            <?php endif; ?>
            </p>
            <?php if ($data["stok_barang"] == 0) : ?>
              <a href="#" class="btn btn-danger btn-sm disabled" aria-disabled="true">Stok Habis</a>
            <?php else : ?>
              <a href="detail.php?id=<?= $data["id_barang"]; ?>" class="btn btn-sm" style="background: linear-gradient(to right, #0062E6, #012449)"><i class="fa-solid fa-basket-shopping me-2"></i>Pesan Sekarang</a>
            <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>


    </div>
  </div>
</body>

</html>