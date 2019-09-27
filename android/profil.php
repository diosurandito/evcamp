<?php

require_once 'koneksi.php';


$id_user = $_GET['id'];	
$query = mysqli_query($con,"SELECT * FROM users WHERE id= '$id_user'") ;


$row = mysqli_fetch_assoc($query);		
echo json_encode($row);	
mysqli_close($con);
?>
