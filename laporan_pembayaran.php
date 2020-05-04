<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
	<h1>LAPORAN DATA PEMBAYARAN</h1>
	<?php 
		session_start();
		include "koneksi.php";

		$sql = 'SELECT * FROM pelanggan WHERE id="'.$_SESSION['id'].'"';
		$query = mysqli_query($koneksi, $sql);
		$data = mysqli_fetch_array($query);
 		
 		$kode = $data['kode'];

 		$sql2 = 'SELECT * FROM tarif WHERE kode="'.$kode.'"';
 		$query2 = mysqli_query($koneksi, $sql2);
 		$data2 = mysqli_fetch_array($query2);

 		$sql3 = 'SELECT * FROM tagihan WHERE pelanggan_id="'.$data['id'].'"';
 		$query3 = mysqli_query($koneksi, $sql3);
 		$data3 = mysqli_fetch_array($query3);

 		$sql4 = 'SELECT * FROM pembayaran WHERE id_tagihan="'.$data3['id'].'"';
 		$query4 = mysqli_query($koneksi, $sql4);
 		$data4 = mysqli_fetch_array($query4);
 		?>
	<form>	
	<table border="0" width="100%">
		
			<tr>
				<td>Kode</td>
				<td>:</td>
				<td><input type="text" name="kode" value="<?php echo $data['kode']; ?>"></td>
				<td></td>

				<td>Tanggal Bayar</td>
				<td>:</td>
				<td><input type="text" name="tgl" value="<?php echo $data4['tanggal_bayar']; ?>"></td>
			</tr>
			<tr>
				<td>Daya</td>
				<td>:</td>
				<td><input type="text" name="daya" value="<?php echo $data2['daya']; ?>"></td>
			</tr>
			<tr>
				<td>Beban</td>
				<td>:</td>
				<td><input type="text" name="beban" value="<?php echo $data2['beban']; ?>"></td>
			</tr>
			<tr></tr>
			<tr></tr>
			<tr></tr>
			<tr>
				<td>Tarif</td>
				<td>:</td>
				<td><input type="text" name="kode" value="<?php echo $data2['tarif_perkwh']; ?>"></td>
			</tr>
			<tr>
				<td>Biaya Admin</td>
				<td>:</td>
				<td><input type="text" name="kode" value="<?php echo $data4['biaya_admin']; ?>"></td>
			</tr>
			<tr>
				<td>Jumlah Tagihan</td>
				<td>:</td>
				<td><input type="text" name="kode" value="<?php echo $data4['jumlah_tagihan']; ?>"></td>
			</tr>
			<tr>
				<td>Status Pembayaran</td>
				<td>:</td>
				<td><input type="text" name="kode" value="<?php echo $data4['status']; ?>"></td>
			</tr>
			
		</table>
	</form>

</body>
</html>
<script>window.print();</script>