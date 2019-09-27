<?php
/* ===== www.dedykuncoro.com ===== */

	// =================== KALAU PAKAI MYSQLI YANG ATAS SEMUA DI REMARK, TERUS YANG INI RI UNREMARK ========
include_once "koneksi.php";

class usr{}

$email = $_POST["email"];
$password = $_POST["password"];

$encrypted_password = hash("sha256", $password);// encrypted password

if ((empty($email)) || (empty($password))) { 
	$response = new usr();
	$response->success = 0;
	$response->message = "Kolom tidak boleh kosong"; 
	die(json_encode($response));
}

$query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$encrypted_password' AND verifikasi=1 ");

$row = mysqli_fetch_array($query);

if (!empty($row)){
	$response = new usr();
	$response->success = 1;
	$response->message = "Selamat datang ".$row['nama'];
	$response->id = $row['id'];
	$response->nama = $row['nama'];
	$response->email = $row['email'];
	$response->alamat = $row['alamat'];
	$response->jenis_klmn = $row['jenis_klmn'];
	$response->no_telp = $row['no_telp'];
	$response->foto = $row['foto'];

	die(json_encode($response));

} else { 
	$response = new usr();
	$response->success = 0;
	$response->message = "Periksa kembali email dan password anda";
	die(json_encode($response));
}

mysqli_close($con);

?>