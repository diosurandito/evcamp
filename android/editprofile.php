<?php
/* ===== www.dedykuncoro.com ===== */
/* ========= KALAU PAKAI MYSQLI YANG ATAS SEMUA DI REMARK, TERUS YANG INI DI UNREMARK ======== */
include_once "koneksi.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$nohp = $_POST['no_telp'];
$alamat = $_POST['alamat'];


if ((empty($id))) {
	echo "Id  kosong";	
}else {	$query = mysqli_query($con, "UPDATE users SET nama='$nama', email='$email', no_telp='$nohp', alamat='$alamat' WHERE id='$id'");

if ($query){
	echo "Edit Profile berhasil.";

} else {
	echo "QueryError";
}
} 

mysqli_close($con);

?>