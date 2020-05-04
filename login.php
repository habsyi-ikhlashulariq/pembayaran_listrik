<!DOCTYPE html>
<html>
<head>
	<title>Silahkan Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form method="POST">
		<table class="login">
			<tr>
				<th colspan="3" class="login2">LOGIN</th>
			</tr>
			<tr>
				<td>Kode</td>
				<td><input type="text" name="id_login" placeholder="Isikan ID LOGIN"></td><td><input type="submit" name="login" value="LOGIN" class="button"></td>
			</tr>
		</table>
	</form>

	<?php
	session_start();
	include "koneksi.php";
	if (isset($_POST['login'])) {
	 	$kode = $_POST['id_login'];

	 	$sql = 'SELECT * FROM pelanggan WHERE kode="'.$kode.'"';
	 	$query = mysqli_query($koneksi, $sql);
	 	$data = mysqli_fetch_array($query);

	 	if ($query->num_rows) {
	 		echo "<script>alert('Login Berhasil');
	 		document.location.href='index.php';</script>";
	 		$_SESSION['id'] = $data['id'];
	 		$_SESSION['level'] = $data['level'];
	 	}else{
	 		echo "<script>alert('Login Gagal');
	 		document.location.href='login.php';</script>";
	 	}
	 } ?>

</body>
</html>