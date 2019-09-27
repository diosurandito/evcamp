<?php

require_once 'koneksi.php';


$id_trans = $_GET['id_trans'];	
$email = $_GET['email'];

$sql = "SELECT ticket_codes.id, ticket_codes.kode_tiket, ticket_codes.cek_in, events.nama_event, events.kategori_event, events.banner, events.tgl_mulai, events.tgl_selesai, events.waktu_mulai, events.detail_lokasi, events.deskripsi, events.penyelenggara, transactions.tgl_transaksi FROM ticket_codes JOIN transactions JOIN events on ticket_codes.id_trans=transactions.id AND transactions.id_event=events.id WHERE ticket_codes.id_trans= '$id_trans'" ;

$result = array();
$r = mysqli_query($con,$sql);

while ($row = mysqli_fetch_array($r)) {

	array_push($result, array(
		"id" => $row['id'],
		"kode_tiket" => $row['kode_tiket'],
		"cek_in" => $row['cek_in'],
		"nama_event" => $row['nama_event'],
		"kategori_event" => $row['kategori_event'],
		"banner" => $row['banner'],
		"email" => $email,
		"tgl_mulai" => $row['tgl_mulai'],
		"tgl_selesai" => $row['tgl_selesai'],
		"waktu_mulai" => $row['waktu_mulai'],
		"detail_lokasi" => $row['detail_lokasi'],
		"deskripsi" => $row['deskripsi'],
		"penyelenggara" => $row['penyelenggara'],
		"tgl_transaksi" => $row['tgl_transaksi'],		

	));

}

echo json_encode(array('result' => $result));
mysqli_close($con);


?> 