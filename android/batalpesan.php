<?php  

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$id_transaksi = $_POST['id'];

	$sql = "UPDATE transactions SET verifikasi = '3' WHERE id = '$id_transaksi';";

	require_once('koneksi.php');

	if (mysqli_query($con,$sql)) {
		echo "Berhasil";
	}else{
		echo mysqli_error();
	}

	mysqli_close($con);
}
?>