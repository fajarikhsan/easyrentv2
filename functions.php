<?php
	//koneksi database
define("DEVELOPMENT",TRUE);
	function koneksi_db() {
	  $db=new mysqli("localhost","root","","easyrent");
	  if ($db->connect_error) {
	  	die("Connection failed: " . $db->connect_error);
	  }
	  else return $db;
	}

	function banner() {
		?>
		<section class="header">
			<div class="fixed-top" style="background-color: #304A8B;">
		      <div class="container">
		        <div class="row text-center">
		          <div class="col pt-3 mb-3">
		            <img src="img/logo.png">
		          </div>
		        </div>
		      </div>
		    </div>
		</section>
		    <div><hr></div>
	<?php }

	function bawah() {
		?>
	      <div class="row text-center fixed-bottom">
	        <div class="col">
	          &copy Easyrent
	        </div>
	      </div>
	<?php }

	function showNotif ($pesan) {
		?>
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
		  <strong>Pemberitahuan</strong> <?php echo $pesan; ?>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	<?php }

?>