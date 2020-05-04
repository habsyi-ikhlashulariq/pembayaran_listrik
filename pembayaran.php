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
		<td class="menu2"><a href="index.php">Home</a></td>
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
		<div class="submenu"><a href="#" onclick="window.open('laporan_pembayaran.php');return false;">Laporan Pembayaran</a></div><br>
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
				<td class="judul">Pembayaran
				<hr width="1135px" color="#FF4500"></td>
			</tr>
			<tr>
				<td>
				<?php
				$no = 1;
				$denda = 1000;
				$biayaa= 2000;
				$kalender = CAL_GREGORIAN;
				$bulan = date("m");
				$tahun = date("Y");
				$hari = cal_days_in_month($kalender, $bulan, $tahun);
				$tgl = date("Y-m-d");
				$sql2 = 'SELECT * FROM tagihan WHERE pelanggan_id="'.$data['id'].'"';
				$query2 = mysqli_query($koneksi, $sql2);
				$data2 = mysqli_fetch_array($query2);

				$sql3 = 'SELECT * FROM tarif WHERE kode="'.$data['kode'].'"';
				$query3 = mysqli_query($koneksi, $sql3);
				$data3 = mysqli_fetch_array($query3); ?>
					<form method="POST">
						<table>
							<tr>
								<td>NO</td>
								<td>:</td>
								<td><input type="text" name="no" value="<?php echo $no;?>">
								<input type="hidden" name="id2" value="<?php echo $data2['id'];?>">
								<input type="hidden" name="tgl" value="<?php echo $tgl;?>"></td>
							</tr>
							<tr>
								<td>Tarif Per-KWH</td>
								<td>:</td>
								<td><input type="text" name="tarif" value="<?php echo $data3['tarif_perkwh'] ?>"></td>
							</tr>
							<tr>
								<td>Biaya Admin</td>
								<td>:</td>
								<td><input type="text" name="biayaa" value="<?php echo $biayaa;?>"></td>
							</tr>
							<tr>
								<td>Jumlah Tagihan</td>
								<td>:</td>
								<td><?php
									$tarif = $data3['tarif_perkwh'];
									$pakai = $data2['pemakaian'];
									$jt = $tarif+$biayaa+$denda;
									$jt2 = $tarif+$biayaa;
									if ($pakai<=$hari) {
										 ?><input type="text" name="jt3" value="<?php echo $jt2; ?>">
									<?php }else{
										?> <input type="text" name="jt3" value="<?php echo $jt; ?>"><?php
									}?>
								 </td>
							</tr>
							<tr>
								<td>Uang</td>
								<td>:</td>
								<td><input type="text" name="uang" placeholder="Masukan Uang Anda"></td>
							</tr>
							<tr>
								<td colspan="3"><input type="submit" name="tambah" value="Tambahkan" class="button"></td>
							</tr>
						</table>
					 </form>
					 <?php 
					 if (isset($_POST['tambah'])) {
					  	$tgl = $_POST['tgl'];
					  	$id2 = $_POST['id2'];
					  	$jt = $_POST['jt3'];
					  	$biayaa = $_POST['biayaa'];
					  	$uang = $_POST['uang'];
					  	$status1 = "Lunas";
					  	$status= "Utang";

					  	if ($uang>=$jt) {
					  		$sql4 = 'INSERT INTO pembayaran(tanggal_bayar,id_tagihan,jumlah_tagihan,biaya_admin,status)VALUES("'.$tgl.'","'.$id2.'","'.$jt.'","'.$biayaa.'","'.$status1.'")';
					  		$query4 = mysqli_query($koneksi, $sql4);
					  		echo "<script>alert('Berhasil Melakukan Transaksi');
							document.location.href='pembayaran.php';</script>";
					  	}else{
					  		$sql5 = 'INSERT INTO pembayaran(tanggal_bayar,id_tagihan,jumlah_tagihan,biaya_admin,status)VALUES("'.$tgl.'","'.$id2.'","'.$jt.'","'.$biayaa.'","'.$status.'")';
					  		$query5 = mysqli_query($koneksi, $sql5);
					  		echo "<script>alert('Berhasil Melakukan Transaksi');
							document.location.href='pembayaran.php';</script>";
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