<?php

require_once 'koneksi.php';


$id_user = $_GET['id_user'];	
$sql = "SELECT transactions.id, transactions.id_tiket, transactions.jumlah,transactions.tgl_transaksi, transactions.bukti_bayar,transactions.verifikasi, tickets.id_event,  tickets.harga,  events.nama_event, events.id_campus, events.kategori_event, events.banner, events.tgl_mulai, events.waktu_mulai, events.penyelenggara, campuses.nama_kampus, campuses.alamat FROM transactions JOIN tickets JOIN events JOIN campuses on transactions.id_tiket=tickets.id AND tickets.id_event=events.id AND events.id_campus=campuses.id WHERE transactions.id_user= '$id_user'AND (transactions.verifikasi='1' OR transactions.verifikasi='0' OR transactions.verifikasi='4') order by transactions.tgl_transaksi desc" ;

$result = array();
$r = mysqli_query($con,$sql);

while ($row = mysqli_fetch_array($r)) {

	array_push($result, array(
		"id_transaksi" => $row['id'],
		"id_tiket" => $row['id_tiket'],
		"jumlah" => $row['jumlah'],
		"tgl_transaksi" => $row['tgl_transaksi'],
		"bukti_bayar" => $row['bukti_bayar'],
		"verifikasi" => $row['verifikasi'],
		"id_event" => $row['id_event'],
		"harga" => $row['harga'],
		"nama_event" => $row['nama_event'],
		"id_campus" => $row['id_campus'],
		"kategori_event" => $row['kategori_event'],
		"banner" => $row['banner'],
		"tgl_mulai" => $row['tgl_mulai'],
		"waktu_mulai" => $row['waktu_mulai'],
		"penyelenggara" => $row['penyelenggara'],
		"nama_kampus" => $row['nama_kampus'],
		"alamat" => $row['alamat'],
		

	));

}

echo json_encode(array('result' => $result));
mysqli_close($con);


?> 