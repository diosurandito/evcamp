<?php
include_once "koneksi.php";

class emp{}

$banner = $_POST['banner'];
$id_trans = $_GET['id'];


if (empty($id_trans)) { 
	$response = new emp();
	$response->success = 0;
	$response->message = "Please dont empty Name."; 
	die(json_encode($response));
} else {
	$random = random_word(20);

	$path = "images/struk/".$random.".png";
	$banners = "".$random.".png";

		// sesuiakan ip address laptop/pc atau URL server
	$actualpath = "http://192.168.43.158/evcamp/android/$path";

	$query = mysqli_query($con, "UPDATE transactions SET bukti_bayar='$banners',verifikasi='1' where id='$id_trans' ");

	if ($query){
		file_put_contents($path,base64_decode($banner));

		$response = new emp();
		$response->success = 1;
		$response->message = "Successfully Uploaded";
		die(json_encode($response));
	} else{ 
		$response = new emp();
		$response->success = 0;
		$response->message = "Error Upload image";
		die(json_encode($response)); 
	}
}	

	// fungsi random string pada gambar untuk menghindari nama file yang sama
function random_word($id = 20){
	$pool = '1234567890abcdefghijkmnpqrstuvwxyz';

	$word = '';
	for ($i = 0; $i < $id; $i++){
		$word .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
	}
	return $word; 
}

mysqli_close($con);

?>	