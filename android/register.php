<?php
/* ===== www.dedykuncoro.com ===== */
/* ========= KALAU PAKAI MYSQLI YANG ATAS SEMUA DI REMARK, TERUS YANG INI DI UNREMARK ======== */
include_once "koneksi.php";

class usr{}

$nama = $_POST["nama"];
$email = $_POST["email"];
$password = $_POST["password"];
$alamat = $_POST["alamat"];	
$jenis_klmn = $_POST["jenis_klmn"];

$encrypted_password = hash("sha256",$password);// encrypted password


if ((empty($nama))) {
	$response = new usr();
	$response->success = 0;
	$response->message = "Username tidak boleh kosong";
	die(json_encode($response));
} else if ((empty($email))) {
	$response = new usr();
	$response->success = 0;
	$response->message = "Email tidak boleh kosong";
	die(json_encode($response));
} else if ((empty($password))) {
	$response = new usr();
	$response->success = 0;
	$response->message = "Password tidak boleh kosong";
	die(json_encode($response));
} else if ((empty($alamat))) {
	$response = new usr();
	$response->success = 0;
	$response->message = "Alamat tidak boleh kosong";
	die(json_encode($response));
} else if ((empty($jenis_klmn))) {
	$response = new usr();
	$response->success = 0;
	$response->message = "Jenis Kelamin tidak boleh kosong";
	die(json_encode($response));
}else {
	if (!empty($email)){
		$num_rows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE email='".$email."'"));

		if ($num_rows == 0){
			$query = mysqli_query($con, "INSERT INTO users (id, nama, email, password, alamat, jenis_klmn) VALUES(0,'".$nama."','".$email."','".$encrypted_password."','".$alamat."','".$jenis_klmn."')");

			if ($query){
				$response = new usr();
				$response->success = 1;
				$response->message = "Register berhasil, silahkan verifikasi.";


				require 'PHPMailer/PHPMailerAutoload.php';
				$mail = new PHPMailer;

// Konfigurasi SMTP
				$mail->isSMTP();
				$mail->Host = 'smtp.gmail.com';
				$mail->SMTPAuth = true;
				$mail->Username = 'ahmadzakyammardany7@gmail.com';
				$mail->Password = '@@@AAA000DANY';
				$mail->SMTPSecure = 'ssl';
				$mail->Port = 465;

				$mail->setFrom('varif@evcamp.com', 'Evcamp');
				$mail->addReplyTo('verif@evcamp.com', 'Evcamp');

// Menambahkan penerima
				$mail->addAddress($email);

// Subjek email
				$mail->Subject = 'Verifikasi Akun Evcamp';

// Mengatur format email ke HTML
				$mail->isHTML(true);

// Konten/isi email
				$mailContent = "<h1>Verifikasi Akun</h1>
				<p>Untuk verifikasi akun silhkan klik link di bawah</p><br/>
				<a href='http://192.168.43.158/evcamp/android/verifikasi.php?email=".$email."'>verifikasi</a>";


				$mail->Body = $mailContent;

// Kirim email
				if(!$mail->send()){
//					echo 'Pesan tidak dapat dikirim.';
//					echo 'Mailer Error: ' . $mail->ErrorInfo;
				}else{
//					echo 'Pesan telah terkirim';
				}

				echo json_encode($response);

			} else {
				$response = new usr();
				$response->success = 0;
				$response->message = "Register Gagal";
				die(json_encode($response));
			}
		} else {
			$response = new usr();
			$response->success = 0;
			$response->message = "register berhasil";
			// $response->message = "email sudah ada";
			die(json_encode($response));
		}
		
	}
}


mysqli_close($con);

?>	