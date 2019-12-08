<?php 
class User {
	protected $nama,
			  $username,
			  $email,
			  $password,
			  $upass,
			  $nohp,
			  $token,
			  $statusAktif,
			  $gambarktp,
			  $gambarselfie,
			  $gambarkk,
			  $gambarsim;

	public function __construct($email = null, $password = null, $nama = null, $nohp = null, $username = null, $upass = null, $gambarktp = null, $gambarselfie = null, $gambarkk = null, $gambarsim = null) {
		$db = koneksi_db();
		$this->nama = $db->escape_string($nama);
		$this->username = $db->escape_string($username);
		$this->email = $db->escape_string($email);
		$this->password = $db->escape_string($password);
		$this->upass = $db->escape_string($upass);
		$this->nohp = $db->escape_string($nohp);
		$this->gambarktp = $gambarktp;
		$this->gambarselfie = $gambarselfie;
		$this->gambarkk = $gambarkk;
		$this->gambarsim = $gambarsim;
		$this->token = hash('sha256', md5(date('Y-m-d')));
	}

	public function koneksi_db() {
	  $db=new mysqli("localhost","root","","easyrent");
	  if ($db->connect_error) {
	  	die("Connection failed: " . $db->connect_error);
	  }
	  else return $db;
	}

	public function mendaftar() {
		require_once 'Mail.php';
		$db = koneksi_db();
		if ($db->connect_errno == 0) {
			if (($this->nama == "") or ($this->nama == null)) {
				header("Location: ../easyrentv2/hal-reg.php?error=4");
			}
			else if (($this->username == "") or ($this->username == null)) {
				header("Location: ../easyrentv2/hal-reg.php?error=5");
			}
			else if (($this->email == "") or ($this->email == null)) {
				header("Location: ../easyrentv2/hal-reg.php?error=6");
			}
			else if (($this->password == "") or ($this->password == null)) {
				header("Location: ../easyrentv2/hal-reg.php?error=7");
			}
			else if (($this->upass == "") or ($this->upass == null)) {
				header("Location: ../easyrentv2/hal-reg.php?error=8");
			}
			else if ($this->upass != $this->password) {
				header("Location: ../easyrentv2/hal-reg.php?error=9");
			}
			// else if (($_FILES['ktp']['size'] == 0) && ($_FILES['ktp']['error'] == 0)) {
			// 	header("Location: hal-reg.php?error=10");
			// }
			// else if (($_FILES['selfie']['size'] == 0) && ($_FILES['selfie']['error'] == 0)) {
			// 	header("Location: hal-reg.php?error=11");
			// }
			// else if (($_FILES['kk']['size'] == 0) && ($_FILES['kk']['error'] == 0)) {
			// 	header("Location: hal-reg.php?error=12");
			// }
			else {

				$sql = "insert into user values('$this->nama', '$this->username', '$this->email', '$this->nohp', '$this->password', '$this->gambarktp', '$this->gambarselfie', '$this->gambarkk', '$this->gambarsim', '$this->token', '0')";
				$res = $db->query($sql);
				if ($res) {
					if ($db->affected_rows > 0) {
						header("Location: ../easyrentv2/hal-login.php?success=1");
						new Mail($this->email, $this->nama, $this->token);
					}
					else {
						header("Location: ../easyrentv2/hal-reg.php?error=1");
					}
				}
			}
		}
		else {
			header("Location: ../easyrentv2/hal-reg.php?error=3");
		}
	}

	public function login() {
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
						header("Location: ../easyrentv2/hal-utm.php");
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

	public function logout() {
		session_start();
		session_destroy();
		header("Location: ../easyrentv2/index.php");
	}
}