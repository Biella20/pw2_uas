<?php 
session_start();

if (isset($_SESSION["login"])) {
	header("Location: index.php");
	exit;
}
 
require 'functions.php';

	if(isset($_POST["login"])) {
		$username = $_POST["username"];
		$password = $_POST["password"];

		$result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

		//cek username
		if(mysqli_num_rows($result) === 1) {

		//cek password
		$row = mysqli_fetch_assoc($result);
		if(password_verify($password, $row["password"])) {
			// set session
			$_SESSION["login"] = true;

			header("Location: index.php");
			exit;
		}
		}

		$error = true;
	}
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Halaman Login</title>
	<style>
		label { 
		display: block; 
		}
		body {
			background-color: blanchedalmond;
		}
	</style>

</head>
<body>
	<br><br><br>
	<center><h1>Halaman Login</h1></center>

	<?php if (isset($error)) : ?>
		<p style="color:red; font-style:italic;">username / password salah</p>
	<?php endif; ?>

		<center>
		<form action="" method="post">
			
			<label for="username">Username : </label>
			<input type="text" name="username" id="username" class="form-control" size="50">
			
			<label for="password">Password : </label>
			<input type="password" name="password" id="password" class="form-control" size="50">
			
			<br><br>	
			<button type="submit" name="login" style="background-color: yellowgreen; padding: 0 15px;">Login</button>
			<a href="registrasi.php" style="background-color: yellowgreen; padding: 0 15px">Buat Akun</a>

		</form>
	</center>
</body>
</html>