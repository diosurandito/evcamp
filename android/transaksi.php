<?php
/* ===== www.dedykuncoro.com ===== */
/* ========= KALAU PAKAI MYSQLI YANG ATAS SEMUA DI REMARK, TERUS YANG INI DI UNREMARK ======== */
include_once "koneksi.php";

$id_user = $_POST['id_user'];
$id_event = $_POST['id_event'];
$id_tiket = $_POST['id_tiket'];
$jumlah = $_POST['jumlah'];

if ((empty($jumlah))) {
	echo "Masukan Jumlah Tiket ";	
}else {
	$query = mysqli_query($con, "INSERT INTO transactions (id,id_user,id_event,id_tiket, jumlah) 
		VALUES(0,'$id_user','$id_event','$id_tiket','$jumlah')");

	if ($query){
		echo "Pesan Tiket Berhasil, Chek your Notif";

	} else {
		echo "gagal";
	}
}



mysqli_close($con);

?>