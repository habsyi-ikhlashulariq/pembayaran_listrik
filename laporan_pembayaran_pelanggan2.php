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
		$sql = 'SELECT * FROM pelanggan';
		$query = mysqli_query($koneksi, $sql);
 		
 	?>
	<form>	
		<table border="0" width="100%">
				<?php while ($data5 = mysqli_fetch_array($query) ) {
						?>
					<tr>
					<td><input type="text" name="nama" value="<?php echo $data5['nama']; ?>"></td>
					<td><input type="text" name="nama" value="<?php echo $data5['alamat']; ?>"></td>
				</tr>
				<?php } ?>
		</table>
	</form>

</body>
</html>
<script>window.print();</script>