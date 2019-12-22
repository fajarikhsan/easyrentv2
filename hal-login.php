<?php include_once("functions.php"); ?>
<?php require_once 'easyrent/autoload.php'; ?>
<?php include_once 'login-google.php' ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">

    <!-- Oleo Script -->
    <link href='https://fonts.googleapis.com/css?family=Oleo Script' rel='stylesheet'>

    <!-- My CSS -->
    <style>
      .header {
        min-height: 55px;
      }
      hr {
        border-width: 3px;
      }
      .login {
        min-height: 75px;
        font-family: 'Oleo Script';
      }
    </style>

    <title>EasyRent</title>
  </head>
  <body>
      <?php banner(); ?>

    <section class="login">
      <div class="text-center"><h3>Login</h3></div>
    </section>

    <?php 
    if (isset($_POST['tblLg'])) {
      $email = $_POST['email'];
      $pass = $_POST['pass'];

      $login = new User ($email, $pass);
      $login->login();
    }
    ?>

    <?php 
    if (isset($_GET['success'])) {
      $succ = $_GET['success'];
      if($succ == 1) {
        showNotif("Pembuatan akun berhasil! Harap cek verifikasi di email yang telah di daftarkan (inbox/spam)");
      }
      else if($succ == 2) {
        showNotif("Verifikasi berhasil! Silahkan login.");
      }
    }

    if (isset($_GET['error'])) {
      $error = $_GET['error'];
      if ($error == 1){
        showNotif("Email atau Password tidak sesuai.");
      }
      else if ($error == 2){
        showNotif("Error database. Silahkan hubungi administrator.");
      }
      else if ($error == 3){
        showNotif("Koneksi ke Database gagal. Autentikasi gagal.");
      }
      else if ($error == 4){
        showNotif("Harap login terlebih dahulu.");
      }
      else if ($error == 5){
        showNotif("Harap verifikasi email terlebih dahulu.");
      }
      else {
        showNotif("Unknown Error.");
      }
    }
    ?>

    <section class="formlg">
      <div class="container">
      <form method="post" name="login" action="hal-login.php">
        <div class="form-group">
          <input type="email" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="email">
        </div>
        <div class="form-group mb-4">
          <input type="password" class="form-control form-control-sm" id="exampleInputPassword1" placeholder="Password" name="pass">
        </div>
        <div class="text-center mb-5"><button type="submit" class="btn btn-primary" style="background-color: #304A8B;" name="tblLg">Masuk</button></div>
      </form>
      </div>

      <div class="container text-center">
        <div class="row mb-5 text-center">
          <div class="col text-center">
            <h6>Atau</h6>
          </div>
        </div>

        <div class="row justify-content-center mb-5">
          <div class="col-2">
              <a href="<?php echo $google_client->createAuthUrl(); ?>">
                <img src="img/google.png" width="100%">
              </a>
          </div>

          <div class="col-2">
              /
          </div>

          <div class="col-2">
              <img src="img/facebook.png" width="100%">
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row text-center pt-3 mb-2">
          <div class="col">
            Belum punya akun? 
            <a href="hal-reg.php" class="badge badge-dark">Daftar</a>
          </div>
        </div>

        <div class="row text-center">
          <div class="col">
            Masuk sebagai penyedia rental.
            <a href="hal-login-rental.php" class="badge badge-dark">Klik disini</a>
          </div>
        </div>
      </div>
    </section>

    <section class="footer">
      <?php bawah(); ?>
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
  </body>
</html>