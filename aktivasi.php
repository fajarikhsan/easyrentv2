<!DOCTYPE html>
<html lang="en">
<head>
  <title>Easyrent</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" align="center">
  <br>
 <?php
   include_once ("functions.php");
   $db = koneksi_db();
   $token=$_GET['t'];
   $sql_cek=$db->query("SELECT * FROM user WHERE token='".$token."' and aktif='0'");
   $jml_data=$sql_cek->num_rows;
   if ($jml_data>0) {
    //update data users aktif
    $db->query("UPDATE user SET aktif='1' WHERE token='".$token."' and aktif='0'");
    header("Location: hal-login.php?success=2");
   }
   else {
      //data tidak di temukan
      echo '<div class="alert alert-warning">
      Invalid Token!
      </div>';
  }
 ?>
</div>
</body>
</html>