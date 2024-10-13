<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/login.css">
    <title>Register Page</title>
</head>
<body>
  <div class="container" style="margin-top: 100px;">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-5 my-2 ">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Sign Up</h5>
            <form action="proses.php" method="POST">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="nama_user" placeholder="Nama Lengkap">
                <label for="floatingInput">Nama Lengkap</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="username" placeholder="Username">
                <label for="floatingInput">Username</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="myInput" name="password" placeholder="Password">
                <label for="myInput">Password</label>
              </div>

              <input type="hidden" name="role" value="2">

              <?php date_default_timezone_set('Asia/Jakarta');?>
              <input type="hidden" name="created_at" value="<?= date('Y-m-d h:i:s') ?>">

              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck" onclick="myFunction()">
                <label class="form-check-label" for="rememberPasswordCheck">
                  Show Password
                </label>
              </div>
              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Sign
                  up</button>
                  <br>
                  <label class="form-check-label" for="daftar">
                  Sudah Punya Akun? <a href="../login" id="daftar">Masuk</a>
                  </label>
              </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</html>