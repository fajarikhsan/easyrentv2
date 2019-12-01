<?php include_once ("functions.php"); ?>
<?php 

$db = koneksi_db();
if ($db->connect_errno == 0) {
	if (isset($_POST['tblLg'])) {
		$email = $db->escape_string($_POST['email']);
		$pass = $db->escape_string($_POST['pass']);

		$sql = "select * from user where email='$email' and password='$pass'";
		$res = $db->query($sql);
		if ($res) {
			if ($res->num_rows == 1) {
				$data = $res->fetch_assoc();
				if ($data['aktif'] == 1){
					session_start();
					$_SESSION['email'] = $data['email'];
					$_SESSION['username'] = $data['username'];
					header("Location: hal-utm.php");
				}
				else
					header("Location: hal-login.php?error=5");
			}
			else
				header("Location: hal-login.php?error=1");
		}
	}
	else
		header("Location: hal-login.php?error=2");
}
else
	header("Location: hal-login.php?error=3");
?>