<?php include_once("functions.php"); ?>
<?php require_once 'easyrent/autoload.php'; ?>
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

    <title>Easyrent</title>
  </head>
  <body>
    <?php banner(); ?>

    <section class="top">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="card h-50 w-150" style="background-color: #304A8B;">
              <div class="card-body">
                <img src="img/user.png">
                Easyrent
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="card h-50 w-75" style="background-color: #304A8B;">
              <div class="card-body text-center">
                <img src="img/setting.png">
              </div>
            </div>
          </div>
        </div>
      </div>

      <hr>

      <div class="container">
        <div class="row">
          <div class="col">
            <div class="card text-center h-100" style="background-color: #304A8B;">
              <div class="card-body">
                <img src="img/car.png">
                <p class="card-text" style="color: black;">Tambah Mobil</p>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card text-center h-100" style="background-color: #304A8B;">
              <div class="card-body">
                <img src="img/accept.png">
                <p class="card-text" style="color: black;">Pesanan Diterima</p>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card text-center h-100" style="background-color: #304A8B;">
              <div class="card-body">
                <img src="img/pending.png">
                <p class="card-text" style="color: black;">Pesanan Pending</p>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card text-center h-100" style="background-color: #304A8B;">
              <div class="card-body">
                <img src="img/success.png">
                <p class="card-text" style="color: black;">Pesanan Selesai</p>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card text-center h-100" style="background-color: #304A8B;">
              <div class="card-body">
                <img src="img/decline.png">
                <p class="card-text" style="color: black;">Pesanan Ditolak</p>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card text-center h-100" style="background-color: #304A8B;">
              <div class="card-body">
                <img src="img/logout.png">
                <p class="card-text" style="color: black;">Logout</p>
              </div>
            </div>
          </div>

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