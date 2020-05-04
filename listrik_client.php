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

$no= 1;
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
		<div class="submenu"><a href="profil_client.php">Pribadi</a></div><br>
		<div class="submenu"><a href="listrik_client.php">Listrik</a></div><br>
		<div class="submenu"><a href="pembayaran.php">Pembayaran</a></div><br></td>
	</tr>
	<tr>
		<td class="menu2">Laporan <br><br>
		<div class="submenu"><a href="#" onclick="window.open('laporan_pembayaran.php');return false;">Laporan Anggota</a></div><br>
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
				<td class="judul">Pilih Listrik
				<hr width="1135px" color="#FF4500"></td>
			</tr>
			<tr>
				<td>
					<form method="POST">
					<table>
						<tr>
							<td>No</td>
							<td>:</td>
							<td><input type="no" name="no" value="<?php echo $no++; ?>"></td>
						<tr>
							<td>Kode Tarif</td>
							<td>:</td>
							<td><input type="text" name="kode" value="<?php echo $data['kode']; ?>" disabled></td>
						</tr>
						<tr>
							<td>Daya</td>
							<td>:</td>
							<td><input type="text" name="daya"></td><td><input type="submit" name="refresh" value="Refresh" class="button"></td>
						</tr>
						
						
					</table>
					</form>
					
					<form method="POST">
					<?php 
					if (isset($_POST['refresh'])) {
						$daya = $_POST['daya'];
						$kalender = CAL_GREGORIAN;
						$bulan = date("m");
						$tahun = date("Y");
						$hari = cal_days_in_month($kalender, $bulan, $tahun);
				 	 
							$sql2 = 'SELECT * FROM listrik WHERE daya like "%'.$daya.'%"';
							$query2 = mysqli_query($koneksi, $sql2);
							$data2 = mysqli_fetch_array($query2); ?>
				 		<tr>
							<td><input type="submit" name="tambah" value="Tambah" class="button"></td>
						</tr>
							<tr>
								<td><input type="hidden" name="id" value="<?php echo $data['id'];?>">
								<input type="hidden" name="kode" value="<?php echo $data['kode'];?>">
								<input type="hidden" name="daya" value="<?php echo $daya?>">
								<input type="hidden" name="bulan" value="<?php echo $bulan?>">
								<input type="hidden" name="tahun" value="<?php echo $tahun?>">
								<input type="hidden" name="hari" value="<?php echo $hari?>"></td>
							</tr>					 		
							<tr>
					 			<td>Daya 
					 			<input type="text" name="daya" value="<?php echo $data2['daya'];?>" ></td>
					 		</tr>
					 		<tr>
					 			<td>Beban 
					 			<input type="text" name="beban2" value="<?php echo $data2['beban'] ?>" ></td>
					 		</tr>
					 		<tr>
					 			<td>Tarif per-KWH
					 			<input type="text" name="tarif2" value="<?php echo $data2['tarif'] ?>" ></td>
					 		</tr>
					 	<?php }?>
					 </form>

					 <?php 
					 if (isset($_POST['tambah'])) {
						$id = $_POST['id'];
						$kode = $_POST['kode'];
						$daya = $_POST['daya'];
						$beban = $_POST['beban2'];
						$tarif = $_POST['tarif2'];
						$bulan = $_POST['bulan'];
						$tahun = $_POST['tahun'];
						$hari = $_POST['hari'];

						$sql3 = 'INSERT INTO tarif(kode,daya,tarif_perkwh,beban)VALUES("'.$kode.'","'.$daya.'","'.$tarif.'","'.$beban.'")';
						$query3 = mysqli_query($koneksi, $sql3);
						if ($query3) {
							$sql4 = 'INSERT INTO tagihan(tahun_tagih,bulan_tagih,pemakaian,pelanggan_id)VALUES("'.$tahun.'","'.$bulan.'","'.$hari.'","'.$id.'")';
							$query4 = mysqli_query($koneksi, $sql4);
							echo "<script>alert('Berhasil Memesan Listrik');
							document.location.href='listrik_client.php';</script>";
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