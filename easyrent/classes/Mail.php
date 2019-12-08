<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require $_SERVER['DOCUMENT_ROOT'].'/easyrentv2/vendor/autoload.php';

class Mail {
	public function __construct($email, $nama, $token) {
		$mail = new PHPMailer(true);                  
	    $mail->SMTPDebug = 0;                                
	    $mail->isSMTP();                            
	    $mail->Host = 'mail.fajarikhsan.xyz';  
	    $mail->SMTPAuth = true;  
	    //ganti dengan email dan password yang akan di gunakan sebagai email pengirim                  
	    $mail->Username = 'easyrent@fajarikhsan.xyz';       
	    $mail->Password = 'easyrent';                       
	    $mail->SMTPSecure = 'ssl';                           
	    $mail->Port = 465;                                  
	    //ganti dengan email dan nama kamu
	    $mail->setFrom('support@easyrent.com', 'EasyRent');

	    $mail->addAddress($email, $nama);     
	    $mail->isHTML(true);                                 
	    $mail->Subject = "Aktivasi pendaftaran Member";
	    $mail->Body    = "Selamat, anda berhasil membuat akun. Untuk mengaktifkan akun anda silahkan klik link dibawah ini.<br> <a href='http://localhost/easyrentv2/aktivasi.php?t=".$token."'><button> Aktivasi Akun </button></a>  ";
	    $mail->send();
	}
}