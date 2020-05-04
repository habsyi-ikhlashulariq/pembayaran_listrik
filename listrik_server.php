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
				<td class="judul">Daftar Daya Listrik
				<hr width="1135px" color="#FF4500"></td>
			</tr>
			<tr>
				<td>
					<table border="0" width="1000px">
					<tr>
						<form method="POST" action="aksi_cari_listrik.php">
						<td colspan="8"><a href="tambah_listrik.php">Tambah Daya Listrik</a><input type="text" name="tcari" placeholder="Masukan Daya Listrik" class="tcari"><input type="submit" name="bcari" value="cari" class="bcari"></td>
						</form>
						<?php 
						 ?>
					</tr>
					<tr>
						<th class="back">NO</th>
						<th class="back">Daya</th>
						<th class="back">Beban</th>
						<th class="back">Tarif</th>
						<td class="opsi">OPSI</td>
					</tr>
					<?php 
					$no = 1;
					$sql2 = 'SELECT * FROM listrik';
					$query2 = mysqli_query($koneksi, $sql2);
					while ($data2 = mysqli_fetch_array($query2)) {
					?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $data2['daya']; ?></td>
							<td><?php echo $data2['beban']; ?></td>
							<td><?php echo $data2['tarif']; ?></td>
							<td><a href="edit_listrik.php?id_listrik=<?php echo $data2['id_listrik'];?>">EDIT</a>||<a href="hapus_listrik.php?id_listrik=<?php echo $data2['id_listrik'];?>">HAPUS</a></td>
						</tr>
					<?php } ?>
					</table>
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