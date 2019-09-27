<?php
include 'koneksi.php';
$email = $_GET['email'];
$query = mysqli_query($con, "UPDATE users SET verifikasi=1 where email='$email'");

if ($query === TRUE) {
	echo "verifikasi Akun Berhasil";
}

?>