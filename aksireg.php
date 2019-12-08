<?php include_once("functions.php");?>
<?php 

$db = koneksi_db();
if ($db->connect_errno == 0) {
	if (isset($_POST['tblReg'])) {
		$nama = $db->escape_string($_POST['nama']);
		$uname = $db->escape_string($_POST['uname']);
		$email = $db->escape_string($_POST['email']);
		$nohp = $db->escape_string($_POST['nohp']);
		$pass = $db->escape_string($_POST['pass']);
		$upass = $db->escape_string($_POST['upass']);
		$gambarktp= $_FILES['ktp']['name'];
		$gambarselfie= $_FILES['selfie']['name'];
		$gambarkk= $_FILES['kk']['name'];
		$gambarsim= $_FILES['sim']['name'];
		//buat token
		$token = hash('sha256', md5(date('Y-m-d')));

		if (($nama == "") or ($nama == null)) {
			header("Location: hal-reg.php?error=4");
		}
		else if (($uname == "") or ($uname == null)) {
			header("Location: hal-reg.php?error=5");
		}
		else if (($email == "") or ($email == null)) {
			header("Location: hal-reg.php?error=6");
		}
		else if (($pass == "") or ($pass == null)) {
			header("Location: hal-reg.php?error=7");
		}
		else if (($upass == "") or ($upass == null)) {
			header("Location: hal-reg.php?error=8");
		}
		else if ($upass != $pass) {
			header("Location: hal-reg.php?error=9");
		}
		else if (($_FILES['ktp']['size'] == 0) && ($_FILES['ktp']['error'] == 0)) {
			header("Location: hal-reg.php?error=10");
		}
		else if (($_FILES['selfie']['size'] == 0) && ($_FILES['selfie']['error'] == 0)) {
			header("Location: hal-reg.php?error=11");
		}
		else if (($_FILES['kk']['size'] == 0) && ($_FILES['kk']['error'] == 0)) {
			header("Location: hal-reg.php?error=12");
		}
		else {

			$sql = "insert into user values('$nama', '$uname', '$email', '$nohp', '$pass', '$gambarktp', '$gambarselfie', '$gambarkk', '$gambarsim', '$token', '0')";
			$res = $db->query($sql);
			if ($res) {
				if ($db->affected_rows > 0) {
					header("Location: hal-login.php?success=1");
					include ("mail.php");
				}
				else {
					header("Location: hal-reg.php?error=1");
				}
			}
		}
	}
	else {
		header("Location: hal-reg.php?error=2");
	}
}
else {
	header("Location: hal-reg.php?error=3");
}

?>