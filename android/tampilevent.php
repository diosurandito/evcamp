<?php

require_once 'koneksi.php';

$sql = "SELECT events.id, events.id_organizer, events.nama_event, events.deskripsi, events.id_campus, events.kategori_event, events.banner, events.tgl_mulai, events.waktu_mulai, events.tgl_penj_mulai, events.penyelenggara,tickets.id, tickets.harga, tickets.harga_fee, tickets.stok_tiket, campuses.nama_kampus, campuses.alamat, campuses.latitude, campuses.longitude, organizers.email, organizers.no_telp FROM events JOIN tickets JOIN campuses JOIN organizers on events.id=tickets.id_event AND events.id_organizer=organizers.id AND events.id_campus=campuses.id where events.deleted_at is null AND events.tgl_penj_selesai > NOW()  order by events.id desc" ;

$result = array();
$r = mysqli_query($con,$sql);

while ($row = mysqli_fetch_array($r)) {

	array_push($result, array(
		"id_event" => $row['id'],
		"id_organizer" => $row['id_organizer'],
		"nama_event" => $row['nama_event'],
		"deskripsi" => $row['deskripsi'],
		"id_campus" => $row['id_campus'],
		"kategori_event" => $row['kategori_event'],
		"banner" => $row['banner'],
		"tgl_mulai" => date('d-m-Y', strtotime($row['tgl_mulai'])),
		// "tgl_mulai" => $row['tgl_mulai'],
		"waktu_mulai" => date('h:s', strtotime($row['waktu_mulai'])),
		"tgl_penj_mulai" => date('h:s', strtotime($row['tgl_penj_mulai'])),
		"penyelenggara" => $row['penyelenggara'],
		"id_tiket" => $row['id'],
		"harga" => $row['harga'],
		"harga_fee" => $row['harga_fee'],
		"jumlah" => $row['stok_tiket'],
		"nama_kampus" => $row['nama_kampus'],
		"alamat" => $row['alamat'],
		"latitude" => $row['latitude'],
		"longitude" => $row['longitude'],
		"email" => $row['email'],
		"no_telp" => $row['no_telp']
		

	));

}

echo json_encode(array('result' => $result));
mysqli_close($con);

?> 