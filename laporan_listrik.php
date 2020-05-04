<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
	<h1>LAPORAN DATA LISTRIK</h1>
	<table border="1" class="posisi">
		<tr>
			<td>No</td>
			<td>Daya</td>
			<td>Beban</td>
			<td>Tarif per-KWH</td>
		</tr>
		<?php 
		include "koneksi.php";
		$no = 1;
		$sql = 'SELECT * FROM listrik';
		$query = mysqli_query($koneksi, $sql);
		while ($data = mysqli_fetch_array($query)) {
		 	?>
		 	<tr>
		 		<td><?php echo $no++; ?></td>
		 		<td><?php echo $data['daya']; ?></td>
		 		<td><?php echo $data['beban']; ?></td>
		 		<td><?php echo $data['tarif']; ?></td>
		 	</tr>
		 <?php } ?>
	</table>

</body>
</html>
<script>window.print();</script>