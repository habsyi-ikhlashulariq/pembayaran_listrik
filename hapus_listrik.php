<?php 
include "koneksi.php";

$id = $_GET['id_listrik'];
$sql = 'DELETE FROM listrik WHERE id_listrik="'.$id.'"';
$query = mysqli_query($koneksi, $sql);

if ($query) {
	echo "<script>alert('Berhasil Di Hilangkan');
	document.location.href='listrik_server.php';</script>";
}
 ?>