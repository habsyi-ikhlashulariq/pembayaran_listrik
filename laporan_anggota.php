<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
	<h1>LAPORAN DATA PELANGGAN</h1>
	<table border="1" class="posisi">
		<tr>
			<td>No</td>
			<td>Nama</td>
			<td>Alamat</td>
			<td>Kode Tarif</td>
		</tr>
		<?php 
		include "koneksi.php";
		$no = 1;
		$sql = 'SELECT * FROM pelanggan WHERE level="client"';
		$query = mysqli_query($koneksi, $sql);
		while ($data = mysqli_fetch_array($query)) {
		 	?>
		 	<tr>
		 		<td><?php echo $no++; ?></td>
		 		<td><?php echo $data['nama']; ?></td>
		 		<td><?php echo $data['alamat']; ?></td>
		 		<td><?php echo $data['kode']; ?></td>
		 	</tr>
		 <?php } ?>
	</table>

</body>
</html>
<script>window.print();</script>