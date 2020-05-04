<?php 
include "koneksi.php";

$id = $_GET['id'];
$sql = 'DELETE FROM pelanggan WHERE id="'.$id.'"';
$query = mysqli_query($koneksi, $sql);

if ($query) {
	echo "<script>alert('Berhasil Di Hilangkan');
	document.location.href='pelanggan.php';</script>";
}
 ?>