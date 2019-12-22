<?php include_once 'functions.php'; ?>
<?php require_once 'easyrent/autoload.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

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

    <title>Tambah Mobil</title>
  </head>
  <body>

  <script type="text/javascript">
    function readURL(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var id = document.getElementById(id);
            reader.onload = function (e) {
                $(id).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
  </script>

  <?php 
  if (isset($_POST['tblReg'])) {
    $nama_mobil = $_POST['namaMbl'];
    $thn_mobil = $_POST['tahun'];
    $tipe_mobil = $_POST['tipeMbl'];
    $silinder = $_POST['silinder'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $foto_mobil = $_FILES['foto_mobil']['name'];

    $mobil = new Mobil ($nama_mobil, $thn_mobil, $tipe_mobil, $silinder, $harga, $deskripsi, $foto_mobil);
    $mobil->tambah_mobil();
  }
  ?>

  <section class="header">
      <?php banner(); ?>
  </section>

  <section class="login">
    <div class="text-center"><h3>Tambah Mobil</h3></div>
  </section>

  <section class="notif">
    <?php 
    if (isset($_GET["error"])) {
          $error=$_GET["error"];
          if ($error==1)
            showNotif("Harap isi Nama Mobil.");
          else if ($error==2)
            showNotif("Harap isi Tahun Mobil.");
          else if ($error==3)
            showNotif("Harap isi Tipe Mobil.");
          else if ($error==4)
            showNotif("Harap isi Silinder Mobil.");
          else if ($error==5)
            showNotif("Harap isi Harga Mobil.");
          else if ($error==6)
            showNotif("Harap Masukkan Foto Mobil");
          else if ($error==7)
            showNotif("Koneksi ke Database gagal. Autentikasi gagal.");
          else
            showNotif("Unknown Error.");
          } 
    ?>
  </section>

  <section class="isi">
    <div class="container" style="font-size: 14px;">
      <form name="simpanMbl" method="post" action="hal-tambah.php" enctype="multipart/form-data">

        <div class="row mb-4">
          <div class="col">
            <div class="form-group">
              <label for="exampleFormControlFile1">Foto Mobil :</label>
              <div class="text-center mb-2"><img src="img/pic.png" id="mobil" width="30%" /></div>
              <input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto_mobil" onchange="readURL(this,'mobil');">
            </div>
          </div>
        </div>

        <div class="form-group">
          <input class="form-control form-control-sm" type="text" placeholder="Nama Mobil" name="namaMbl" data-toggle="tooltip" data-placement="top" title="Nama Mobil">
        </div>

        <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01" id="inputGroup-sizing-sm">Tahun Mobil</label>
          </div>
          <select class="custom-select" id="inputGroupSelect01" name="tahun">
            <option selected>Pilih</option>
            <?php $thn = date('Y'); ?>
            <?php for ($i=2008; $i <= $thn; $i++) { ?>
              <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group">
          <input class="form-control form-control-sm" type="text" placeholder="Tipe Mobil" name="tipeMbl" data-toggle="tooltip" data-placement="top" title="Tipe Mobil">
        </div>

        <div class="input-group input-group-sm mb-3">
          <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Silinder" name="silinder">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">CC</span>
          </div>
        </div>

        <div class="input-group input-group-sm mb-3">
          <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Harga Mobil" name="harga">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">/ Hari</span>
          </div>
        </div>

        <div class="form-group">
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Deskripsi Mobil" name="deskripsi"></textarea>
        </div>

        <div class="text-center mb-4">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" style="background-color: #304A8B;" data-toggle="modal" data-target="#exampleModal">Simpan</button>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Simpan Mobil</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Simpan Data Mobil?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                  <button type="submit" class="btn btn-primary" name="tblReg">Simpan</button>
                </div>
              </div>
            </div>
          </div>
        </div>

      </form>
    </div>
  </section>

  <section class="footer">
    <?php bawah(); ?>
  </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>