<!DOCTYPE html>
<html>
<head>
	<title>Elektro Musi</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<img src="images/header4.jpg">
</div>

<?php 
session_start();
include "koneksi.php";

$sql = 'SELECT * FROM pelanggan WHERE id="'.$_SESSION['id'].'"';
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
?>
<div class="kiri">
<table>
	<tr>
		<th class="menu">Welcome <u><?php echo $data['nama']; ?></u></th>
	</tr>
	<tr>
		<td class="menu2"><a href="index.php">Home</a></td>
	</tr>

	<?php 
	if ($_SESSION['level']=="server") {
	 	 ?>

	<tr>
		<td class="menu2">Data <br><br>
		<div class="submenu"><a href="pelanggan.php">Pelanggan</a></div><br>
		<div class="submenu"><a href="listrik_server.php">Listrik</a></div><br></td>
	</tr>
	<tr>
		<td class="menu2">Laporan <br><br>
		<div class="submenu"><a href="#" onclick="window.open('laporan_anggota.php');return false;">Laporan Anggota</a></div><br>
		<div class="submenu"><a href="#" onclick="window.open('laporan_listrik.php');return false;">Laporan Listrik</a></div><br></td>
	</tr>
	<tr>
		<td class="menu2">Profil <br><br>
		<div class="submenu"><a href="profil.php">Profil User</a></div><br>
		<div class="submenu"><a href="logout.php">Keluar</a></div></td>
	</tr>
	<?php } ?>
	
</table>
</div>

<div class="kanan">
	<div class="konten">
		<table>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td class="judul">Tambah Daftar Daya Listrik
				<hr width="1135px" color="#FF4500"></td>
			</tr>
			<tr>
				<td>
					<form method="POST">
						<table border="0" width="500px">
						<tr>
							<td>Daya</td>
							<td>:</td>
							<td><input type="text" name="daya"></td>
						</tr>
						<tr>
							<td>Beban</td>
							<td>:</td>
							<td><input type="text" name="beban"></td>
						</tr>
						<tr>
							<td>Tarif</td>
							<td>:</td>
							<td><input type="text" name="tarif"></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td><input type="submit" name="tambah" value="Tambah" class="button"></td>
						</tr>
						</table>
					</form>
					<?php 
					if (isset($_POST['tambah'])) {
					 	$daya = $_POST['daya'];
					 	$beban = $_POST['beban'];
					 	$tarif = $_POST['tarif'];

					 	$sql2 = 'INSERT INTO listrik(daya,beban,tarif)VALUES("'.$daya.'","'.$beban.'","'.$tarif.'")';
					 	$query2 = mysqli_query($koneksi, $sql2);

					 	if ($query2) {
					 		echo "<script>alert('Berhasil Tambah Data Listrik');
					 		document.location.href='listrik_server.php';</script>";
					 	}
					 } ?>
				</td>
			</tr>
		</table>
	</div>
</div>
<div class="clear"></div>
<div class="footer">
	Habsyi Ikhlashul Ariq &copy; 2018
</div>


</body>
</html>