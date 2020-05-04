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

		$no=1;
		$id = $_GET['id'];
		$sql = 'SELECT * FROM pelanggan WHERE id="'.$id.'"';
		$query = mysqli_query($koneksi, $sql);
		$data = mysqli_fetch_array($query);
 		
 		$kode = $data['kode'];

 		$sql2 = 'SELECT * FROM tarif WHERE kode="'.$kode.'"';
 		$query2 = mysqli_query($koneksi, $sql2);
 		$data2 = mysqli_fetch_array($query2);

 		$sql3 = 'SELECT * FROM tagihan WHERE pelanggan_id="'.$id.'"';
 		$query3 = mysqli_query($koneksi, $sql3);
 		$data3 = mysqli_fetch_array($query3);

 		$sql4 = 'SELECT * FROM pembayaran WHERE id_tagihan="'.$data3['id'].'"';
 		$query4 = mysqli_query($koneksi, $sql4);
 		$data4 = mysqli_fetch_array($query4);
 		?>
	<form>	
		<table border="0" width="100%">
				<tr>
					<td>NO</td>
					<td>:</td>
					<td><input type="text" name="no" value="<?php echo $no++;?>"></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><input type="text" name="nama" value="<?php echo $data['nama'];?>"></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><input type="text" name="alamat" value="<?php echo $data['alamat'];?>"></td>
				</tr>
				<tr>
					<td>Kode</td>
					<td>:</td>
					<td><input type="text" name="kode" value="<?php echo $data['kode'];?>"></td>
				</tr>
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
					<td>Tanggal Pembayaran</td>
					<td>:</td>
					<td><input type="text" name="tgl" value="<?php echo $data4['tanggal_bayar'];?>"></td>
				</tr>
				<tr>
					<td>Pemakaian</td>
					<td>:</td>
					<td><input type="text" name="pakai" value="<?php echo $data3['pemakaian'];?>"></td>
				</tr>
				<tr>
					<td>Jumlah Tagihan</td>
					<td>:</td>
					<td><input type="text" name="jt" value="<?php echo $data4['jumlah_tagihan'];?>"></td>
				</tr>
				<tr>
					<td>Biaya Denda</td>
					<td>:</td>
					<td><input type="text" name="no" value="<?php echo $data4['biaya_denda'];?>"></td>
				</tr>
				<tr>
					<td>Biaya Admin</td>
					<td>:</td>
					<td><input type="text" name="no" value="<?php echo $data4['biaya_admin'];?>"></td>
				</tr>
				<tr>
					<td>Status</td>
					<td>:</td>
					<td><input type="text" name="no" value="<?php echo $data4['status'];?>"></td>
				</tr>
		</table>
	</form>

</body>
</html>
<script>window.print();</script>