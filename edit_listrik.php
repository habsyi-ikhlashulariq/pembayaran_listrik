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
				<td class="judul">Edit Listrik
				<hr width="1135px" color="#FF4500"></td>
			</tr>
			<tr>
				<td>
					<?php 
					include "koneksi.php";
					$id= $_GET['id_listrik'];
					$sql2 ='SELECT * FROM listrik WHERE id_listrik="'.$id.'"';
					$query2 = mysqli_query($koneksi, $sql2);
					$data2 = mysqli_fetch_array($query2)?>
					<form method="POST">
						<table border="0" width="500px">
						<tr>
							<td>Daya</td>
							<td>:</td>
							<td><input type="text" name="daya" value="<?php echo $data2['daya'];?>"></td>
						</tr>
						<tr>
							<td>Beban</td>
							<td>:</td>
							<td><input type="text" name="beban" value="<?php echo $data2['beban'];?>"></td>
						</tr>
						<tr>
							<td>Tarif per-KWH</td>
							<td>:</td>
							<td><input type="text" name="tarif" value="<?php echo $data2['tarif'];?>"></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td><input type="submit" name="edit" value="Edit" class="button"></td>
						</tr>
						</table>
					</form>
					<?php 

					if (isset($_POST['edit'])) {
						$daya = $_POST['daya'];
						$beban = $_POST['beban'];
						$tarif = $_POST['tarif'];

						$sql3 = 'UPDATE listrik SET daya="'.$daya.'", beban="'.$beban.'",tarif="'.$tarif.'" WHERE id_listrik="'.$id.'"';
						$query3 = mysqli_query($koneksi, $sql3);

						if ($query3) {
							echo "<script>alert('Berhasil Ubah Data Listrik');
							document.location.href='listrik_server.php'; </script>";
						}
					}
					 ?>
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