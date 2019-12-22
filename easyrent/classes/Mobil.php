<?php 

class Mobil {
	private $nama_mobil,
			$thn_mobil,
			$tipe_mobil,
			$silinder,
			$harga,
			$deskripsi,
			$foto_mobil;

	public function __construct ($nama_mobil = null, $thn_mobil = null, $tipe_mobil = null, $silinder = null, $harga = 0, $deskripsi = null, $foto_mobil = null) {
		$db = koneksi_db();
		$this->nama_mobil = $db->escape_string($nama_mobil);
		$this->thn_mobil = $db->escape_string($thn_mobil);
		$this->tipe_mobil = $db->escape_string($tipe_mobil);
		$this->silinder = $db->escape_string($silinder);
		$this->harga = $db->escape_string($harga);
		$this->deskripsi = $db->escape_string($deskripsi);
		$this->foto_mobil = $foto_mobil;
	}

	public function koneksi_db() {
	  $db=new mysqli("localhost","root","","easyrent");
	  if ($db->connect_error) {
	  	die("Connection failed: " . $db->connect_error);
	  }
	  else return $db;
	}

	public function tambah_mobil() {
		$db = koneksi_db();
		if ($db->connect_errno == 0) {
			if (($this->foto_mobil == "") || ($this->foto_mobil == null)) {
				header("Location: ../easyrentv2/hal-tambah.php?error=6");
			}
			else if (($this->nama_mobil == "") || ($this->nama_mobil == null)) {
				header("Location: ../easyrentv2/hal-tambah.php?error=1");
			}
			else if (($this->thn_mobil == "") || ($this->thn_mobil == null)) {
				header("Location: ../easyrentv2/hal-tambah.php?error=2");
			}
			else if (($this->tipe_mobil == "") || ($this->tipe_mobil == null)) {
				header("Location: ../easyrentv2/hal-tambah.php?error=3");
			}
			else if (($this->silinder == "") || ($this->silinder == null)) {
				header("Location: ../easyrentv2/hal-tambah.php?error=4");
			}
			else if (($this->harga == "") || ($this->harga == null)) {
				header("Location: ../easyrentv2/hal-tambah.php?error=5");
			}
			else {
				$sql = "INSERT INTO mobil (nama_mobil, thn_mobil, tipe_mobil, silinder, harga, deskripsi, foto_mobil) values ('$this->nama_mobil', '$this->thn_mobil', '$this->tipe_mobil', '$this->silinder', '$this->harga', '$this->deskripsi', '$this->foto_mobil')";

				$res = $db->query($sql);
				if ($res) {
					if ($db->affected_rows > 0) {
						header("Location: ../easyrentv2/hal-rental.php?success=1");
					}
				}
			}
		}
		else {
			header("Location: ../easyrentv2/hal-tambah.php?error=7");
		}
	}
}