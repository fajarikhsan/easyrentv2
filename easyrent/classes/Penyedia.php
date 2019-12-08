<?php 
class Penyedia extends User {
	public function __construct($email = null, $password = null) {
		parent::__construct($email, $password);
	}
	public function login1() {
		$db = koneksi_db();
		if ($db->connect_errno == 0) {
			$sql = "select * from user where email='$this->email' and password='$this->password'";
			$res = $db->query($sql);
			if ($res) {
				if ($res->num_rows == 1) {
					$data = $res->fetch_assoc();
					if ($data['aktif'] == 1){
						session_start();
						$_SESSION['email'] = $data['email'];
						$_SESSION['username'] = $data['username'];
						header("Location: ../easyrentv2/hal-rental.php");
					}
					else
						header("Location: ../easyrentv2/hal-login.php?error=5");
				}
				else
					header("Location: ../easyrentv2/hal-login.php?error=1");
			}
		}
		else
			header("Location: ../easyrentv2/hal-login.php?error=3");
	}
}