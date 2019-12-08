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

    <title>EasyRent</title>
  </head>
  <body>

    <?php banner(); ?>

    <section class="login">
      <div class="text-center"><h3>Daftar Akun</h3></div>
    </section>

    <script>
            // show the given page, hide the rest
            function show(elementID, tabID) {
                // try to find the requested page and alert if it's not found
                var ele = document.getElementById(elementID);
                var tab = document.getElementById(tabID);
                if ((!ele) || (!tab)) {
                    alert("no such element");
                    return;
                }

                // get all pages, loop through them and hide them
                var pages = document.getElementsByClassName('tab-pane');
                var tabs = document.getElementsByClassName('nav-link');
                for(var i = 0; i < pages.length; i++) {
                    pages[i].classList.remove('show', 'active');
                    tabs[i].classList.remove('active');
                }

                // then show the requested page
                ele.classList.add('tab-pane', 'fade', 'active', 'show');
                tab.classList.add('active');
            }
        </script>

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
      $nama = $_POST['nama'];
      $uname = $_POST['uname'];
      $email = $_POST['email'];
      $nohp = $_POST['nohp'];
      $pass = $_POST['pass'];
      $upass = $_POST['upass'];
      $gambarktp= $_FILES['ktp']['name'];
      $gambarselfie= $_FILES['selfie']['name'];
      $gambarkk= $_FILES['kk']['name'];
      $gambarsim= $_FILES['sim']['name'];

      $user = new User($email, $pass, $nama, $nohp, $uname, $upass, $gambarktp, $gambarselfie, $gambarkk, $gambarsim);
      $user->mendaftar();
    }
    ?>

    <section class="notif">
      <?php 
        if (isset($_GET["error"])) {
          $error=$_GET["error"];
          if ($error==1)
            showNotif("Harap lengkapi semua isian yang ada.");
          else if ($error==2)
            showNotif("Error database. Silahkan hubungi administrator.");
          else if ($error==3)
            showNotif("Koneksi ke Database gagal. Autentikasi gagal.");
          else if ($error==4)
            showNotif("Nama tidak boleh kosong.");
          else if ($error==5)
            showNotif("Username tidak boleh kosong");
          else if ($error==6)
            showNotif("Email tidak boleh kosong.");
          else if ($error==7)
            showNotif("Password tidak boleh kosong.");
          else if ($error==8)
            showNotif("Harap ulangi password.");
          else if ($error==9)
            showNotif("Password tidak sama.");
          else if ($error==10)
            showNotif("Harap upload foto KTP.");
          else if ($error==11)
             showNotif("Harap upload foto selfie dengan KTP.");
          else if ($error==12)
            showNotif("Harap upload foto KK.");
          else
            showNotif("Unknown Error.");
          }        
      ?>
    </section>

    <section class="formdf">
      <div class="container">
      <form method="post" name="reg" action="hal-reg.php" enctype="multipart/form-data">
        <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#page1" role="tab" aria-controls="home" aria-selected="true">Data diri</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#page2" role="tab" aria-controls="profile" aria-selected="false">Upload KTP</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#page3" role="tab" aria-controls="contact" aria-selected="false">Upload KK</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="page1" role="tabpanel" aria-labelledby="home-tab">
             <div class="form-group">
              <input class="form-control form-control-sm" type="text" placeholder="Nama" name="nama" data-toggle="tooltip" data-placement="top" title="Nama">
            </div>
            <div class="form-group">
              <input class="form-control form-control-sm" type="text" placeholder="Username" name="uname" data-toggle="tooltip" data-placement="top" title="Username">
            </div>
            <div class="form-group">
              <input type="email" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="email" data-toggle="tooltip" data-placement="top" title="Email">
            </div>
            <div class="form-group">
              <input class="form-control form-control-sm" type="text" placeholder="Nomor HP" name="nohp" data-toggle="tooltip" data-placement="top" title="Nomor HP">
            </div>
            <div class="form-group">
              <input type="password" class="form-control form-control-sm" id="exampleInputPassword1" placeholder="Password" name="pass" data-toggle="tooltip" data-placement="top" title="Password">
            </div>
            <div class="form-group mb-4">
              <input type="password" class="form-control form-control-sm" id="exampleInputPassword1" placeholder="Ulangi Password" name="upass" data-toggle="tooltip" data-placement="top" title="Ulangi Password">
            </div>
            <div class="text-center mb-5"><button type="button" class="btn btn-primary" style="background-color: #304A8B;" name="tblReg" data-toggle="tooltip" data-placement="top" title="Lanjut" onclick="show('page2', 'profile-tab');">Lanjut</button></div>
          </div>
          <div class="tab-pane fade" id="page2" role="tabpanel" aria-labelledby="profile-tab">
            <div class="container" style="font-size: 14px;">
              <div class="row mb-4">
                <div class="col">
                  Unggah data diri :
                </div>

                <div class="col-4" style="color: #FF2525;">
                  * Harus diisi
                </div>
              </div>
                    <div class="row mb-4">
                      <div class="col">
                        <div class="form-group">
                          <label for="exampleFormControlFile1">KTP <b style="color: #FF2525;">*</b> :</label>
                          <div class="text-center mb-2"><img src="img/pic.png" id="ktp" width="40%" /></div>
                          <input type="file" class="form-control-file" id="exampleFormControlFile1" name="ktp" onchange="readURL(this,'ktp');">
                        </div>
                      </div>
                    </div>
                
                    <div class="row mb-4">
                      <div class="col">
                        <div class="form-group">
                          <label for="exampleFormControlFile1">Foto selfie dengan KTP <b style="color: #FF2525;">*</b> :</label>
                          <div class="text-center mb-2"><img src="img/pic.png" id="selfie" width="40%" /></div>
                          <input type="file" class="form-control-file" id="exampleFormControlFile1" name="selfie" onchange="readURL(this,'selfie');">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-center mb-5"><button type="button" class="btn btn-primary" style="background-color: #304A8B;" name="tbllanjut" onclick="show('page3', 'contact-tab');">Lanjut</button></div>
          </div>
          <div class="tab-pane fade" id="page3" role="tabpanel" aria-labelledby="contact-tab">
            <div class="container" style="font-size: 14px;">
              <div class="row mb-4">
                <div class="col">
                  Unggah data diri :
                </div>

                <div class="col-4" style="color: #FF2525;">
                  * Harus diisi
                </div>
              </div>

              <div class="row mb-4">
                <div class="col">
                  <div class="form-group">
                    <label for="exampleFormControlFile1">Kartu Keluarga <b style="color: #FF2525;">*</b> :</label>
                    <div class="text-center mb-2"><img src="img/pic.png" id="kk" width="40%" /></div>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="kk" onchange="readURL(this,'kk');">
                  </div>
                </div>
              </div>

              <div class="row mb-4">
                <div class="col">
                  <div class="form-group">
                    <label for="exampleFormControlFile1">Surat Izin Mengemudi :</label>
                    <div class="text-center mb-2"><img src="img/pic.png" id="sim" width="40%" /></div>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="sim" onchange="readURL(this,'sim');">
                  </div>
                </div>
              </div>

            <div class="text-center mb-5">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" style="background-color: #304A8B;" data-toggle="modal" data-target="#exampleModal">Daftar</button>
              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Daftar</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Simpan pendaftaran?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" name="tblReg">Save changes</button>
                    </div>
                  </div>
                </div>
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
  </body>
</html>