<!DOCTYPE html>
<html>
<head>
	<title> Elektro Musi	</title>
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
		<td class="menu2"><a href="#">Home</a></td>
	</tr>

	<?php 
	if ($_SESSION['level']=="client") {
	 	 ?>

	<tr>
		<td class="menu2">Data <br><br>
		<div class="submenu"><a href="data_client.php">Pribadi</a></div><br>
		<div class="submenu"><a href="listrik_client.php">Listrik</a></div><br>
		<div class="submenu"><a href="pembayaran.php">Pembayaran</a></div><br></td>
	</tr>
	<tr>
		<td class="menu2">Laporan <br><br>
		<div class="submenu"><a href="#" onclick="window.open('laporan_pembayaran.php');return false;">Laporan Pembayaran</a></div><br>
		</td>
	</tr>
	<tr>
		<td class="menu2">Keluar <br><br>
		<div class="submenu"><a href="logout.php">Keluar</a></div><br>
		</td>
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
				<td class="judul">Profil Data
				<hr width="1135px" color="#FF4500"></td>
			</tr>
			<tr>
				<td>
					<form method="POST" action="profil.php">
					<table>
						<tr>
							<td>Nama</td>
							<td>:</td>
							<td><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td><input type="text" name="alamat" value="<?php echo $data['alamat']; ?>"></td>
						</tr>
						<tr>
							<td>Kode Listrik</td>
							<td>:</td>
							<td><input type="text" name="kode_tarif" value="<?php echo $data['kode_tarif']; ?>" disabled></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" name="edit" value="Edit"></td>
						</tr>
					</table>
					</form>
					<?php 
					include "koneksi.php";
					if (isset($_POST['edit'])) {
					 	$nama = $_POST['nama'];
					 	$alamat = $_POST['alamat'];
					 	$id = $_SESSION['id'];

					 	$sql2 = 'UPDATE pelanggan SET nama="'.$nama.'", alamat="'.$alamat.'" WHERE id="'.$id.'"';
					 	$query2 = mysqli_query($koneksi, $sql2);
					 	if ($query2) {
					 		echo "<script>alert('Berhasil Edit Profil');
					 		document.location.href='profil.php';</script>";
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